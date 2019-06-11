<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Admin, Plan, Card, State, TransactionUser};
use Auth;

class PagSeguroController extends Controller
{
	//Tela admin com todos os plano
    public function index()
    {
    	return view('admin.pages.plans.index')->with('plans', Plan::all());
    }

    //tela admin para criar os planos
    public function create()
    {
    	return view('admin.pages.plans.create');
    }

    //gerador de planos via API Pagseguro
    public function store(Request $request)
    {
    	$value = str_replace(',','.', str_replace('.','', $request->value));
    	$data['email'] = config('services.pagseguro.pagseguro_email');
		$data['token'] = config('services.pagseguro.pagseguro_token');
    	$data['preApprovalName'] = $request->preApprovalName;
    	$data['preApprovalCharge'] = 'AUTO';
    	$data['preApprovalPeriod'] = 'MONTHLY';
    	$data['preApprovaldayOfMonth'] = 1;
    	$data['preApprovalAmountPerPayment'] = $value;
  		
  		$data = http_build_query($data);
  		$url = 'https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/request';

    	$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded','Accept: application/vnd.pagseguro.com.br.v3+xml;charset=ISO-8859-1'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		$xml = curl_exec($curl);
		curl_close($curl);
		$xml= simplexml_load_string($xml);

		$plan = new Plan;
		$plan->code = $xml->code;
		$plan->name = $request->preApprovalName;
		$plan->type = $request->type;
		$plan->value = $value;
		$plan->save();

		return redirect(route('admin.plan'))->with('success', 'Plano criado com sucesso');
}

	//tela para assinar o plano
    public function subscriptions()
    {
        $candidate = Auth::guard('candidate')->user();
        if ($candidate) {
            $plans = Plan::where('type', 'candidato')->get();
            return view('candidate.pages.subscriptions.show')
            ->with('plans', $plans)
            ->with('candidate', $candidate);
        }
        $company = Auth::guard('company')->user();
        $plans = Plan::where('type', 'empresa')->get();
        return view('company.pages.subscriptions.show')
            ->with('plans', $plans)
            ->with('company', $company);
    }
    //Pega a sessão de pagamento
    public function getSession(Request $request)
    {
    	$auth = Auth::guard('candidate')->user();

    	$data['email'] = config('services.pagseguro.pagseguro_email');
		$data['token'] = config('services.pagseguro.pagseguro_token');


		$curl = curl_init();
		 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
		curl_setopt($curl, CURLOPT_URL, "https://ws.sandbox.pagseguro.uol.com.br/sessions");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 
		$resp = curl_exec($curl);
		curl_close($curl);

		$resp = simplexml_load_string($resp);
		return ($resp->id);
    }
    //gera hash do cartao de credito
    public function hash(Request $request)
    {	
    	$auth = Auth::guard('candidate')->user();
        $user = 'candidate';
        if (!$auth) {
            $auth = Auth::guard('company')->user();
            $user = 'company';
        }
    	$card = new Card;
    	$card->card_number	= $request->cardNumber;
    	$card->brand		= $request->brand;
    	$card->exp_month	= $request->expirationMonth;
    	$card->exp_year		= $request->expirationYear;
    	$card->hash			= $request->hash;
    	$card->candidate_id = $auth->id;
    	$card->save();

    	$transaction = new TransactionUser;
    	$transaction->user_id = $auth->id;
    	$transaction->plan_id    = $request->plan;
    	$transaction->save();
        if ($user == 'company') {
            return redirect()->route('company.transaction.checkout')->with('success','Finalize sua compra');
        }
    	return redirect()->route('candidate.transaction.checkout')->with('success','Finalize sua compra');
    }
    //direciona para a tela de checkout
    public function checkout()
    {
    	$candidate = Auth::guard('candidate')->user();
        if (!$candidate) {
            $company = Auth::guard('company')->user();
        	return view('company.pages.checkout')
        	->with('states', State::all())
        	->with('company', $company);
        }
    	$candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
        return view('candidate.pages.checkout')
        ->with('states', State::all())
        ->with('candidate', $candidate);
}

    public function finishCheckout(Request $request)
    {
    	$this->validate($request, [
            'name'              => 'required',
            'email'             => 'required',
            'cep'               => 'required',
            'phone'        		=> 'required|min:15',
        ]);
    	$auth = Auth::guard('candidate')->user();
        $type = 'candidate';
        if (!$auth) {
            $auth = Auth::guard('company')->user();
            $type = 'company';
        }
    	$payload['plan'] = $auth->transaction->plan_id;	
    	$payload['sender'] = ([
    		'name' 	=> $request->name,
    		'email' => 'lucas@sandbox.pagseguro.com.br',
    		'hash' 	=> $request->hash_comprador,
    		'phone' 	=> ([
    			'areaCode' 			=> substr($request->phone, 1,2),
    			'number' 		=> $this->numberPhone($request->phone),
    		]),
    		'address'=> ([
    			'street' 		=> $request->street, 
    			'number' 		=> $request->number, 
    			'complement' 	=> $request->complement, 
    			'district' 		=> $request->nehighbor,
    			'city' 			=> $request->city, 
    			'state' 		=> $request->state, 
    			'country' 		=> 'BRA',
    			'postalCode' 	=> $request->cep, 
    		]),
    		'documents' 	=> ([[
    			'type' 			=> 'CPF',
    			'value' 		=> $this->limpaCPF_CNPJ($request->cpf),
    		]]),
    	]);
    	$payload['paymentMethod'] = ([
    		'type' 		=> 'CREDITCARD',
    		'creditCard' =>([
    			'token' 		=> $request->token_card,
	    		'holder' 		=> ([
	    			'name' 			=> $request->name,
	    			'birthDate' 	=> $request->birthdate,
	    			'documents' 	=> ([[
	    				'type' 			=> 'CPF',
	    				'value' 		=> $this->limpaCPF_CNPJ($request->cpf),
					]]),
	    			'billingAddress'=> ([
	    				'street' 		=> $request->street, 
	    				'number' 		=> $request->number, 
	    				'complement' 	=> $request->complement, 
	    				'district' 		=> $request->nehighbor,
	    				'city' 			=> $request->city, 
	    				'state' 		=> 	$request->state, 
	    				'country' 		=> 'BRA',
	    				'postalCode' 	=> $request->cep, 
	    			]),
		    		'phone' 	=> ([
	    			'areaCode' 		=> substr($request->phone, 1,2),
	    			'number' 		=> $this->numberPhone($request->phone),
	    		]),
    		]),
    		]),
    	]); 
    	$payload = json_encode($payload);

 		$data['email'] = config('services.pagseguro.pagseguro_email');
		$data['token'] = config('services.pagseguro.pagseguro_token');

		$data = http_build_query($data);

	 	$url = 'https://ws.sandbox.pagseguro.uol.com.br/pre-approvals?'.$data;
    	$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, Array('Content-Type: application/json;charset=ISO-8859-1',  'Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1 '));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 
		$resp = curl_exec($curl);
		$resp = json_decode($resp);
		$auth->transaction->code = $resp->code;
		$auth->transaction->save();
		curl_close($curl);
        if ($type == 'candidate') {
            return redirect()->route('candidate.subscriptions')->with('success', 'Plano registrado com sucesso');
        }
		return redirect()->route('company.subscriptions')->with('success', 'Plano registrado com sucesso');
    }

    public function allUsers()
    {
        $plans = TransactionUser::all();
        return view('admin.pages.plans.all-users')->with('plans', $plans);
    }

    private function limpaCPF_CNPJ($valor){
		$valor = trim($valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", "", $valor);
		$valor = str_replace("-", "", $valor);
		$valor = str_replace("/", "", $valor);
		return $valor;
	}
	private function numberPhone($valor){
		$valor = trim($valor);
		$valor = substr($valor, 5);
		$valor = str_replace(" ", "", $valor);
		$valor = str_replace("-", "", $valor);
		return $valor;
	}
 
}

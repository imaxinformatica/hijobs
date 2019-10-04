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
        return view('admin.pages.plans.index')->with('plans', Plan::get());
    }

    //tela admin para criar os planos
    public function create()
    {
        return view('admin.pages.plans.create');
    }

    //gerador de planos via API Pagseguro
    public function store(Request $request)
    {
        $value = str_replace(',', '.', str_replace('.', '', $request->value));
        $data['email'] = config('services.pagseguro.pagseguro_email');
        $data['token'] = config('services.pagseguro.pagseguro_token');
        $data['preApprovalName'] = $request->preApprovalName;
        $data['preApprovalCharge'] = 'AUTO';
        $data['preApprovalPeriod'] = 'MONTHLY';
        $data['trialPeriodDuration '] = $request->trialPeriodDuration;
        $data['preApprovaldayOfMonth'] = 1;
        $data['preApprovalAmountPerPayment'] = $value;

        $data = http_build_query($data);
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/request';

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Accept: application/vnd.pagseguro.com.br.v3+xml;charset=ISO-8859-1'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $xml = curl_exec($curl);
        curl_close($curl);
        $xml = simplexml_load_string($xml);

        $plan = new Plan;
        $plan->code = $xml->code;
        $plan->name = $request->preApprovalName;
        $plan->type = $request->type;
        $plan->trial_period_duration = $request->trialPeriodDuration;
        $plan->value = $value;
        $plan->save();

        return redirect(route('admin.plan'))->with('success', 'Plano criado com sucesso');
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        $plan->value = number_format($plan->value, 2, ',', '.');

        return view('admin.pages.plans.edit')->with('plan', $plan);
    }

    public function update(Request $request)
    {
        $value = str_replace(',', '.', str_replace('.', '', $request->value));

        $data['email'] = config('services.pagseguro.pagseguro_email');
        $data['token'] = config('services.pagseguro.pagseguro_token');
        $code = $request->code;

        $data = http_build_query($data);

        $url = "https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/request/{$code}/payment/?{$data}";
        $payload = array(
            'amountPerPayment'      => $value,
            'updateSubscriptions'   => false,
            // 'trialPeriodDuration'       => $request->trialPeriodDuration,
        );

        $data_json = json_encode($payload);

        $headers = array('Content-Type: application/json', 'Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $resp = json_decode($response);
        curl_close($ch);
        if (isset($resp->error)) {
            foreach ($resp->errors as $resp) {
                return redirect()->back()->with('warning', "Ops,Tivemos um problema, entre em contato com o administrador. Erro: {$resp}");
            }
        }
        if (!$resp) {
            $plan = Plan::where('code', $code)->first();
            $plan->value = $value;
            $plan->save();

            return redirect()->back()->with('success', 'Plano editado com sucesso');
        } else { }
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
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
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
        $card->card_number    = $request->cardNumber;
        $card->brand        = $request->brand;
        $card->exp_month    = $request->expirationMonth;
        $card->exp_year        = $request->expirationYear;
        $card->hash            = $request->hash;
        $card->user_id      = $auth->id;

        $card->type = $user == 'company' ? 2 : 1;
        $card->save();

        $transaction = new TransactionUser;
        $transaction->user_id = $auth->id;
        $transaction->plan_id    = $request->plan;
        if ($user == 'company') {
            $transaction->type    = 2;
        } else {
            $transaction->type    = 1;
        }
        $transaction->save();
        if ($user == 'company') {
            return redirect()->route('company.transaction.checkout')->with('success', 'Finalize sua compra');
        }
        return redirect()->route('candidate.transaction.checkout')->with('success', 'Finalize sua compra');
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
            'phone'                => 'required|min:15',
        ]);
        $auth = Auth::guard('candidate')->user();
        $type = 'candidate';
        if (!$auth) {
            $auth = Auth::guard('company')->user();
            $type = 'company';
        }
        $payload['plan'] = $auth->transaction->plan_id;
        $payload['sender'] = ([
            'name'     => $request->name,
            'email' => 'lucas@sandbox.pagseguro.com.br',
            'hash'     => $request->hash_comprador,
            'phone'     => ([
                'areaCode'             => substr($request->phone, 1, 2),
                'number'         => numberPhone($request->phone),
            ]),
            'address' => ([
                'street'         => $request->street,
                'number'         => $request->number,
                'complement'     => $request->complement,
                'district'         => $request->nehighbor,
                'city'             => $request->city,
                'state'         => $request->state,
                'country'         => 'BRA',
                'postalCode'     => $request->cep,
            ]),
            'documents'     => ([[
                'type'             => 'CPF',
                'value'         => limpaCPF_CNPJ($request->cpf),
            ]]),
        ]);
        $payload['paymentMethod'] = ([
            'type'         => 'CREDITCARD',
            'creditCard' => ([
                'token'         => $request->token_card,
                'holder'         => ([
                    'name'             => $request->name,
                    'birthDate'     => $request->birthdate,
                    'documents'     => ([[
                        'type'             => 'CPF',
                        'value'         => limpaCPF_CNPJ($request->cpf),
                    ]]),
                    'billingAddress' => ([
                        'street'         => $request->street,
                        'number'         => $request->number,
                        'complement'     => $request->complement,
                        'district'         => $request->nehighbor,
                        'city'             => $request->city,
                        'state'         =>     $request->state,
                        'country'         => 'BRA',
                        'postalCode'     => $request->cep,
                    ]),
                    'phone'     => ([
                        'areaCode'         => substr($request->phone, 1, 2),
                        'number'         => numberPhone($request->phone),
                    ]),
                ]),
            ]),
        ]);
        $payload = json_encode($payload);

        $data['email'] = config('services.pagseguro.pagseguro_email');
        $data['token'] = config('services.pagseguro.pagseguro_token');

        $data = http_build_query($data);

        $url = 'https://ws.sandbox.pagseguro.uol.com.br/pre-approvals?' . $data;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=ISO-8859-1',  'Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1 '));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        $resp = json_decode($resp);
        curl_close($curl);
        if (isset($resp->error)) {
            foreach ($resp->errors as $resp) {
                return redirect()->back()->with('warning', "Ops,Tivemos um problema, entre em contato com o administrador. Erro: {$resp}");
            }
        }
        $auth->transaction->code = $resp->code;
        $auth->transaction->status = 'ACTIVE';
        $auth->transaction->save();
        if ($type == 'candidate') {
            return redirect()->route('candidate.subscriptions')->with('success', 'Plano registrado com sucesso');
        }
        return redirect()->route('company.subscriptions')->with('success', 'Plano registrado com sucesso');
    }

    public function cancelPlan()
    {
        $auth = Auth::guard('candidate')->user();
        if (!$auth) {
            $auth = Auth::guard('company')->user();
        }
        $status = 'ACTIVE';
        $code = $auth->transaction->code;
        if ($auth->transaction->status == 'ACTIVE') {
            $status = 'SUSPENDED';
        }
        $data['email'] = config('services.pagseguro.pagseguro_email');
        $data['token'] = config('services.pagseguro.pagseguro_token');

        $data = http_build_query($data);

        $url = "https://ws.sandbox.pagseguro.uol.com.br/pre-approvals/{$code}/status/?{$data}";
        $payload = array('status' => $status); // PARA REATIVAR USAR $data = array('status'=>'ACTIVE');

        $data_json = json_encode($payload);

        $headers = array('Content-Type: application/json', 'Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $resp = json_decode($response);
        if (isset($resp->error)) {
            foreach ($resp->errors as $resp) {
                return redirect()->back()->with('warning', "Ops,Tivemos um problema, entre em contato com o administrador. Erro: {$resp}");
            }
        }
        if (!$resp) {
            $auth->transaction->status = $status;
            $auth->transaction->save();
            return redirect()->back()->with('success', 'Status do plano alterado     com sucesso');
        }
    }

    public function allUsers($id)
    {
        $plans = Plan::find($id);
        return view('admin.pages.plans.all-users')->with('plans', $plans);
    }

    public function getNotification(Request $request)
    {


        $req = json_decode($request);

        $notificationCode = $req['notificationCode'];

        $data['email'] = config('services.pagseguro.pagseguro_email');
        $data['token'] = config('services.pagseguro.pagseguro_token');

        $data = http_build_query($data);

        $url = "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/{$notificationCode}?{$data}";

        $headers = array('Content-Type: application/json', 'Accept: application/vnd.pagseguro.com.br.v3+json;charset=ISO-8859-1');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $xml = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($xml);

        $reference = $xml->reference;
        $status = $xml->status;
        if ($reference && $status) { 

        }
    }
}

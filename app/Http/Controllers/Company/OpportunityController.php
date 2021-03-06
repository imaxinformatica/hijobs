<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\State;
use App\City;
use App\Country;
use App\Driver;
use App\Journey;
use App\Vehicle;
use App\Special;
use App\Language;
use App\Knowledge;
use App\Subknowledge;
use App\OpportunityCity;
use App\ContractType;
use App\Hierarchy;
use App\Limit;
use App\Opportunity;
use App\Rules\MaxOpportunity;
use Auth;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $company = Auth::guard('company')->user();
        $opportunities = new Opportunity;
        $opportunities = $opportunities->where('company_id', $company->id);
        if($request->has('name')){
            if(request('name') != ''){
                $opportunities = $opportunities->where('name', 'like', '%' . request('name') . '%')->where('company_id', $company->id);
            }
        }
        if($request->has('salary')){
            if(request('salary') != ''){
                $opportunities = $opportunities->where('salary', '>',  request('salary'))->where('company_id', $company->id);
            }
        }

        if($request->has('contract_type_id')){
            if(request('contract_type_id') != ''){
                $opportunities = $opportunities->where('contract_type_id', request('contract_type_id') )->where('company_id', $company->id);
            }
        }

        $opportunities = $opportunities->orderBy('name', 'asc')->paginate(10);

        return view('company.pages.opportunity.index')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('opportunities', $opportunities)
        ->with('company', $company);
    }

    public function create()
    {
        $auth = Auth::guard('company')->user();

        $company = Auth::guard('company')->user();
        return view('company.pages.opportunity.create')
        ->with('states', State::all())
        ->with('cities', City::all())
        ->with('countries', Country::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('company', $company);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name'              => 'required',
            'activity'          => 'required',
            'requiriments'      => 'required',
            'contract_type_id'  => 'required',
            'time'              => 'required',
            'state_id'          => 'required',
            'city_id'           => 'required',
            'num'               => 'required',
        ]); 
            
        $auth = Auth::guard('company')->user();
        $totalOpportunities = $auth->opportunities()->count();

        $limit = Limit::first();
        if($totalOpportunities >= $limit->qty){
            return redirect()->back()
            ->with('warning', 'Você já atingiu o limite de vagas para o seu plano ativo');
        }

    	$opportunity = new Opportunity;
        $opportunity->name              = $request->name;
        $opportunity->activity          = $request->activity;
        $opportunity->requiriments      = $request->requiriments;
        $opportunity->contract_type_id  = $request->contract_type_id;
        $opportunity->time              = $request->time;
        $opportunity->additionally      = $request->additionally;
        $opportunity->num               = $request->num;
        $opportunity->state_id          = $request->state_id;
        $opportunity->city_id           = $request->city_id;
        $opportunity->company_id 		= $auth->id;
        $opportunity->publish       	= 1;
        $opportunity->salary            = str_replace(',', '.', str_replace('.', '', $request->salary));
   
        if (isset($request->isCombining)) {
            $opportunity->salary        = 0;
        }
        

        if (isset($request->isSpecial)) {
        	$opportunity->special = 1;
            $opportunity->comments_special = $request->comments_special;
        }

        $opportunity->save();

        return redirect(route('opportunity.index'))->with('success', 'Vaga Criada.')   ;
    }

    public function edit($id)
    {
        $opportunity = Opportunity::find($id);
        return view('company.pages.opportunity.edit')
        ->with('states', State::all())
        ->with('cities', City::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('opportunity', $opportunity);
    }

    public function show($id)
    {
        $opportunity = Opportunity::find($id);
        return view('company.pages.opportunity.show')
        ->with('states', State::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('opportunity', $opportunity);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'              => 'required',
            'activity'          => 'required',
            'requiriments'      => 'required',
            'contract_type_id'  => 'required',
            'time'              => 'required',
            'state_id'          => 'required',
            'city_id'           => 'required',
            'num'               => 'required',
        ]);   
        $opportunity = Opportunity::find($request->id);

        $opportunity->name              = $request->name;
        $opportunity->activity          = $request->activity;
        $opportunity->requiriments      = $request->requiriments;
        $opportunity->contract_type_id  = $request->contract_type_id;
        $opportunity->time              = $request->time;
        $opportunity->additionally      = $request->additionally;
        $opportunity->state_id          = $request->state_id;
        $opportunity->city_id           = $request->city_id;
        $opportunity->num               = $request->num;
        $opportunity->publish       	= 1;
        $opportunity->salary            = str_replace(',', '.', str_replace('.', '', $request->salary));
        // $opportunity->city              = $request->city;
        if (isset($request->isCombining)) {
            $opportunity->salary        = 0;
        }
        

        if (isset($request->isSpecial)) {
            $opportunity->special = 1;
            $opportunity->comments_special = $request->comments_special;
        }else{
            $opportunity->special = 0;
            $opportunity->comments_special = '';
        }

        

        $opportunity->save();

        return redirect()->back()->with('success', 'Vaga editada.');
    }

    public function publish($id)
    {
		$op = Opportunity::find($id);
        
		if (
		$op->name    			== NULL || $op->name    		   == '' ||
        $op->activity           == NULL || $op->activity           == '' || 
        $op->requiriments       == NULL || $op->requiriments       == '' ||
        $op->contract_type_id   == NULL || $op->contract_type_id   == '' ||
        $op->time               == NULL || $op->time               == '' ||
        $op->num 				== NULL || $op->num 			   == '' 
    	) {
			
		return redirect()->back()->with('success', 'Finalizar o cadastro da vaga!');				
		}

		$op->publish = 2;
		$op->save();

		return redirect()->back()->with('success', 'Vaga publicada com sucesso!');
    }

    public function destroy($id)
    {
    	$op = Opportunity::find($id);
        
        
    	$op->publish = 1;
    	$op->save();

    	return redirect()->back()->with('success', 'Vaga removida com sucesso!');
    }

    public function showCandidate($id)
    {
        $opportunity = Opportunity::find($id);
        return view('company.pages.opportunity.candidate')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('knowledges', Knowledge::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('subknowledges', Subknowledge::all())
        ->with('opportunity', $opportunity);
    }

    public function cities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return json_encode($cities);
    }

}

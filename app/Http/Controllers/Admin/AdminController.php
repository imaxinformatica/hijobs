<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Candidate;
use App\State;
use App\Frequently;
use App\Country;
use App\Driver;
use App\Journey;
use App\Vehicle;
use App\Special;
use App\Opportunity;
use App\Language;
use App\Knowledge;
use App\Hierarchy;
use App\Subknowledge;
use App\ContractType;
use App\OccupationArea;


class AdminController extends Controller
{
    public function indexCompany(Request $request)
    {
        $companies = new Company;

        if($request->has('name')){
            if(request('name') != ''){
                $companies = $companies->where('name', 'like', '%' . request('name') . '%');
            }
        }
        if($request->has('trade')){
            if(request('trade') != ''){
                $companies = $companies->where('trade', 'like', '%' . request('trade') . '%');
            }
        }
        if($request->has('cnpj')){
            if(request('cnpj') != ''){
                $companies = $companies->where('cnpj', 'like', '%' . request('cnpj') . '%');
            }
        }

        $companies = $companies->orderBy('name', 'asc')->paginate(10);

    	return view('admin.pages.company.index')
    	->with('companies', $companies);
    }

    public function editCompany($id)
    {
    	$company = Company::find($id);
    	return view('admin.pages.company.edit')
    	->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
    	->with('company', $company);
    }

    public function updateCompany(Request $request)
    {

        $this->validate($request, [
            'trade'                 => 'required',
            'phone'                 => 'required',
            'description'           => 'required|max:500',
            'cnpj'                  => 'required',
            'occupation_area_id'    => 'required',
            'cep'                   => 'required',
        ]);
        $company                       = Company::find($request->id);
        $company->trade                = $request->trade;
        $company->phone                = $request->phone;
        $company->description          = $request->description;
        $company->cnpj                 = $request->cnpj;
        $company->occupation_area_id   = $request->occupation_area_id;
        $company->cep                  = $request->cep;
        $company->street               = $request->street;
        $company->neighborhood         = $request->neighborhood;
        $company->city                 = $request->city;
        $company->state                = $request->state;
        $company->number               = $request->number;
        if ($request->name != null ||  $request->name != '') {
            $company->name             = $request->name;
        }
        if ($request->email != null || $request->email != '') {
            $company->email            = $request->email;
        }
        $company->linkedin            = $request->linkedin;
        $company->facebook            = $request->facebook;
        $company->twitter             = $request->twitter;
        $company->blog                = $request->blog;
        $company->save();

        return redirect()->back()->with('success','Empresa Salva com sucesso!');
    }

    public function showCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = 1;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Disponibilizada na Home');
    }

    public function removeCompany($id)
    {
    	$company = Company::find($id);
    	$company->publish = NULL;
    	$company->save();
    	return redirect()->back()->with('success', 'Empresa Removida da Home');    
    }


    public function indexCandidate(Request $request)
    {
        $candidates = new Candidate;

        if($request->has('name')){
            if(request('name') != ''){
                $candidates = $candidates->where('name', 'like', '%' . request('name') . '%');
            }
        }
        if($request->has('email')){
            if(request('email') != ''){
                $candidates = $candidates->where('email', 'like', '%' . request('email') . '%');
            }
        }
        if($request->has('phone')){
            if(request('phone') != ''){
                $candidates = $candidates->where('name', 'like', '%' . request('phone') . '%');
            }
        }

        $candidates = $candidates->orderBy('name', 'asc')->paginate(10);

    	return view('admin.pages.candidate.index')
    	->with('candidates', $candidates);
    }
    public function indexOpportunity(Request $request)
    {
        $opportunities = new Opportunity;

        if($request->has('name')){
            if(request('name') != ''){
                $opportunities = $opportunities->where('name', 'like', '%' . request('name') . '%');
            }
        }

        $opportunities = $opportunities->orderBy('name', 'asc')->paginate(10);

        return view('admin.pages.opportunity.index')
        ->with('opportunities', $opportunities);
    }

    public function editOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        return view('admin.pages.opportunity.edit')
        ->with('states', State::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('contract_types', ContractType::all())
        ->with('opportunity', $opportunity);   
    }

    public function updateOpportunity(Request $request)
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
        $opportunity->publish           = 1;
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
        $op->name               == NULL || $op->name               == '' ||
        $op->activity           == NULL || $op->activity           == '' || 
        $op->requiriments       == NULL || $op->requiriments       == '' ||
        $op->contract_type_id   == NULL || $op->contract_type_id   == '' ||
        $op->time               == NULL || $op->time               == '' ||
        $op->num                == NULL || $op->num                == '' 
        ) {
            
        return redirect()->back()->with('success', 'Finalizar o cadastro da vaga!');                
        }

        $op->publish = 2;
        $op->save();

        return redirect()->back()->with('success', 'Vaga publicada com sucesso!');
    }

    public function showOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->publish = 2;
        $opportunity->save();
        return redirect()->back()->with('success', 'Vaga Disponibilizada');
    }

    public function removeOpportunity($id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->publish = 1;
        $opportunity->save();
        return redirect()->bacshowk()->with('success', 'Vaga desabilitada');    
    }

    public function dashboard()
    {	
    	$opportunities = Opportunity::all();
    	return view('admin.pages.dashboard')
    	->with('candidates', Candidate::all())
    	->with('companies', Company::all())
    	->with('opportunities', $opportunities);
    }

    public function frequently()
    {
        return view('admin.pages.frequently.index')->with('frequentlys', Frequently::all());
    }

    public function createFrequently()
    {
       return view('admin.pages.frequently.create');
    }


    public function storeFrequently(Request $request)
    {

        $frequently = new Frequently;
        $frequently->answer = $request->answer;
        $frequently->question = $request->question;
        $frequently->save();

        return redirect()->back()->with('success', 'Criado com Sucesso'); 
    }

    public function editFrequently($id)
    {
       $frequently = Frequently::find($id);
       return view('admin.pages.frequently.edit')->with('frequently', $frequently);
    }

    public function updateFrequently(Request $request)
    {
        $frequently = Frequently::find($request->id);
        $frequently->answer = $request->answer;
        $frequently->question = $request->question;
        $frequently->save();

        return redirect()->back()->with('success', 'Alterado com Sucesso'); 
    }

    public function showFrequently()
    {
        return view('admin.pages.frequently.show')->with('frequentlys', Frequently::all());
    }
}

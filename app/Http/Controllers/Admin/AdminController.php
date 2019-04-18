<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Company;
use App\Candidate;
use App\State;use App\Country;
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
    public function pages()
    {
        $pages = Page::all();
        return view('admin.pages.pages.index')
        ->with('pages', $pages);
    }

    public function editPages($id)
    {
        $page = Page::find($id);
        return view('admin.pages.pages.edit')
        ->with('pages', $page);
    }

    public function updatePages(Request $request)
    {
        $page = Page::find($request->id);
        $page->desc = ($request->desc);
        $page->save();

        return redirect()->back()->with('success', 'Alterado com Sucesso');
    }

    public function footer($urn)
    {
        $page = Page::where('urn', $urn)->first();
        return view('index.pages.pages')->with('page', $page);
    }

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

        // if (filter_var($request->linkedin, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Linkedin');
        // }
        // if (filter_var($request->facebook, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Facebook');
        // }
        // if (filter_var($request->twitter, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Twitter');
        // }
        // if (filter_var($request->blog, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Blog');
        // }
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

    public function editCandidate($id)
    {
    	$candidate = Candidate::find($id);
        $candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
    	return view('admin.pages.candidate.edit')
    	->with('states', State::all())
        ->with('countries', Country::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('knowledges', Knowledge::all())
        ->with('subknowledges', Subknowledge::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all())
    	->with('candidate', $candidate);    
    }

    public function updateCandidate(Request $request)
    {
        $this->validate($request, [
            'state_id'          => 'required',
            'cpf'               => [
                'required',
                Rule::unique('candidates')->ignore($request->candidate_id)
            ],
            'marital_status'    => 'required',
            'birthdate'         => 'required',
            'sex'               => 'required',
            'travel'            => 'required',
            'change'            => 'required',
            'journey_id'        => 'required',
            'contract_type_id'  => 'required',
            'min_hierarchy_id'  => 'required',
            'max_hierarchy_id'  => 'required',
            'salary'            => 'required',
        ]);

        $candidate                   = Candidate::find($request->candidate_id);
        $finish = 0;
        if ($candidate->cpf == NULL) {
            $finish = 1;
        }

        $candidate->state_id         = $request->state_id;
        $candidate->cpf              = $request->cpf;
        $candidate->phone            = $request->phone;
        $candidate->marital_status   = $request->marital_status;
        $candidate->sex              = $request->sex;
        $candidate->travel           = $request->travel;
        $candidate->change           = $request->change;
        $candidate->journey_id       = $request->journey_id;
        $candidate->contract_type_id = $request->contract_type_id;
        $candidate->min_hierarchy_id = $request->min_hierarchy_id;
        $candidate->max_hierarchy_id = $request->max_hierarchy_id;
        $candidate->salary           = str_replace(',','.', str_replace('.','', $request->salary));
        $candidate->birthdate        = implode("-", array_reverse(explode("/", $request->birthdate)));

        // if (filter_var($request->linkedin, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Linkedin');
        // }
        // if (filter_var($request->facebook, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Facebook');
        // }
        // if (filter_var($request->twitter, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Twitter');
        // }
        // if (filter_var($request->blog, FILTER_VALIDATE_URL) === FALSE) {
        //     return redirect()->back()->with('success', 'Informar URL válida do Blog');
        // }
        $candidate->linkedin            = $request->linkedin;
        $candidate->facebook            = $request->facebook;
        $candidate->twitter             = $request->twitter;
        $candidate->blog                = $request->blog;
        foreach ($candidate->special()->get() as $special) {
            $special->pivot->delete();
        }
        if (isset($request->isSpecial)) {
            foreach ($request->specials as $specials) {
                $special               = new CandidateSpecial;
                $special->candidate_id = $candidate->id; 
                $special->special_id   = $specials;
                $special->save();
            }
            $candidate->special_description = $request->special_description;
            $candidate->special             = 1;
        }

        foreach ($candidate->driver as $driver) {
            $driver->pivot->delete();
        }
        if (isset($request->drivers)) {
            foreach ($request->drivers as $drivers) {
                $driver               = new CandidateDriver;
                $driver->candidate_id = $candidate->id; 
                $driver->driver_id   = $drivers;
                $driver->save();
            }
        }

        foreach ($candidate->vehicle as $vehicles) {
            $vehicles->pivot->delete();
        }
        if (isset($request->vehicles)) {
            foreach ($request->vehicles as $vehicles) {
                $vehicle               = new CandidateVehicle;
                $vehicle->candidate_id = $candidate->id; 
                $vehicle->vehicle_id   = $vehicles;
                $vehicle->save();
            }
        }

        foreach ($candidate->stateWork as $state_work) {
            $state_work->pivot->delete();
        }
        if (isset($request->state_work)) {
            foreach ($request->state_work as $works) {
                $work               = new CandidateState;
                $work->candidate_id = $candidate->id; 
                $work->state_id   = $works;
                $work->save();
            }
        }
        $candidate->save();

        return redirect()->back()->with('success', 'Candidato Editado.');
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
}

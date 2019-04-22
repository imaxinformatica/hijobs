<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Page;
use App\State;
use App\City;
use App\Driver;
use App\Company;
use App\Country;
use App\Vehicle;
use App\Journey;
use App\Message;
use App\Special;
use App\Language;
use App\Hierarchy;
use App\Candidate;
use App\Knowledge;
use App\Opportunity;
use App\Subknowledge;
use App\ContractType;
use App\OccupationArea;
use Auth;

class CompanyController extends Controller
{
    public function index()
    {
        return view('index.index-empresa');
    }

    public function session(Request $request)
    {
        $request->session()->put('email', $request->email);

        return redirect(route('company.create'));
    }

    public function create(Request $request)
    {
        return view('company.pages.create')->with('email', $request->session()->pull('email'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|max:50|unique:companies',
            'password'          => 'required|min:6|confirmed',
        ]);
        $company = new Company;
        $company->name 		  = $request->name;
        $company->email       = $request->email;
        $company->password    = bcrypt($request->password);

        $company->save();

        Auth::guard('company')->loginUsingId($company->id, true);
        
        return redirect(route('company.data'));
    }

    public function data()
    {
        $company = Auth::guard('company')->user();

        return view('company.pages.dados-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function show()
    {
        $company = Auth::guard('company')->user();
        return view('company.pages.show-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function edit()
    {
        $company = Auth::guard('company')->user();
        return view('company.pages.edit-empresa')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('occupations', OccupationArea::all())
        ->with('company', $company);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:6|confirmed',
        ]);

        $company = Auth::guard('company')->user();

        $company->password = bcrypt($request->password);
        $company->save();
        return redirect()->back()->with('success', 'Senha alterada!');
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'trade'                 => 'required',
            'phone'    			    => 'required',
            'description'   	    => 'required|max:500',
            'cnpj'          	    => 'required',
            'occupation_area_id'    => 'required',
            'cep'  				    => 'required',
        ]);
        $company                   	   = Company::find($request->company_id);
        $company->trade                = $request->trade;
        $company->phone            	   = $request->phone;
        $company->description          = $request->description;
        $company->cnpj           	   = $request->cnpj;
        $company->occupation_area_id   = $request->occupation_area_id;
        $company->cep         		   = $request->cep;
        $company->street               = $request->street;
        $company->neighborhood 		   = $request->neighborhood;
        $company->city_id              = $request->city;
        $company->state_id             = $request->state;
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

        return redirect(route('opportunity.index'))->with('success','Empresa Salva com sucesso!');
    }

    public function candidate(Request $request)
    {
        $candidates = new Candidate;
        if($request->has('occupation')){
            if(request('occupation') != ''){
                $candidates = $candidates->where('occupation', 'like', '%' . request('occupation') . '%');
            }
        }



        if($request->has('state_id')){
            if(request('state_id') != ''){
                $candidates = $candidates->where('state_id', request('state_id'));
            }
        }
        if($request->has('sex')){
            if(request('sex') != ''){
                $candidates = $candidates->where('sex', request('sex'));
            }
        }

        if($request->has('travel')){
            if(request('travel') != ''){
                $candidates = $candidates->where('travel', request('travel'));
            }
        }

        if($request->has('change')){
            if(request('change') != ''){
                $candidates = $candidates->where('change', request('change'));
            }
        }

        if($request->has('journey_id')){
            if(request('journey_id') != ''){
                $candidates = $candidates->where('journey_id', request('journey_id') );
            }
        }

        if($request->has('contract_type_id')){
            if(request('contract_type_id') != ''){
                $candidates = $candidates->where('contract_type_id', request('contract_type_id') );
            }
        }

        $candidates = $candidates->orderBy('name', 'asc')->paginate(10);

        $company = Auth::guard('company')->user();
        return view('company.pages.candidate')
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
        ->with('candidates', $candidates)
        ->with('company', $company);
    }

    public function showCV($id)
    {
        $candidate = Candidate::find($id);

        return view('company.pages.candidate-show')
        ->with('states', State::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all())
        ->with('candidate', $candidate);
    }

    public function message(Request $request)
    {
        $company = Auth::guard('company')->user();
        $msg = new Message();

        $msg->text          = $request->message;
        $msg->company_id    = $company->id;
        $msg->candidate_id  = $request->candidate_id;
        $msg->sent          = 1;
        $msg->save();
        return redirect()->back()->with('success', 'Mensagem Enviada.');
    }

    public function indexMessage()
    {
        $company = Auth::guard('company')->user();
        return view('company.pages.messages.all-messages')->with('company', $company);
    }

}
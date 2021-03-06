<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\City;
use App\Page;
use App\State;
use App\Video;
use App\Level;
use App\Driver;
use App\Course;
use App\Special;
use App\Partner;
use App\Country;
use App\Journey;
use App\Company;
use App\Vehicle;
use App\Language;
use App\Candidate;
use App\Hierarchy;
use App\Knowledge;
use App\Formation;
use App\Professional;
use App\Opportunity;
use App\ContractType;
use App\Subknowledge;
use App\CandidateState;
use App\CandidateDriver;
use App\CandidateVehicle;
use App\CandidateSpecial;
use App\OpportunitySearch;
use App\CandidateLanguage;
use App\CandidateKnowledge;
use App\OpportunityCandidate;
use Auth;

class CandidateController extends Controller
{
    public function home()
    {
        $companies = Company::where('publish', 1)->get();
        $opportunities = Opportunity::take(4)->get();
        return view('index.index')
            ->with('videos', Video::all())
            ->with('companies', $companies)
            ->with('partners', Partner::all())
            ->with('opportunities', $opportunities);
    }

    public function index()
    {
        $companies = Company::where('publish', 1)->get();
        $opportunities = Opportunity::take(4)->get();
        return view('candidate.pages.index')
            ->with('companies', $companies)
            ->with('partners', Partner::all())
            ->with('opportunities', $opportunities);
    }

    public function create()
    {
        return view('candidate.pages.cadastrar-curriculo');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|max:50|unique:candidates',
            'cep'               => 'required',
            'occupation'        => 'required',
            'password'          => 'required|min:6|confirmed',
        ]);
        $cep = implode("", (explode("-", $request->cep)));

        $url = "http://viacep.com.br/ws/{$cep}/json/";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);

        curl_close($ch);

        $dadosCep = json_decode($result);
        if (isset($dadosCep->erro)) {
            return redirect()->back()->with('danger', 'Verifique seu CEP se está correto.');
        }
        $candidate = new Candidate;
        $candidate->name        = $request->name;
        $candidate->email       = $request->email;
        $candidate->cep         = $request->cep;
        $candidate->street      = $dadosCep->logradouro;
        $candidate->state       = $dadosCep->uf;
        $candidate->nehighbor   = $dadosCep->bairro;
        $candidate->city        = $dadosCep->localidade;
        $candidate->occupation  = $request->occupation;
        $candidate->password    = encrypt($request->password);

        $candidate->save();

        Auth::guard('candidate')->loginUsingId($candidate->id, true);

        return redirect(route('candidate.data', ['id' => $candidate->id]));
    }

    public function data($id)
    {
        $candidate = Candidate::find($id);

        return view('candidate.pages.dados-curriculo')
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

    public function edit()
    {
        $candidate = Auth::guard('candidate')->user();
        $candidate->idSpecial = $candidate->specials->pluck('id');
        $candidate->idDriver = $candidate->driver->pluck('id');
        $candidate->idVehicle = $candidate->vehicle->pluck('id');
        $candidate->idState = $candidate->stateWork->pluck('id');

        $candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
        return view('candidate.pages.curriculum.edit')
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('cities', City::all())
            ->with('courses', Course::all())
            ->with('drivers', Driver::all())
            ->with('journeys', Journey::all())
            ->with('vehicles', Vehicle::all())
            ->with('specials', Special::all())
            ->with('languages', Language::all())
            ->with('knowledges', Knowledge::all())
            ->with('levels', Level::all())
            ->with('subknowledges', Subknowledge::all())
            ->with('hierarchies', Hierarchy::all())
            ->with('contract_types', ContractType::all())
            ->with('candidate', $candidate);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
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

        if ($request->name != null) {
            $candidate->name             = $request->name;
        }
        $candidate->state            = $request->state;

        $candidate->cpf              = $request->cpf;
        if ($request->cep != NULL) {
            $candidate->cep          = $request->cep;
            $candidate->street       = $request->street;
            $candidate->state        = $request->state;
            $candidate->nehighbor    = $request->nehighbor;
            $candidate->number       = $request->number;
            $candidate->city         = $request->city;
        }
        $candidate->phone            = $request->phone;
        $candidate->special          = $request->isSpecial;
        $candidate->marital_status   = $request->marital_status;
        $candidate->sex              = $request->sex;
        $candidate->travel           = $request->travel;
        $candidate->change           = $request->change;
        $candidate->journey_id       = $request->journey_id;
        $candidate->contract_type_id = $request->contract_type_id;
        $candidate->min_hierarchy_id = $request->min_hierarchy_id;
        $candidate->max_hierarchy_id = $request->max_hierarchy_id;
        $candidate->salary           = str_replace(',', '.', str_replace('.', '', $request->salary));
        $candidate->birthdate        = implode("-", array_reverse(explode("/", $request->birthdate)));
        $candidate->linkedin            = $request->linkedin;
        $candidate->facebook            = $request->facebook;
        $candidate->twitter             = $request->twitter;
        $candidate->blog                = $request->blog;

        foreach ($candidate->specials()->get() as $special) {
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
        } else {
            $candidate->special_description = null;
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

        if ($finish == 1) {
            $request->session()->put('occupation', $candidate->occupation);
            return redirect(route('candidate.better', ['id' => $candidate->id]))
                ->with('success', 'Cadastro Finalizado');
        }
        return redirect(route('candidate.show'))->with('success', 'Cadastro Atualizado');
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:6|confirmed',
        ]);

        $candidate = Auth::guard('candidate')->user();

        $candidate->password = encrypt($request->password);
        $candidate->save();
        return redirect()->back()->with('success', 'Senha alterada!');
    }

    public function better($id)
    {
        $candidate = Candidate::find($id);
        return view('candidate.pages.curriculum.better')
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('drivers', Driver::all())
            ->with('journeys', Journey::all())
            ->with('cities', City::all())
            ->with('levels', Level::all())
            ->with('courses', Course::all())
            ->with('vehicles', Vehicle::all())
            ->with('specials', Special::all())
            ->with('languages', Language::all())
            ->with('knowledges', Knowledge::all())
            ->with('subknowledges', Subknowledge::all())
            ->with('hierarchies', Hierarchy::all())
            ->with('contract_types', ContractType::all())
            ->with('candidate', $candidate);
    }

    public function show()
    {
        $candidate = Auth::guard('candidate')->user();

        $candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
        return view('candidate.pages.curriculum.show')
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

    public function opportunity()
    {
        return view('candidate.pages.buscar-vagas')
            ->with('states', State::all());
    }

    public function search(Request $request)
    {
        $opportunities = new Opportunity;

        if ($request->has('name')) {
            if (request('name') != '') {
                $opportunities = $opportunities->where('name', 'like', '%' . request('name') . '%');
            }
        }
        if ($request->has('salary')) {
            if (request('salary') != '') {
                $opportunities = $opportunities->where('salary', '>', request('salary'));
            }
        }

        if ($request->has('state_id')) {
            if (request('state_id') != '') {
                $opportunities = $opportunities->where('state_id', request('state_id'));
            }
        }

        if ($request->has('city_id')) {
            if (request('city_id') != '') {
                $opportunities = $opportunities->where('city_id', request('city_id'));
            }
        }

        if ($request->has('contract_type_id')) {
            if (request('contract_type_id') != '') {
                $opportunities = $opportunities->where('contract_type_id', request('contract_type_id'));
            }
        }
        $companiesId = $opportunities->pluck('company_id')->toArray();
        $companies = Company::whereIn('id', $companiesId)->whereNull('special_company')->get();
        $companies = $companies->filter(function ($company) {
            if ($company->transaction) {
                if($company->transaction->status == 'SUSPENDED')
                return $company;
            }
            return $company;
        });
        $companiesId = $companies->pluck('id')->toArray();
        $opportunities = $opportunities->whereNotIn('company_id', $companiesId);
        
        $opportunities = $opportunities->orderBy('name', 'asc')->get();
        foreach ($opportunities as $opportunity) {
            $search = new OpportunitySearch;
            $search->opportunity_id = $opportunity->id;
            $search->save();
        }

        return view('candidate.pages.resultado-busca')
            ->with('states', State::all())
            ->with('countries', Country::all())
            ->with('specials', Special::all())
            ->with('languages', Language::all())
            ->with('contract_types', ContractType::all())
            ->with('opportunities', $opportunities);
    }

    public function showOpportunity($id)
    {
        $opportunity = Opportunity::find($id);

        return view('candidate.pages.opportunity.show')
            ->with('states', State::all())
            ->with('specials', Special::all())
            ->with('languages', Language::all())
            ->with('contract_types', ContractType::all())
            ->with('opportunity', $opportunity);
    }

    public function application($id)
    {
        $candidate = Auth::guard('candidate')->user();

        $opportunity = Opportunity::find($id);
        $op = new OpportunityCandidate;
        $op->candidate_id = $candidate->id;
        $op->opportunity_id = $opportunity->id;
        $op->save();

        return redirect()->back()
            ->with('success', 'Canidatura Realizada');
    }
    public function app()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.pages.application.all-application')->with('candidate', $candidate);
    }

    public function indexMessage()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.pages.messages.all-messages')->with('candidate', $candidate);
    }

    public function getCourses(Request $request)
    {
        $courses = Course::where('level_id', $request->level_id)->get();

        return json_encode($courses);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();

        return json_encode($cities);
    }

    public function getSubknowledges(Request $request)
    {
        $subknowledges = Subknowledge::where('knowledge_id', $request->knowledge_id)->get();

        return json_encode($subknowledges);
    }
}

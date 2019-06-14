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
use App\Experience;
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
        $cep = implode("",(explode("-", $request->cep)));

        $url = "http://viacep.com.br/ws/{$cep}/json/";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);

        curl_close($ch);

        $dadosCep = json_decode($result);

        $candidate = new Candidate;
        $candidate->name        = $request->name;
        $candidate->email       = $request->email;
        $candidate->cep         = $request->cep;
        $candidate->street      = $dadosCep->logradouro;
        $candidate->state       = $dadosCep->uf;
        $candidate->nehighbor   = $dadosCep->bairro;
        $candidate->city        = $dadosCep->localidade;
        $candidate->occupation  = $request->occupation;
        $candidate->password    = bcrypt($request->password);

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

        $candidate->state            = $request->state;
        $candidate->cpf              = $request->cpf;
        if ($request->cep != NULL) {
            $candidate->cep              = $request->cep;
            $candidate->street           = $request->street;
            $candidate->state            = $request->state;
            $candidate->nehighbor        = $request->nehighbor;
            $candidate->city             = $request->city;
        }
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

        if ($finish ==1) {
            $request->session()->put('occupation', $candidate->occupation);
            return redirect(route('candidate.better', ['id' => $candidate->id]))
            ->with('success','Cadastro Finalizado');
        }
        return redirect(route('candidate.show'))->with('success','Cadastro Atualizado');
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password'          => 'required|min:6|confirmed',
        ]);

        $candidate = Auth::guard('candidate')->user();

        $candidate->password = bcrypt($request->password);
        $candidate->save();
        return redirect()->back()->with('success', 'Senha alterada!');
    }

    public function formation(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'country_id'        => 'required',
            'level_id'          => 'required',
            'course_id'         => 'required',
            'startMonth'        => 'required|min:2',
            'startYear'         => 'required|min:4',
            'finishMonth'       => 'min:2',
            'finishYear'        => 'min:4',
            'situation'         => 'required',
        ]);
        $formation = new Formation;
        $formation->name            = $request->name;
        $formation->country_id      = $request->country_id;
        $formation->state_id        = $request->state_id;
        $formation->level_id        = $request->level;
        $formation->course_id       = $request->course;
        $formation->situation       = $request->situation;
        $formation->start_month     = $request->startMonth;
        $formation->start_year      = $request->startYear;
        $formation->finish_month    = $request->finishMonth;
        $formation->finish_year     = $request->finishYear;
        $formation->candidate_id    = $request->candidate_id;

        $formation->save();

        return redirect()->back()->with('success', 'Formação incluída com sucesso!');
    }

    public function formationDestroy($id)
    {
        $formation = Formation::find($id);

        $formation->delete();

        return redirect()->back()->with('success', 'Conhecimento removido com sucesso');
    }

    public function courseFormation(Request $request)
    {
        $course = Course::where('level_id', $request->level_id)->get();

        return json_encode($course);
    }

    public function experience(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'occupation'        => 'required',
            'hierarchy_id'      => 'required',
            'description'       => 'required',
            'country_id'        => 'required',
            'start'             => 'required',
        ]);
        $experience = new Experience;
        $experience->name           = $request->name;
        $experience->occupation     = $request->occupation;
        $experience->hierarchy_id   = $request->hierarchy_id;
        $experience->description    = $request->description;
        $experience->country_id     = $request->country_id;
        $experience->state_id       = $request->state_id;
        $experience->start          = $request->start;
        $experience->finish         = $request->finish;
        $experience->candidate_id   = $request->candidate_id;

        $experience->save();

        return redirect()->back()->with('success', 'Experiência incluída com sucesso!');
    }
    

    public function language(Request $request)
    {
        $this->validate($request, [
            'language_id'   => 'required',
            'level'         => 'required',
        ]);

        $language = new CandidateLanguage;
        $language->language_id      = $request->language_id;
        $language->level            = $request->level;
        $language->candidate_id    = $request->candidate_id;

        $language->save();
        return redirect()->back()->with('success', 'Idioma incluída com sucesso!');
    }

    public function languageDestroy($id)
    {
        $language = CandidateLanguage::find($id);

        $language->delete();

        return redirect()->back()->with('success', 'Idioma removido com sucesso');
    }

    public function knowledge(Request $request)
    {
        $this->validate($request, [
            'knowledge_id'      => 'required',
            'subknowledge_id'   => 'required',
        ]);
        foreach ($request->subknowledge_id as $subknowledge) {
            $know = CandidateKnowledge::where('knowledge_id', $request->knowledge_id)->where('subknowledge_id', $subknowledge)->where('candidate_id', $request->candidate_id);
            if ($know->count() == 0) {
                $knowledge = new CandidateKnowledge;
                $knowledge->knowledge_id        = $request->knowledge_id;
                $knowledge->subknowledge_id     = $subknowledge;
                $knowledge->candidate_id        = $request->candidate_id;
                $knowledge->save();
            }
        }

        return redirect()->back()->with('success', 'Área de Conhecimento incluída com sucesso!');
    }

    public function subknowledge(Request $request)
    {
        $subknowledge = Subknowledge::where('knowledge_id', $request->knowledge_id)->get();

        return json_encode($subknowledge);
    }

    public function knowledgeDestroy($id)
    {
        $knowledge = CandidateKnowledge::find($id);

        $knowledge->delete();

        return redirect()->back()->with('success', 'Conhecimento removido com sucesso');
    }

    public function better($id)
    {
        $candidate = Candidate::find($id);
        foreach ($candidate->languages as $language) {
            $lang = CandidateLanguage::where('candidate_id', $candidate->id)->where('language_id', $language->id)->first();
            $language->level = $lang->level;
        }
        return view('candidate.pages.curriculum.better')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
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

    public function show(){
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
        return view('candidate.pages.buscar-vagas');
    }

    public function search(Request $request)
    {
        $opportunities = new Opportunity;

        if($request->has('name')){
            if(request('name') != ''){
                $opportunities = $opportunities->where('name', 'like', '%' . request('name') . '%');
            }
        }
        if($request->has('salary')){
            if(request('salary') != ''){
                $opportunities = $opportunities->where('salary', '>', request('salary'));
            }
        }

        if($request->has('state_id')){
            if(request('state_id') != ''){
                $opportunities = $opportunities->where('state_id', request('state_id'));
            }
        }

        if($request->has('city_id')){
            if(request('city_id') != ''){
                $opportunities = $opportunities->where('city_id', request('city_id'));
            }
        }

        if($request->has('contract_type_id')){
            if(request('contract_type_id') != ''){
                $opportunities = $opportunities->where('contract_type_id', request('contract_type_id'));
            }
        }
        
        $opportunities = $opportunities->orderBy('name', 'asc')->paginate(10);
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
        ->with('success','Canidatura Realizada');
    }
    public function app()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.pages.application.all-application')->with('candidate', $candidate);
    }

    public function cities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return json_encode($cities);
    }

    public function indexMessage()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.pages.messages.all-messages')->with('candidate', $candidate);
    }
}

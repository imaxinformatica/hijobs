<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\Driver;
use App\Special;
use App\Country;
use App\Journey;
use App\Vehicle;
use App\Language;
use App\Candidate;
use App\Hierarchy;
use App\Knowledge;
use App\ContractType;
use App\Subknowledge;
use App\CandidateDriver;
use App\CandidateVehicle;
use App\CandidateSpecial;
use App\CandidateLanguage;
use App\CandidateKnowledge;
use App\CandidateFormation;
use App\CandidateExperience;
use Auth;

class CandidateController extends Controller
{
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
        $candidate = new Candidate;
        $candidate->name        = $request->name;
        $candidate->email       = $request->email;
        $candidate->cep         = $request->cep;
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

    public function edit($id)
    {
        $candidate = Candidate::find($id);

        $candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
        return view('candidate.pages.curriculum.edit-curriculum')
        ->with('states', State::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('languages', Language::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all())
        ->with('formations', CandidateFormation::where('candidate_id', $id))
        ->with('candidate', $candidate);
    }

    public function formation(Request $request)
    {
        $formation = new CandidateFormation;
        $formation->name            = $request->name;
        $formation->country_id      = $request->country_id;
        $formation->state_id        = $request->state_id;
        $formation->level           = $request->level;
        $formation->course          = $request->course;
        $formation->situation       = $request->situation;
        $formation->start           = $request->start;
        $formation->finish          = $request->finish;
        $formation->candidate_id    = $request->candidate_id;

        $formation->save();

        return redirect()->back()->with('success', 'Formação incluída com sucesso!');
    }

    public function experience(Request $request)
    {
            $experience = new CandidateExperience;
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

            $language = new CandidateLanguage;
            $language->language_id      = $request->language_id;
            $language->level            = $request->level;
            $language->candidate_id    = $request->candidate_id;

            $language->save();

            return redirect()->back()->with('success', 'Idioma incluída com sucesso!');
    }

    public function knowledge(Request $request)
    {
        // return dd($request);
            $knowledge = new CandidateKnowledge;
            $knowledge->knowledge_id        = $request->knowledge_id;
            $knowledge->subknowledge_id     = $request->subknowledge_id;
            $knowledge->candidate_id        = $request->candidate_id;

            $knowledge->save();

            return redirect()->back()->with('success', 'Área de Conhecimento incluída com sucesso!');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'state_id'          => 'required',
            'cpf'               => 'required|max:50|unique:candidates',
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

        if (isset($request->special)) {
            foreach ($request->special as $specials) {
                $special               = new CandidateSpecial;
                $special->candidate_id = $candidate->id; 
                $special->special_id   = $specials;
                $special->save();
            }
            $candidate->special_description = $request->special_description;
        }

        if (isset($request->drivers)) {
            foreach ($request->drivers as $drivers) {
                $driver               = new CandidateDriver;
                $driver->candidate_id = $candidate->id; 
                $driver->driver_id   = $drivers;
                $driver->save();
            }
        }

        if (isset($request->vehicles)) {
            foreach ($request->vehicles as $vehicles) {
                $vehicle               = new CandidateVehicle;
                $vehicle->candidate_id = $candidate->id; 
                $vehicle->vehicle_id   = $vehicles;
                $vehicle->save();
            }
        }
        $candidate->save();
        return redirect(route('candidate.better', ['id' => $candidate->id]));
    }

    public function better($id)
    {
        $candidate = Candidate::find($id);
        foreach ($candidate->languages as $language) {
            $lang = CandidateLanguage::where('candidate_id', $candidate->id)->where('language_id', $language->id)->first();
            $language->level = $lang->level;
        }

        return view('candidate.pages.curriculum.better-curriculum')
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

    public function search()
    {
        return view('candidate.pages.buscar-vagas');
    }
}

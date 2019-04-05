<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\State;
use App\Special;
use App\Driver;
use App\Journey;
use App\Vehicle;
use App\Language;
use App\Hierarchy;
use App\ContractType;
use App\CandidateSpecial;
use App\CandidateDriver;
use App\CandidateVehicle;
use Auth;

class CandidateController extends Controller
{
    public function create()
    {
    	return view('candidate.pages.cadastrar-curriculo');
    }

    public function data(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|max:50|unique:candidates',
            'cep'               => 'required',
            'occupation'        => 'required',
            'password'          => 'required|min:6|confirmed',
        ]);
        // return dd($request);
        $candidate = new Candidate;
        $candidate->name        = $request->name;
        $candidate->email       = $request->email;
        $candidate->cep         = $request->cep;
        $candidate->occupation  = $request->occupation;
        $candidate->password    = $request->password;

        $candidate->save();

        Auth::guard('candidate')->loginUsingId($candidate->id, true);
        return view('candidate.pages.dados-curriculo')
        ->with('states', State::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all())
        ->with('candidate_id', $candidate->id);
    }

    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('candidate.pages.curriculum.edit-curriculum')
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

    public function formation()
    {
            
    }

    public function experience()
    {
            
    }

    public function language()
    {
            
    }

    public function knowledge()
    {
            
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
        return redirect(route('candidate.search'));
    }

    public function search()
    {
        return view('candidate.pages.buscar-vagas');
    }
}

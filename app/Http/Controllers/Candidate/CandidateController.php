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
use App\Hierarchy;
use App\ContractType;
use Auth;

class CandidateController extends Controller
{
    public function create()
    {
    	return view('candidate.pages.cadastrar-curriculo');
    }

    public function data(Request $request)
    {
        $auth = Candidate::where('email', $request->email)->first();


        return view('candidate.pages.dados-curriculo');
        ->with('states', State::all())
        ->with('drivers', Driver::all())
        ->with('journeys', Journey::all())
        ->with('vehicles', Vehicle::all())
        ->with('specials', Special::all())
        ->with('hierarchies', Hierarchy::all())
        ->with('contract_types', ContractType::all());
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
        return dd($request);

        $candidate                      = Candidate::find($request->user_id);
        $candidate->state_id            = $request->state_id;
        $candidate->cpf                 = $request->cpf;
        $candidate->phone               = $request->phone;
        $candidate->marital_status      = $request->marital_status;
        $candidate->sex                 = $request->sex;
        $candidate->travel              = $request->travel;
        $candidate->change              = $request->change;
        $candidate->journey_id          = $request->journey_id;
        $candidate->contract_type_id    = $request->contract_type_id;
        $candidate->min_hierarchy_id    = $request->min_hierarchy_id;
        $candidate->max_hierarchy_id    = $request->max_hierarchy_id;
        $candidate->salary              = $request->salary;
        $candidate->birthdate           = implode("-", array_reverse(explode("/", $request->birthdate)));

        //Verificar validação.
        if (filter_var($request->linkedin, FILTER_VALIDATE_URL) === FALSE) {
            return redirect()->back()->with('success', 'Informar URL válida do Linkedin');
        }
        if (filter_var($request->facebook, FILTER_VALIDATE_URL) === FALSE) {
            return redirect()->back()->with('success', 'Informar URL válida do Facebook');
        }
        if (filter_var($request->twitter, FILTER_VALIDATE_URL) === FALSE) {
            return redirect()->back()->with('success', 'Informar URL válida do Twitter');
        }
        if (filter_var($request->blog, FILTER_VALIDATE_URL) === FALSE) {
            return redirect()->back()->with('success', 'Informar URL válida do Blog');
        }
        $candidate->linkedin            = $request->linkedin;
        $candidate->facebook            = $request->facebook;
        $candidate->twitter             = $request->twitter;
        $candidate->blog                = $request->blog;

        if (isset($request->special)) {
            foreach ($request->special as $specials) {
                $special               = new CandidateSpecial;
                $special->candidate_id = $auth->id; 
                $special->special_id   = $specials;
                $special->save();
            }
            $candidate->special_description = $request->special_description;
        }

        if (isset($request->drivers)) {
            foreach ($request->drivers as $drivers) {
                $driver               = new CandidateSpecial;
                $driver->candidate_id = $auth->id; 
                $driver->special_id   = $special;
                $driver->save();
            }
        }

        if (isset($request->vehicles)) {
            foreach ($request->vehicles as $vehicles) {
                $vehicle               = new CandidateSpecial;
                $vehicle->candidate_id = $auth->id; 
                $vehicle->special_id   = $special;
                $vehicle->save();
            }
        }


    }
}

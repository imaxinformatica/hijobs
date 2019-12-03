<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\CandidateDriver;
use App\CandidateSpecial;
use App\State;
use App\Country;
use App\Driver;
use App\Vehicle;
use App\Special;
use App\Language;
use App\ContractType;
use App\Knowledge;
use App\Subknowledge;
use App\Hierarchy;
use App\Journey;
use App\CandidateState;
use App\CandidateVehicle;
use App\City;
use App\Course;
use App\Level;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Notifications\SendData;
use App\Services\CandidateService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CandidateController extends Controller
{

    public function create()
    {
        return view('admin.pages.candidate.create')
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
            ->with('contract_types', ContractType::all());
    }

    public function edit($id)
    {
        $candidate = Candidate::find($id);
        $candidate->birthdate = implode("/", array_reverse(explode("-", $candidate->birthdate)));
        return view('admin.pages.candidate.edit')
            ->with('states', State::all())
            ->with('cities', City::all())
            ->with('countries', Country::all())
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

    public function store(CandidateRequest $request, CandidateService $sv)
    {
        try {
            $sv->create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ops, tivemos um problema no servidor:' . $e->getMessage());
        }
        $candidate = Candidate::get()->last();
        return redirect()->route('admin.candidate.edit', ['id' => $candidate->id])
            ->with('success', 'Usuario adicionado com sucesso');
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cpf' => [
                'nullable',
                Rule::unique('candidates')->ignore($request->id),
            ],
            'email' => [
                'required',
                Rule::unique('candidates')->ignore($request->id),
            ],
            // 'state' => 'required',
            // 'marital_status' => 'required',
            // 'birthdate' => 'required',
            // 'sex' => 'required',
            // 'travel' => 'required',
            // 'change' => 'required',
            // 'journey_id' => 'required',
            // 'contract_type_id' => 'required',
            // 'min_hierarchy_id' => 'required',
            // 'max_hierarchy_id' => 'required',
            // 'salary' => 'required',
        ]);

        $candidate = Candidate::find($request->id);
        $finish = 0;
        if ($candidate->cpf == null) {
            $finish = 1;
        }

        $candidate->name = $request->name;
        $candidate->email = $request->email;
        $candidate->cep = $request->cep;
        $candidate->street = $request->street;
        $candidate->number = $request->number;
        $candidate->nehighbor = $request->nehighbor;
        $candidate->city = $request->city;
        $candidate->state = $request->state;
        $candidate->cpf = $request->cpf;
        $candidate->phone = $request->phone;
        $candidate->marital_status = $request->marital_status;
        $candidate->sex = $request->sex;
        $candidate->travel = $request->travel;
        $candidate->change = $request->change;
        $candidate->journey_id = $request->journey_id;
        $candidate->contract_type_id = $request->contract_type_id;
        $candidate->min_hierarchy_id = $request->min_hierarchy_id;
        $candidate->max_hierarchy_id = $request->max_hierarchy_id;
        $candidate->salary = $request->salary ? str_replace(',', '.', str_replace('.', '', $request->salary)) : null;
        $candidate->birthdate = $request->birthdate ? implode("-", array_reverse(explode("/", $request->birthdate))) : null;
        $candidate->linkedin = $request->linkedin;
        $candidate->facebook = $request->facebook;
        $candidate->twitter = $request->twitter;
        $candidate->blog = $request->blog;
        foreach ($candidate->specials()->get() as $special) {
            $special->pivot->delete();
        }
        if (isset($request->isSpecial)) {
            foreach ($request->specials as $specials) {
                $special = new CandidateSpecial;
                $special->candidate_id = $candidate->id;
                $special->special_id = $specials;
                $special->save();
            }
            $candidate->special_description = $request->special_description;
            $candidate->special = 1;
        }

        foreach ($candidate->driver as $driver) {
            $driver->pivot->delete();
        }
        if (isset($request->driver)) {
            foreach ($request->driver as $drivers) {
                $driver = new CandidateDriver;
                $driver->candidate_id = $candidate->id;
                $driver->driver_id = $drivers;
                $driver->save();
            }
        }

        foreach ($candidate->vehicle as $vehicles) {
            $vehicles->pivot->delete();
        }
        if (isset($request->vehicle)) {
            foreach ($request->vehicle as $vehicles) {
                $vehicle = new CandidateVehicle;
                $vehicle->candidate_id = $candidate->id;
                $vehicle->vehicle_id = $vehicles;
                $vehicle->save();
            }
        }

        foreach ($candidate->stateWork as $state_work) {
            $state_work->pivot->delete();
        }
        if (isset($request->state_work)) {
            foreach ($request->state_work as $works) {
                $work = new CandidateState;
                $work->candidate_id = $candidate->id;
                $work->state_id = $works;
                $work->save();
            }
        }
        $candidate->save();

        return redirect()->back()->with('success', 'Candidato Editado.');
    }

    public function sendData(Candidate $candidate)
    {

        $candidate->notify(new SendData(
            $candidate
        ));
        return redirect()->back()->with('success', 'Dados enviados com sucesso');
    }
}

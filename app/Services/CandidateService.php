<?php

namespace App\Services;

use App\Candidate;
use App\CandidateDriver;
use App\CandidateSpecial;
use App\CandidateState;
use App\CandidateVehicle;
use Illuminate\Support\Facades\DB;
use Auth;

class CandidateService
{
    public function create(array $data)
    {
        $data['salary'] = str_replace(',', '.', str_replace('.', '', $data['salary']));
        $data['birthdate'] = implode("-", array_reverse(explode("/", $data['birthdate'])));
        $data['password'] = bcrypt($data['password']);
        DB::transaction(function () use ($data) {

            $candidate = Candidate::create($data);

            $a = Auth::guard('admin')->user();
            if (isset($data['isSpecial'])) {
                $this->setSpecial($data['specials'], $candidate->id, $data['special_description']);
            }
            if (isset($data['driver'])) {
                $this->setDriver($data['driver'], $candidate->id);
            }
            if (isset($data['vehicle'])) {
                $this->setVehicle($data['vehicle'], $candidate->id);
            }
            if (isset($data['state_work'])) {
                $this->setStateWork($data['state_work'], $candidate->id);
            }
        });
    }

    public function setSpecial(array $arraySpecial, $candidate_id, $special_description)
    {
        foreach ($arraySpecial as $specials) {
            $special = new CandidateSpecial();
            $special->candidate_id = $candidate_id;
            $special->special_id = $specials;
            $special->save();
        }
        Candidate::find($candidate_id)->update([
            'special' => 1,
            'special_description' => $special_description,
        ]);
    }
    public function setDriver(array $arrayDriver, $candidate_id)
    {
        foreach ($arrayDriver as $drivers) {
            $driver = new CandidateDriver();
            $driver->candidate_id = $candidate_id;
            $driver->driver_id = $drivers;
            $driver->save();
        }
    }
    public function setVehicle(array $arrayVehicle, $candidate_id)
    {
        foreach ($arrayVehicle as $vehicles) {
            $vehicle = new CandidateVehicle();
            $vehicle->candidate_id = $candidate_id;
            $vehicle->vehicle_id = $vehicles;
            $vehicle->save();
        }
    }
    public function setStateWork(array $stateWork, $candidate_id)
    {
        foreach ($stateWork as $works) {
            $work = new CandidateState();
            $work->candidate_id = $candidate_id;
            $work->state_id = $works;
            $work->save();
        }
    }
}

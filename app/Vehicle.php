<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->belongsToMany('App\Candidate', 'candidate_vehicle');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->belongsToMany('App\Candidate', 'candidate_driver');
    }
}

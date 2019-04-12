<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->belongsToMany('App\Candidate', 'candidate_language')->withPivot('level');;
    }
}

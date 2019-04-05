<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->belongsToMany('App\Candidate', 'candidate_knowledge');
    }
}

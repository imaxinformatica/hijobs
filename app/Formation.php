<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'name','country_id', 'state_id', 'level_id', 
        'course_id', 'situation', 'start', 'finish', 'candidate_id'
            
    ];

}

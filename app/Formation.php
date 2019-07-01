<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'name',
        'country_id',
        'state_id',
        'level_id',
        'course_id',
        'situation',
        'start_month',
        'start_year',
        'finish_month',
        'finish_year',
        'candidate_id',
    ];

    public function level()
    {
    	return $this->belongsTo('App\Level');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course');
    }

}

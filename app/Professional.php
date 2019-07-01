<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    protected $fillable = [
        'name',
        'occupation',
        'hierarchy_id',
        'description',
        'country_id',
        'city_id',
        'state_id',
        'start_month',
        'start_year',
        'finish_month',
        'finish_year',
        'candidate_id'
    ];


    public function hierarchy()
    {
    	return $this->belongsTo('App\Hierarchy');
    }
}

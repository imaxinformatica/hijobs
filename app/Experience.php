<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'name', 'occupation', 'hierarchy_id', 'description', 'country_id', 'state_id', 'start', 'finish', 'candidate_id'
    ];


    public function hierarchy()
    {
    	return $this->belongsTo('App\Hierarchy');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = [
        'name', 'salary', 'activity', 'requiriments', 'comments_special', 'contract_type_id', 'state_id', 'company_id'
    ];


    public function city()
    {
        return $this->belongsToMany('App\City', 'opportunity_city', 'opportunity_id', 'city_id');
    }

    public function state()
    {
        return $this->belongsToMany('App\State', 'opportunity_state', 'opportunity_id', 'state_id');
    }

    public function contract()
    {
        return $this->belongsTo('App\ContractType', 'contract_type_id');
    }

    public function candidate()
    {
        return $this->belongsToMany('App\Candidate', 'opportunity_candidate');
    }

}

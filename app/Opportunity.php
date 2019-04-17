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
        return $this->belongsTo('App\City');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function contract()
    {
        return $this->belongsTo('App\ContractType', 'contract_type_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function candidate()
    {
        return $this->belongsToMany('App\Candidate', 'opportunity_candidate');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'text','candidate_id', 'sent', 'company_id'
    ];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}

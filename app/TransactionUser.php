<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionUser extends Model
{
    public function plan()
    {
    	return $this->belongsTo('App\Plan', 'plan_id', 'code');
    }

    public function user()
    {
    	return $this->belongsTo('App\Candidate', 'user_id');
    }
}

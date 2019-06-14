<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
		'code',
		'name',
		'value',
    ];

    public function transactions()
    {
    	return $this->hasMany('App\TransactionUser', 'plan_id', 'code');
    }
}

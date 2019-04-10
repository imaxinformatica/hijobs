<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = [
        'name', 'salary', 'activity', 'requiriments', 'comments_special', 'contract_type_id', 'state_id' 'company_id'
    ];
}

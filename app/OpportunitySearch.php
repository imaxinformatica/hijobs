<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpportunitySearch extends Model
{
    protected $table = 'opportunity_search';

    protected $fillable = [
        'opportunity_id', 
    ];

}

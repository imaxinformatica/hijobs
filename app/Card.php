<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
		'card_number',	
		'brand',		
		'exp_month',	
		'exp_year',		
		'hash',			
		'candidate_id', 
    ]; 
}

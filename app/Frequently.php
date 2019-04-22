<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequently extends Model
{
    protected $table = 'frequently';

    protected $fillable = [
        'question', 'answer' 
    ];
}

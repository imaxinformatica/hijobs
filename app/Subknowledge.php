<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subknowledge extends Model
{
    protected $table = 'subknowledges';

    protected $fillable = [
        'name, knowledge_id',
    ];
}

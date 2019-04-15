<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $fillable = [
        'name',
    ];

    public function candidate()
    {
        return $this->belongsToMany('App\Special', 'candidate_special', 'candidate_id', 'special_id');
    }
}

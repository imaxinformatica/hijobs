<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
	protected $table = 'knowledges';

    protected $fillable = [
        'name',
    ];

    public function candidates()
    {
        return $this->belongsToMany('App\Candidate', 'candidate_knowledge');
    }

    public function subknowledges()
    {
        return $this->hasMany('App\Subknowledge');
    }

}

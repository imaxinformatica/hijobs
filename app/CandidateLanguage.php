<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateLanguage extends Model
{
    protected $table = 'candidate_language';

    protected $fillable = [
        'language_id',
        'level',
        'candidate_id'
    ];

    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}

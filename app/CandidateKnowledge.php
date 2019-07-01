<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateKnowledge extends Model
{
    protected $table = 'candidate_knowledge';
    
    protected $fillable = [
        'knowledge_id',
        'subknowledge_id',
        'candidate_id',
    ];

    public function knowledge()
    {
        return $this->belongsTo('App\Knowledge');
    }
    public function subknowledge()
    {
        return $this->belongsTo('App\Subknowledge');
    }
}

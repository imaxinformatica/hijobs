<?php

namespace App;

use App\Notifications\CandidateResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cpf', 'state_id','phone', 'birthdate',
        'marital_status', 'sex', 'special','special_description',
        'linkedin', 'facebook','twitter', 'blog', 'travel', 'change',
        'journey_id','contract_type_id', 'max_hierarchy_id', 'salary',
    ];
            
           
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CandidateResetPassword($token));
    }

    public function special()
    {
        return $this->belongsToMany('App\Special', 'candidate_special');
    }

    public function driver()
    {
        return $this->belongsToMany('App\Driver');
    }

    public function journey()
    {
        return $this->belongsTo('App\Journey');   
    }

    public function contract_type()
    {
        return $this->belongsTo('App\ContractType');   
    }

    public function max_hierarchy()
    {
        return $this->belongsTo('App\Hierarchy', 'max_hierarchy_id');   
    }

    public function min_hierarchy()
    {
        return $this->belongsTo('App\Hierarchy', 'min_hierarchy_id');   
    }

    public function vehicle()
    {
        return $this->belongsToMany('App\Vehicle');
    }

    public function stateWork()
    {
        return $this->belongsToMany('App\State');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function formations()
    {
        return $this->hasMany('App\Formation');
    }

    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language', 'candidate_language')->withPivot('level');
    }

    public function knowledges()
    {
        return $this->belongsToMany('App\Knowledge')->withPivot('subknowledge_id');
    }


    public function opportunity()
    {
        return $this->belongsToMany('App\Opportunity', 'opportunity_candidate');
    }
    
}

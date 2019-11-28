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
        'name', 'email', 'cpf', 'state_id', 'phone', 'birthdate',
        'marital_status', 'sex', 'special', 'special_description',
        'linkedin', 'facebook', 'twitter', 'blog', 'travel', 'change',
        'journey_id', 'contract_type_id', 'max_hierarchy_id', 'salary', 'complement'
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

    public function specials()
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
    public function formations()
    {
        return $this->hasMany('App\Formation');
    }
    public function professionals()
    {
        return $this->hasMany('App\Professional');
    }
    public function language_candidates()
    {
        return $this->hasMany('App\CandidateLanguage');
    }
    public function knowledges()
    {
        return $this->hasMany('App\CandidateKnowledge');
    }
    public function occupation_area()
    {
        return $this->belongsTo('App\OccupationArea');
    }

    public function opportunity()
    {
        return $this->belongsToMany('App\Opportunity', 'opportunity_candidate');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function card()
    {
        return $this->hasOne('App\Card', 'user_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\TransactionUser', 'user_id')->where('type', 1);
    }
}

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

    public function formations()
    {
        return $this->hasMany('App\CandidateFormation');
    }

    public function experiences()
    {
        return $this->hasMany('App\CandidateExperience');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language');
    }

    public function knowledges()
    {
        return $this->belongsToMany('App\Knowledge');
    }
    
}

<?php

namespace App;

use App\Notifications\CompanyResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        $this->notify(new CompanyResetPassword($token));
    }

    public function opportunities()
    {
        return $this->hasMany('App\Opportunity');
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
        return $this->hasOne('App\TransactionUser', 'user_id')->where('type', 2);
    }
}

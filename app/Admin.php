<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // one to many relationship between admin & questionnaires
    public function questionnaires(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Questionnaire::class);
    }
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
    public function activity_register()
    {
        return $this->hasMany(activity_register::class);
    }
}

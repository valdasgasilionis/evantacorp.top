<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin(){
        if (auth()->id() === 1) {    // admin ID number here....
            return true;
        }
    }
    public function isClinician(){
        if (auth()->id() === 2 | auth()->id() === 3) { // clinician ID number here..
            return true; 
        }
    }
    public function isPathologist(){
        if (auth()->id() === 4 | auth()->id() === 5) {  // pathologist ID numbers here..
            return true;
        }
    }
    public function isTechnologist(){
        if (auth()->id() === 6 | auth()->id() === 7) { // technologist ID numbers here..
            return true;
        }
    }
}

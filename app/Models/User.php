<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return (int) $this->role === User::ROLE_ADMIN;
    }

    public function canCreate()
    {
        if($this->role == User::ROLE_ADMIN || $this->role == User::ROLE_MANAGER)
        {
            return true;
        }else{
            return false;
        }
    }
}

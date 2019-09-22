<?php

namespace App;

use Illuminate\Database\Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
     * Relationship with user profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile() : Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserProfile::class);
    }
}

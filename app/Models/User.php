<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable; // removed HasApiTokens

    protected $fillable = [
    'name',
    'email',
    'password',
    'handle', // add handle here
];


    protected $hidden = ['password','remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships
    public function tweets() { return $this->hasMany(Tweet::class); }
    public function likes() { return $this->hasMany(Like::class); }
    public function retweets() { return $this->hasMany(Retweet::class); }
    public function profile() { return $this->hasOne(Profile::class); }
}

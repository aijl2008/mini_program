<?php

namespace App\Models;

use App\FollowModel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        "name",
        "nickname",
        "open_id",
        "union_id",
        "email",
        "avatar",
        "password"
    ];

    protected $hidden = [
        'password'
    ];

    function liked()
    {
        return $this->belongsToMany(Video::class)->withTimestamps();
    }

    function followed()
    {
        return $this->belongsToMany(Followed::class)->withTimestamps();
    }

    function video()
    {
        return $this->hasMany(Video::class, 'user_id');
    }
}

<?php

namespace App\Models;

use App\FollowModel;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $casts = [
        "id" => "string"
    ];
    protected $fillable = [
        "id" ,
        "name",
        "mobile",
        "email",
        "avatar",
        "password"
    ];

    function liked(){
        return $this->belongsToMany (Video::class)->withTimestamps();
    }

    function followed(){
        return $this->belongsToMany(Followed::class)->withTimestamps();
    }

    function video(){
        return $this->hasMany(Video::class,'user_id');
    }
}

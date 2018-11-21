<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    function liked(){
        return $this->hasMany(Video::class);
    }

    function followed(){
        return $this->hasMany(User::class);
    }
}

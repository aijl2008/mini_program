<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Followed extends Model
{
    protected $table = "users";

    function video(){
        return $this->hasMany(Video::class,'user_id');
    }
}

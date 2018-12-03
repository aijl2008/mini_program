<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Wechat extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'wechats';

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
        return $this->hasMany(Video::class);
    }

    function updateRememberToken(){

    }

    function getStatusOption()
    {
        return [
            1 => '正常',
            0 => '不可用',
        ];
    }
}

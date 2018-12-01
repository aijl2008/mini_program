<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class WeChat extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'wechat';
}

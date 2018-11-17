<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wechat extends Authenticatable{  //
    use HasApiTokens, Notifiable;

    public function findForPassport($username) {
        return $this->where('openId', $username)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        $decrypted = Crypt::decryptString($password);
        if ($decrypted == $this->openId) {
            return true;
        }
        return false;
    }
}

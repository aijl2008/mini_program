<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class SelfAuthController extends Controller
{
    public function getEasyWechatSession()
    {
        $user = session('wechat.oauth_user.default');
        return $user;
    }

    public function autoLogin()
    {
        $userInfo = $this->getEasyWechatSession();
        $userModel = User::query()->find($userInfo['id']);

        if (!$userModel) {
            return redirect()->route('register');
        }
        Auth::login($userModel);
        return redirect()->intended();
    }

    public function autoRegister()
    {
        $userInfo = $this->getEasyWechatSession();
        $userData = [
            'password' => '',
            'name' => $userInfo['nickname'] ?: $userInfo['id'],
            'id' => $userInfo['id'],
        ];
        $userModel = User::create($userData);
        Auth::login($userModel);
        return redirect()->intended();
    }
}
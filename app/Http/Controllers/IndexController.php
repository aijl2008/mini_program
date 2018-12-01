<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index()
    {
        if (Auth::guard('wechat')->check()) {
            return (new RedirectResponse(route("my.videos.index")));
        } elseif (Auth::guard('admin')->check()) {
            return (new RedirectResponse(route("admin.videos.index")));
        } else {
            return (new RedirectResponse(route("wechat.login.show")));
        }
    }
}

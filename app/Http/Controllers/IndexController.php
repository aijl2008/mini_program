<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index()
    {
        dd(User::query()->find(1)->createToken('TutsForWeb'));
        if (Auth::check()) {
            return (new RedirectResponse(route("my.videos.index")));
        } else {
            return '<a href="/my/videos">Login</a>';
        }
    }
}

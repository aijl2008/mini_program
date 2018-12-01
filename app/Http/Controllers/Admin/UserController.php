<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeChat;

class UserController extends Controller
{
    function index()
    {
        return view('admin.users.index')->with('rows', WeChat::query()->paginate());
    }
}

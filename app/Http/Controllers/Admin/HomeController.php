<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index()
    {
        return redirect()->to(route('admin.users.index'));
    }
}

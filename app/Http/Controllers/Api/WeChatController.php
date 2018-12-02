<?php

namespace App\Http\Controllers\Api;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\WeChat;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index()
    {
        return Helper::success(WeChat::query()
            ->orderBy('id', 'desc')
            ->paginate(20));
    }
}

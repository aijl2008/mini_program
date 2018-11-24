<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:37
 */

namespace App\Http\Controllers\My;


use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function index()
    {
        return view('my.liked.index');
    }
}
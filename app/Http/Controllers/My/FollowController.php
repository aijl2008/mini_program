<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:37
 */

namespace App\Http\Controllers\My;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index(Request $request)
    {
        return view('my.followed.index');
    }
}
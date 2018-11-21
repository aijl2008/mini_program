<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:29
 */

namespace App\Http\Controllers\Api\My;


use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    function index(Request $request)
    {
        return Helper::success(
            call_user_func(function (User $user) {
                if (!$user) {
                    return [];
                }
                return $user->followed()->with(Video::class)->get()->toArray();
            },
                User::query()->find($request->input('user_id') ?: Helper::uid())
            )
        );
    }
}
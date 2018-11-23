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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FollowController extends Controller
{
    function index(Request $request)
    {
        return Helper::success(
            call_user_func(function (User $user) {
                if (!$user) {
                    return new LengthAwarePaginator([],0, 20);
                }
                return $user->followed()->with(
                    [
                        'video' => function(HasMany $query){
                            return $query->orderBy('id','desc')->take(10);
                        }
                    ]
                )->paginate(20);
            },
                User::query()->find(Helper::uid())
            )
        );
    }

    function store(Request $request){
        $user = User::query()->findOrFail(Helper::uid());
        $followed = User::query()->find($request->input('user_id'));
        if (!$followed){
            return Helper::error(-1,"不存在的用户");
        }
        if ($user->followed()->where("followed_id",$request->input('user_id'))->count()>0){
            return Helper::error(-1,"您已经关注过了");
        }
        $user->followed()->attach($request->input('user_id'));
        return Helper::success();
    }

    function destroy(Request $request, $user_id){
        $user = User::query()->findOrFail(Helper::uid());
        $user->followed()->detach($user_id);
        return Helper::success();
    }
}
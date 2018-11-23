<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:30
 */

namespace App\Http\Controllers\Api\My;


use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LikeController extends Controller
{
    function index(Request $request)
    {
        return Helper::success(
            call_user_func(function (User $user = null) {
                if (!$user){
                    return new LengthAwarePaginator([],0, 20);
                }
                return $user->liked()->paginate(20);
            }, User::query()->find(Helper::uid()))
        );
    }

    function store(Request $request){
        $user = User::query()->findOrFail(Helper::uid());
        $video = Video::query()->find($request->input('video_id'));
        if (!$video){
            return Helper::error(-1,"视频不存在");
        }
        if ($user->liked()->where("video_id",$video->id)->count()>0){
            return Helper::error(-1,"您已经喜欢过了");
        }
        $user->liked()->attach($video->id);
        return Helper::success();
    }

    function destroy(Request $request, $video_id){
        $user = User::query()->findOrFail(Helper::uid());
        $user->liked()->detach($video_id);
        return Helper::success();
    }
}
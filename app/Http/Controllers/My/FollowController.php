<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:37
 */

namespace App\Http\Controllers\My;


use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FollowController extends Controller
{
    public function index()
    {
        return view('my.followed.index')->with(
            'rows',
            User::query()->find(Helper::uid())
                ->followed()
                ->with(
                    [
                        'video' => function (HasMany $query) {
                            return $query->orderBy('id', 'desc')->take(10);
                        }
                    ]
                ));
    }
}
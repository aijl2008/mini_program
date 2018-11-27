<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:33
 */

namespace App\Http\Controllers\Api;


use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        return Helper::success(
            User::query()->paginate()
        );
    }

    /**
     * @param UserRequest $request
     * @return array
     */
    function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        $token = $user->createToken('TutsForWeb')->accessToken;
        return Helper::success($token);
    }

    public function login(Request $request)
    {
        $id = $request->id;
        $user = User::query()->find($id);

        if ($user) {
            $token = $user->createToken('TutsForWeb')->accessToken;
            return Helper::success($token);
        } else {
            return Helper::error(401,"授权失败");
        }
    }

}
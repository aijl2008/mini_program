<?php

namespace App\Http\Controllers\Api;

use App\Help\Http\Client;
use App\Help\MiniProgram\DataCrypt;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\Wechat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MiniProgramController extends Controller
{

    function user(Request $request)
    {
        return Helper::success(
            [
                'user' => $request->user('api')
            ]
        );
    }

    /**
     * @param Request $request
     * @see https://developers.weixin.qq.com/miniprogram/dev/api/code2Session.html
     * @return array
     */
    function token(Request $request)
    {
        try {

            if ($request->id) {
                return Helper::success(
                    [
                        'token' => (Wechat::query()->findOrFail($request->id))->createToken($request->userAgent())
                    ]
                );
            }
            /**
             * 在小程序中，调用 wx.login取到的值
             */
            $code = $request->input('code');
            if (!$code) {
                return Helper::error(__LINE__, "授权码未提供");
            }
            $response = Client::getJson('https://api.weixin.qq.com/sns/jscode2session', [
                'query' => [
                    'appid' => config('wechat.mini_program.default.app_id'),
                    'secret' => config('wechat.mini_program.default.secret'),
                    'js_code' => $code,
                    'grant_type' => 'authorization_code'
                ]
            ]);
            //{"session_key":"BIvNzqxFU53OFZHOmNGiGA==","openid":"ohdql5DiMiGvw7W6fHRWFRA1yVFw"}
            if (property_exists($response, 'errcode') && $response->errcode != 0) {
                return Helper::error($response->errcode, "微信小程序接口响应给出错误信息：" . $response->errmsg);
            }
            Log::debug('openid:' . $response->openid);
            Log::debug('session_key:' . $response->session_key);

            $user = Wechat::query()->where('open_id', config('wechat.mini_program.default.app_id') . '|' . $response->openid)->first();
            if (!$user) {
                $user = new Wechat();
                $user->open_id = config('wechat.mini_program.default.app_id') . '|' . $response->openid;
                /**
                 * 加密算法的初始向量，在小程序中，调用 wx.getUserInfo(Object object)可以得到该值
                 */
                $iv = $request->input('iv');
                /**
                 * 包括敏感数据在内的完整用户信息的加密数据，在小程序中，调用 wx.getUserInfo(Object object)可以得到该值
                 */
                $encryptedData = $request->input('encryptedData');
                if ($iv && $encryptedData) {
                    $Crypt = new DataCrypt(config('wechat.mini_program.default.app_id'), $response->session_key);
                    $errCode = $Crypt->decryptData($encryptedData, $iv, $data);
                    if ($errCode !== 0) {
                        return Helper::error(__LINE__, '用户数据校验失败,' . $errCode);
                    }
                    $decoded = json_decode($data);
                    $user->nickname = $decoded->nickName;
                    $user->avatar = $decoded->avatarUrl;
                    $user->province = $decoded->province;
                    $user->city = $decoded->city;
                }
                $user->save();
            }
            return Helper::success(
                [
                    'token' => $user->createToken($request->userAgent())
                ]
            );
        } catch (ModelNotFoundException $e) {
            return Helper::error(
                __LINE__, '用户不存在'
            );
        }


    }
}

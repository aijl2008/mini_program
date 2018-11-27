<?php

namespace App\Http\Controllers;

use App\Models\User;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Overtrue\Socialite\AuthorizeFailedException;

class WeChatAuthController extends Controller
{

    /**
     * @return \Overtrue\Socialite\Providers\WeChatProvider
     */
    private function oauth()
    {
        $config = [
            'app_id' => config("wechat.open_platform.default.app_id"),
            'secret' => config("wechat.open_platform.default.secret"),
            'oauth' => [
                'scopes' => config("wechat.open_platform.default.oauth.scopes"),
                'callback' => config("wechat.open_platform.default.oauth.callback") . urlencode(route('wechat.callback'))
            ]
        ];
        $app = Factory::officialAccount($config);
        return $app->oauth;
    }

    public function login()
    {
        return $this->oauth()->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $wechat = $this->oauth()->user()->getOriginal();
//            $wechat = [
//                "openid" => "okwCks9IH7Ct5stEHJ1irHfdyFc8",
//                "nickname" => "Jerry",
//                "sex" => 1,
//                "language" => "zh_CN",
//                "city" => "顺义",
//                "province" => "北京",
//                "country" => "中国",
//                "headimgurl" => "http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIzPR12npAHAo9weJh15yydgbG0p8y0tNXJvDdKroeTSgt7XecK95hAVLQlsqHicVMjeRcSmwpBNeg/132",
//                "privilege" => [],
//                "unionid" => "o3yyHjhuIvr1Ggg8PvYfOk2OoX2E"
//            ];
            if (!array_key_exists('openid', $wechat)) {
                abort(505, '微信接口返回的值中找不到openid');
            }
            $user = User::query()->where('union_id', $wechat['unionid'] ?: $wechat['openid'])->first();
            if (!$user) {
                $user = new User([
                    'open_id' => $wechat['openid'],
                    'union_id' => $wechat['unionid'] ?: $wechat['openid'],
                    'nickname' => $wechat['nickname'] ?? '',
                    'avatar' => $wechat['headimgurl'] ?? '',
                    'name' => ($wechat['country'] ?? '') . ($wechat['province'] ?? '') . ($wechat['city'] ?? '') . ($wechat['nickname'] ?? ''),
                    'email' => ($wechat['unionid'] ?: $wechat['openid']) . '@' . $request->getSchemeAndHttpHost(),
                    'password' => '不支持密码登录'
                ]);
                $user->save();
            }
            Auth::login($user);
            return redirect()->intended(route("my.videos.index"));
        } catch (AuthorizeFailedException $e) {
            abort(403, "认证已过期");
        }

    }


}
<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WeChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
            if ($user) {
                switch (get_class($user)) {
                    case WeChat::class:
                        $view->with('auth', 'wechat');
                        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgyZDMyYmRjZTdkNWIwNjM2ZmVmN2Y4NjVmZDk1NzBkNmQ1YzhjODIzNGY0NDZhZWExNzY5MzkxNzM5MjlhZGJkNThmNDVhYzhiMTRkMzk2In0.eyJhdWQiOiIxIiwianRpIjoiODJkMzJiZGNlN2Q1YjA2MzZmZWY3Zjg2NWZkOTU3MGQ2ZDVjOGM4MjM0ZjQ0NmFlYTE3NjkzOTE3MzkyOWFkYmQ1OGY0NWFjOGIxNGQzOTYiLCJpYXQiOjE1NDM2NjI5NTEsIm5iZiI6MTU0MzY2Mjk1MSwiZXhwIjoxNTc1MTk4OTUxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Ksw4KGMTfn3d8b2_64qRhWPjE2Tb8IUNCbhXmMnxnWhTvZkvaFp3GznR7riAtSxI50EXs4DqwwGustOcVGeFqxK-HBLrgbMs4kyMTze7QUSWpwurvezwWZaNgZDVI25kGlne_7y414iq054LMzt579liRLuHZOHK745TA7YvJhMaVOcBqymZdegNga00FtQk2XQTJVDkVbP5Gexeu-Mmh6hL9qdC9A2ym_fttPsmPk3nO5_Y1BNVUaQ365A3coMTJIwyiEZLaW6CMMlgSJzWDgb57LBvn2A8s-e9qzhO_rp6L9Ij849O8-3Jai3A7OWl0x7H0RhO1OxKY9Sn7msn_VTj5skqTmIcWxNzGZ3OzDePtPqE-_zYfftbKZw6UHn-wEcY1qUZs6xbKdZcLqzDV6hGSUbC6kE--NxhsqHNQiTOpGT2uQwmXUdLtUEbeUAwzdzB3szR5Ap-cfTBCI5qtdlbGLnWkaiN0HHRcmg7QSdTjEPh60YVtp1TEmDiDIumGIFwhQEft3xQEL_Bzg-oMj2A-Z4S97cNHoJHDWWKMvPIdH9g4jClD8kosbUemIoTkLuaIcg91XJX2AXSw0eRf6qDDKWoDrFoEgKOJriwmr63gwbwvI4B5gcugWb6OfMuuYw0d2tkdlYAiglpgaRFm-86Eu4ZiGZyWrPtHy-SDog';
                        //$view->with('Bearer', $user ? $user->createToken(request()->userAgent())->accessToken : null);
                        $view->with('Bearer', $user ? $token : null);
                        break;
                    case User::class:
                        $view->with('auth', 'user');
                        $view->with('Bearer', null);
                        break;
                    default:
                        $view->with('auth', 'guest');
                        break;
                }
            } else {
                $view->with('auth', 'guest');
            }
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

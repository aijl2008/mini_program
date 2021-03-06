<?php
/**
 * Created by PhpStorm.
 * User: artron
 * Date: 2018/11/19
 * Time: 20:36
 */

namespace App\Http\Controllers\My;


use App\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view("my.profile.index");
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload_avatar')) {
            if (($file = $request->file('upload_avatar'))->isValid()) {
                $path = $file->store('images', ['disk' => 'public']);
                if ($path) {
                    return Helper::success(
                        [
                            "url" => Storage::disk('public')->url($path),
                            "path" => Storage::disk('public')->path($path)
                        ]
                    );
                }
                return Helper::error(-1, "上传失败");
            }
            return Helper::error(-1, "无效的上传文件");
        }
        return Helper::error(-1, "请提供上传文件");
    }

}
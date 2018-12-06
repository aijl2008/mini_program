<?php

namespace App\Http\Controllers\Api;

use App\Helper;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index()
    {
        return Helper::success(Video::query()
            ->with('wechat')
            ->orderBy('id', 'desc')
            ->paginate(20));
    }
}

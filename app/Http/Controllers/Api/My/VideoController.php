<?php

namespace App\Http\Controllers\Api\My;

use App\Helper;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index()
    {
        return Helper::success( Video::query()
            ->where('user_id', Helper::uid())
            ->orderBy('id', 'desc')
            ->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     * @param VideoRequest $request
     * @return array
     */
    public function store(VideoRequest $request)
    {
        $video = (new Video($request->all()));
        $video->save();
        return Helper::success($video->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param Video $video
     * @return array
     */
    public function show(Video $video)
    {
        return Helper::success($video->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Video $video
     * @return array
     */
    public function update(Request $request, Video $video)
    {
        $video->update($request->all());
        return Helper::success($video->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Video $video
     * @return array
     * @throws \Exception
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return Helper::success();
    }
}

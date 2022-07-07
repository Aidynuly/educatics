<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $intro = CourseIntro::find($request['course_intro_id']);

        return view('admin.video.create', [
            'intro' =>  $intro,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = Video::create([
            'name'  =>  $request['name'],
            'link'  =>  $request['link'],
        ]);
        $courseVideo = CourseVideo::create([
            'course_intro_id'   => $request['course_intro_id'],
            'video_id'      =>  $video->id,
        ]);

        return redirect()->route('video.show', $request['course_intro_id'])->with('success', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $intro = CourseIntro::find($id);
        $videos = CourseVideo::whereCourseIntroId($id)->get();
        $course = Course::find($intro->course_id);

        return view('admin.video.index', [
            'videos'    =>  $videos,
            'course'    =>  $course,
            'intro'     =>  $intro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $video = CourseVideo::find($id);

        return view('admin.video.edit', [
            'video' =>  $video,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $courseVideo = CourseVideo::find($id);
        Video::find($courseVideo->video_id)->update([
            'name'  =>  $request['name'],
            'link'  =>  $request['link'],
        ]);

        return redirect()->route('video.show', $courseVideo['course_intro_id'])->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $video = CourseVideo::find($id);
        $intro = $video->course_intro_id;
        Video::find($video->video_id)->delete();
        $video->delete();


        return redirect()->route('video.show', $intro)->with('success', 'Успешно удален');
    }
}

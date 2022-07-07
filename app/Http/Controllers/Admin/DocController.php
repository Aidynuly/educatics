<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\CourseDoc;
use App\Models\Video;
use Illuminate\Http\Request;

class DocController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $intro = CourseIntro::find($request['course_intro_id']);

        return view('admin.doc.create', [
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
        if ($request['doc']) {
            $path = $this->uploadDocument($request->file('doc'));
        }
        $doc = CourseDoc::create([
            'course_intro_id'   =>  $request['course_intro_id'],
            'path'  =>  $path ?? null,
        ]);

        return redirect()->route('docs.show', $request['course_intro_id'])->with('success', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $intro = CourseIntro::find($id);
        $docs = CourseDoc::where('course_intro_id', $id)->get();
        $course = Course::find($intro->course_id);

        return view('admin.doc.index', [
            'docs'    =>  $docs,
            'course'    =>  $course,
            'intro'     =>  $intro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = CourseDoc::find($id);

        return view('admin.doc.edit', [
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
        if ($request['doc']) {
            $path = $this->uploadDocument($request->file('doc'));
        }
        $courseVideo = CourseDoc::find($id)->update([
            'path'  =>  $path ?? null
        ]);

        return redirect()->route('docs.show', CourseDoc::find($id)->course_intro_id)->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = CourseDoc::find($id);
        $intro = $video->course_intro_id;
        $video->delete();

        return redirect()->route('docs.show', $intro)->with('success', 'Успешно удален');
    }
}

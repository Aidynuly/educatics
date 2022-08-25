<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseIntroResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseLangResource;
use App\Http\Resources\CourseVideoResource;
use App\Http\Resources\TestResource;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\Tariff;
use App\Models\Test;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get(Request $request)
    {
        return self::response(200, CourseResource::collection(Course::orderBy('queue','asc')->get()), 'success');
    }

    public function byTariff(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
            'tariff_id' =>  'required|exists:tariffs,id'
        ]);
        $tariff = Tariff::find($request['tariff_id']);
        return response()->json([
            'data'  => CourseLangResource::collection(Course::orderBy('queue','asc')->get()),
            'message' => 'success',
            'tariff_id' =>  (int)$request['tariff_id'],
            'count' =>  $tariff->count,
        ]);
    }

    public function byId(Request $request)
    {
        $course = Course::find($request['course_id']);

        return self::response(200, new CourseResource($course), 'success');
    }

    public function getTest(Request $request)
    {
        $tests = Test::whereCourseIntroId($request['course_intro_id'])->get();

        return self::response(200, TestResource::collection($tests), 'success');
    }

    public function videos(Request $request)
    {
        $request->validate([
            'course_intro_id'   =>  'required|exists:course_intros,id',
        ]);
        $intro = CourseIntro::find($request['course_intro_id']);

        return self::response(200, new CourseIntroResource($intro), 'success');
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'course_id' =>  'required|exists:courses,id',
        ]);

        return self::response(200, new CourseResource(Course::find($request['course_id'])), 'success');
    }

    public function getIntroById(Request $request)
    {
        $request->validate([
            'course_intro_id'   =>  'required|exists:course_intros,id',
        ]);

        return self::response(200, new CourseIntroResource(CourseIntro::find($request['course_intro_id'])), 'success');
    }

    public function intros(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
            'course_id'   =>  'required|exists:courses,id'
        ],[
            'course_id.exists'    =>  'Неправильный курс айди'
        ]);
        $user = auth()->user();
        $course = Course::find($request['course_id']);

        return self::response(200, new CourseResource($course), 'success');
    }
}

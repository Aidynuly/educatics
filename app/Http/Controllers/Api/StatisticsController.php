<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function students(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $courses = Course::join('translates as title', 'title.id', 'courses.title')->select('courses.id', 'title.'.$lang.' as title', 'title.en as slug','courses.background_color')->get();
        $courseUser = [];
        $userCount = User::count();
        foreach ($courses as $key => $value) {
            $count = UserCourse::whereCourseId($value->id)->count();
            $courseUser[$key]['course_id'] = $value->id;
            $courseUser[$key]['title'] = $value->title;
            $courseUser[$key]['user_count'] = $count;
            $courseUser[$key]['procent'] = $this->getProcentFromUser($count);
        }

        return response()->json([
            'data'  =>  $courseUser,
            'user_count' =>  $userCount,
        ],200);
    }

    public function course(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $courses = Course::join('translates as title', 'title.id', 'courses.title')
            ->select('courses.id', 'title.'.$lang.' as title', 'title.en as slug','courses.background_color')
            ->get();
        $courseUser = [];
        $userCount = User::count();
        foreach ($courses as $key => $value) {
            $count = UserCourse::whereCourseId($value->id)->where('status', UserCourse::STATUS_FINISHED)->count();
            $courseUser[$key]['course_id'] = $value->id;
            $courseUser[$key]['title'] = $value->title;
            $courseUser[$key]['user_count'] = $count;
            $courseUser[$key]['procent'] = $this->getProcentFromUser($count);
        }

        return response()->json([
            'data'  =>  $courseUser,
            'user_count' =>  $userCount,
        ],200);
    }
}

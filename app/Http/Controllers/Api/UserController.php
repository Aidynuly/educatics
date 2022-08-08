<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Answer;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\Question;
use App\Models\Test;
use App\Models\Translate;
use App\Models\User;
use App\Models\UserCertificate;
use App\Models\UserCourse;
use App\Models\UserCourseIntro;
use App\Models\UserTest;
use Carbon\Carbon;
use Carbon\Traits\Week;
use Illuminate\Http\Request;
use App\Http\Resources\UserTestResource;

class UserController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'question_id' =>  'required|exists:questions,id',
            'answer_id'  =>  'required|exists:answers,id',
        ],[
            'questions.exists'    =>  'Такого вопроса не существует',
            'answers.exists'    =>  'Такого ответа не существует',
        ]);
        $user = auth()->user();
        $question = Question::findOrFail($request['question_id']);
        $answer = Answer::findOrFail($request['answer_id']);
        $userTest = UserTest::create([
            'user_id'   =>  $user['id'],
            'question_id'   =>  $question->id,
            'test_id'   =>  $question['test_id'],
            'answer_id' =>  $request['answer_id'],
            'is_correct'    =>  $answer['is_correct'],
            'created_at'    =>  Carbon::now(),
        ]);

        return self::response(201, $userTest, 'success');
    }

    public function finish(Request $request)
    {
        $request->validate([
            'test_id' =>  'required|exists:tests,id',
        ],[
            'tests.exists'    =>  'Такого теста не существует',
        ]);
        $user = auth()->user();
        $questions = Question::whereTestId($request->test_id)->count();
        UserTest::whereTestId($request->test_id)->where('user_id', $user['id'])->where('status', UserTest::STATUS_FINISHED)->delete();
        UserTest::whereTestId($request->test_id)->where('user_id', $user['id'])->where('status', UserTest::STATUS_DECLINED)->delete();
        $tests = UserTest::where('user_id', $user['id'])->where('test_id', $request['test_id'])->get();
        $countCorrect = $questions * 60 / 100;
        $answers = UserTest::where('user_id', $user['id'])->where('test_id', $request['test_id'])->where('is_correct', true)->get();
        $test = Test::find($request['test_id']);
        if (count($answers) >= $countCorrect) {
            UserTest::whereTestId($request->test_id)->where('user_id', $user['id'])->update([
                'status'    =>  UserTest::STATUS_FINISHED
            ]);
            UserCourseIntro::where('user_id', $user->id)->where('course_intro_id', $test->course_intro_id)->update([
                'status'    =>  UserCourseIntro::STATUS_FINISHED
            ]);

            if ($request->type == 'final') {
                $courseIntro = CourseIntro::find($test->course_intro_id);
                $course = Course::find($courseIntro->course_id);
                $courseName = Translate::whereId($course->title)->value('ru');              //lang need from web
                $path = $this->makeCertificate($user->name, $user->surname, $courseName);
                UserCertificate::insert([
                    'user_id'   =>  $user->id,
                    'course_id' =>  $course->id,
                    'path'  =>  $path,
                    'created_at'    =>  Carbon::now(),
                ]);
            }

            return response()->json([
                'data' => [
                    'count_answers' => count($tests),
                    'count_correct' => count($answers),
                ],
                'status' => 200,
                'message'   =>  'Успешно сдал'

            ], 200);
        } else {
            UserTest::whereTestId($request->test_id)->where('user_id', $user['id'])->update([
                'status'    =>  UserTest::STATUS_DECLINED
            ]);
            UserCourseIntro::where('user_id', $user->id)->where('course_intro_id', $test->course_intro_id)->update([
                'status'    =>  UserCourseIntro::STATUS_DECLINED
            ]);

            $data['count_correct'] = count($answers);

            return self::response(400, $data, 'Не набрал больше 60%');
        }
    }

    public function testResults(Request $request)
    {
        $request->validate([
            'test_id' =>  'required|exists:tests,id',
            'lang'  =>  'required',
        ],[
            'tests.exists'    =>  'Такого теста не существует',
        ]);
        $user = auth()->user();
        $lang = $request->lang;
        $answers = UserTest::whereTestId($request->test_id)->where('user_id', $user->id)->get();

        return self::response(200, UserTestResource::collection($answers), 'success');
    }

    public function myCourses(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $user = auth()->user();
        $lang = $request->lang;
        $courses = UserCourse::whereUserId($user->id)->pluck('course_id')->toArray();
        $arr = [];
        if (count($courses) > 0) {
            foreach ($courses as $course) {
                $arr[] = new CourseResource(Course::find($course));
            }
        }

        return self::response(200, $arr, 'success');
    }
}

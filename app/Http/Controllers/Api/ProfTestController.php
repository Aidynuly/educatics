<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Http\Resources\ProfTestResource;
use App\Http\Resources\SphereResource;
use App\Http\Resources\ProfTestAnswerResource;
use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\Course;
use App\Models\ProfTestAnswer;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use App\Models\Sphere;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\assertNan;

class ProfTestController extends Controller
{
    public function get(Request $request)
    {
        $tests = Test::where('type', 'prof')->get();

        return self::response(200, ProfTestResource::collection($tests), 'success');
    }

    public function questions(Request $request)
    {
        $request->validate([
            'test_id'   =>  'required|exists:tests,id',
        ]);
        $questions = Question::whereTestId($request['test_id'])->get();

        return self::response(200, QuestionResource::collection($questions), 'success');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'session_id'    =>  'required',
            'question_id'   =>  'required|exists:questions,id',
            'answer_id'     =>  'required|exists:answers,id',
        ]);
        $answer = Answer::find($request['answer_id']);

        $profTestAnswer = ProfTestAnswer::create([
            'session_id'   =>   $request['session_id'],
            'question_id'   =>  $request['question_id'],
            'answer_id'     =>  $request['answer_id'],
            'is_correct'    => $answer['is_correct'] == true,
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now(),
        ]);

        return self::response(200, $profTestAnswer, 'success');
    }

    public function finish(Request $request)
    {
        $request->validate([
            'session_id'    =>  'required',
            'lang'          =>  'required',
        ]);
        $user = User::where('session_id', $request['session_id'])->first();
        ProfTestAnswer::whereSessionId($request['session_id'])->update([
            'status'    =>  'finished',
        ]);

        $data['answers'] = ProfTestAnswer::whereSessionId($request['session_id'])->get();
        $data['count_correct'] = ProfTestAnswer::whereSessionId($request['session_id'])->where('is_correct', true)->get();
        $answers = ProfTestAnswer::whereSessionId($request['session_id'])->where('is_correct', true)->pluck('answer_id')->toArray();
        $spheres = [];

        foreach ($answers as $answer) {
            $ab = Answer::whereId($answer)->whereNotNull('sphere_id')->first();
            if (isset($ab->sphere_id)) {
                $spheres[] = $ab->sphere_id;
            }
        }
        $vals = array_count_values($spheres);
        $value = max($vals);
        $sphere = Sphere::find(array_search($value, $vals));

        return self::response(200, new SphereResource($sphere),'success');
    }

    public function decline(Request $request)
    {
        $request->validate([
            'session_id'    =>  'required',
        ]);
        ProfTestAnswer::whereSessionId($request['session_id'])->update([
            'status'    =>  'declined',
        ]);

        return self::response(200, true, 'success');
    }

    public function bySession(Request $request)
    {
        $request->validate([
            'session_id'    =>  'required',
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $answers = ProfTestAnswer::whereSessionId($request['session_id'])->get();
        $data['correctCount'] = ProfTestAnswer::whereSessionId($request['session_id'])->where('is_correct', true)->count();
        $data['answers'] = ProfTestAnswerResource::collection($answers);

        return self::response(200, $data, 'success');
    }
}

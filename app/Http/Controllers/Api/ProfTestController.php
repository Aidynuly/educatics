<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfTestResource;
use App\Http\Resources\QuestionResource;
use App\Models\Answer;
use App\Models\ProfTestAnswer;
use App\Models\Question;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $questions = Question::whereTestId($request['test_id'])->orderBy('queue', 'desc')->get();

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
        ]);

        $answers = ProfTestAnswer::whereSessionId($request['session_id'])->get();
        $correctAnswers = ProfTestAnswer::whereSessionId($request['session_id'])->where('is_correct', true)->get();
    }
}

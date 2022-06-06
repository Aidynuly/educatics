<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\UserTest;
use Illuminate\Http\Request;

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
            'question_id'   =>  $request['question_id'],
            'test_id'   =>  $question['test_id'],
            'answer_id' =>  $request['answer_id'],
            'is_correct'    =>  $answer['is_correct']
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

        $tests = UserTest::where('user_id', $user['id'])->where('test_id', $request['test_id'])->get();
        $answers = UserTest::where('user_id', $user['id'])->where('test_id', $request['test_id'])->where('is_correct', true)->get();

        return response()->json([
            'data'      =>  [
                'count_answers'   =>  count($tests),
                'count_correct'     =>  count($answers),
            ],
            'status'    =>  200,

        ],200);
    }
}

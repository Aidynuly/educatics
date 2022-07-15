<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
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
        $countCorrect = $questions * 50 / 100;
        $answers = UserTest::where('user_id', $user['id'])->where('test_id', $request['test_id'])->where('is_correct', true)->get();
        if (count($answers) >= $countCorrect) {
            UserTest::whereTestId($request->test_id)->where('user_id', $user['id'])->update([
                'status'    =>  UserTest::STATUS_FINISHED
            ]);
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
            $data['count_correct'] = count($answers);
            return self::response(400, $data, 'Не набрал больше 50%');
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
}

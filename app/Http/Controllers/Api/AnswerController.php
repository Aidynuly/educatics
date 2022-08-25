<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function get(Request $request)
    {
        $answers = Answer::whereQuestionId($request['question_id'])->get();

        return self::response(200, AnswerResource::collection($answers), 'success');
    }
}

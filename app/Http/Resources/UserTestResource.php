<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = $request->lang;
        return [
            'id'            =>  $this->id,
            'test_id'       =>  $this->test_id,
            'question'      =>  Translate::where('id', Question::where('id', $this->question_id)->value('title'))->value($lang),
            'answer'        => Translate::where('id', Answer::where('id', $this->answer_id)->value('title'))->value($lang),
            'is_correct'        =>  boolval($this->is_correct),
            'status'            =>  $this->status,
            'created_at'        =>  $this->created_at,
            'correct_answer'    =>  Translate::whereId(Answer::whereQuestionId($this->question_id)->where('is_correct', true)->value('title'))->value($lang),
            'answers'           =>  UserAnswerResource::collection(Answer::whereQuestionId($this->question_id)->get()),
        ];
    }
}

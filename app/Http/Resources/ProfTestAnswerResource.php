<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\Translate;
use App\Models\Question;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ProfTestAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'    =>  $this->id,
            'session'   =>  $this->session_id,
            'question'  =>  Translate::whereId(Question::where('id', $this->question_id)->value('title'))->value($request['lang']),
            'answer'    =>  Translate::whereId(Answer::where('id', $this->answer_id)->value('title'))->value($request['lang']),
            'is_correct'    => $this->is_correct == true,
            'status'        =>  $this->status,
            'created_at'    =>  $this->created_at,
        ];
    }
}

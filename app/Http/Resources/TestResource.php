<?php

namespace App\Http\Resources;

use App\Models\Question;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'title' =>   isset($request->lang) ? Translate::whereId($this->title)->value($request->lang) : Translate::find($this->title),
            'course_intro_id'   =>  $this->course_intro_id,
            'questions' =>  $questions = QuestionResource::collection(Question::whereTestId($this->id)->get()),
            'count' =>  count($questions),
        ];
    }
}

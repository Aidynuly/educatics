<?php

namespace App\Http\Resources;

use App\Models\Question;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfTestResource extends JsonResource
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
            'title' =>  Translate::find($this->title),
            'question_count'    =>  count(Question::whereTestId($this->id)->get()),
            'type'  =>  $this->type,
            'questions' =>  QuestionResource::collection(Question::whereTestId($this->id)->get()),
        ];
    }
}

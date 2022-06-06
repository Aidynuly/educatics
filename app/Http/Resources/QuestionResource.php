<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'image' =>  $this->image,
            'answers'   =>  AnswerResource::collection(Answer::whereQuestionId($this->id)->orderBy('queue', 'desc')->get()),
        ];
    }
}

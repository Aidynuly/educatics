<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseDocResource extends JsonResource
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
            'id'    =>  $this->id,
            'course_intro_id'   =>  $this->course_intro_id,
            'path'  =>  $this->path,
            'title' =>  isset($lang) ? Translate::whereId($this->title)->value($lang) : Translate::find($this->title),
        ];
    }
}

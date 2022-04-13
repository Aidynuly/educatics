<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseIntroResource extends JsonResource
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
            'course_id' =>  $this->course_id,
        ];
    }
}

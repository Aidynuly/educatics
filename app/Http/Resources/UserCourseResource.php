<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCourseResource extends JsonResource
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
        $course = Course::find($this->course_id);
        return [
            'id'    =>  $this->course_id,
            'title' =>  isset($lang) ? Translate::whereId($course->title)->value($lang) : Translate::find($course->title),
            'description' =>  isset($lang) ? Translate::whereId($course->description)->value($lang) : Translate::find($course->description),
            'price' =>  $course->price,
            'certificate'   =>  $course->certificate,
            'background_color'  =>  $course->background_color,
            'icon'      =>  $course->icon,
            'trailer'      =>   $course->trailer,
            'created_at'    =>  $course->created_at,
        ];
    }
}

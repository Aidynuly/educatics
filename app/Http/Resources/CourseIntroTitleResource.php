<?php

namespace App\Http\Resources;

use App\Models\Translate;
use App\Models\UserCourseIntro;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseIntroTitleResource extends JsonResource
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
        $user = auth()->user();
        return [
            'id'    =>  $this->id,
            'title' =>  isset($lang) ? Translate::whereId($this->title)->value($lang) :Translate::find($this->title),
            'status'    =>  isset($user) ? UserCourseIntro::where('user_id', $user->id)->where('course_intro_id', $this->id)->value('status') : null,
        ];
    }
}

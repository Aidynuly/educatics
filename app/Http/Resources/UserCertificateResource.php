<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCertificateResource extends JsonResource
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
            'path'  =>  $this->path,
            'course'    =>  Translate::whereId(Course::whereId($this->course_id)->value('title'))->value($lang),
            'created_at'    =>  $this->created_at,
        ];
    }
}

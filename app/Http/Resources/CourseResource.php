<?php

namespace App\Http\Resources;

use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\Translate;
use App\Models\Sphere;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'description'   =>  Translate::find($this->description),
            'price'     =>  $this->price,
            'certificate'   =>  $this->certificate,
            'created_at'    =>  $this->created_at,
            'background_color'  => $this->background_color,
            'icon'      =>  $this->icon,
            'trailer'   =>  $this->trailer,
            'sphere'   =>  Sphere::find($this->sphere_id),
            'intros'    =>  CourseIntroTitleResource::collection(CourseIntro::whereCourseId($this->id)->get()),
        ];
    }
}

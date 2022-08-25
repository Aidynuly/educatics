<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Http\Resources\CourseLangResource;
use App\Models\Translate;
use App\Models\Sphere;
use Illuminate\Http\Resources\Json\JsonResource;

class SphereResource extends JsonResource
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
            'title' =>  isset($lang) ? Translate::whereId($this->title)->value($lang) : Translate::find($this->title),
            'description' =>  isset($lang) ? Translate::whereId($this->description)->value($lang) : Translate::find($this->description),
            'icon'      =>  $this->icon,
            'courses'   =>  CourseLangResource::collection(Course::where('sphere_id', $this->id)->get()),
            'created_at'    =>  $this->created_at,
        ];
    }
}

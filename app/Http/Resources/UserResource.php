<?php

namespace App\Http\Resources;

use App\Models\Tariff;
use App\Models\UserCourse;
use App\Http\Resources\UserCourseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type'  =>  $this->type,
            'tariff'    =>  Tariff::find($this->tariff_id),
            'age'       =>  $this->age,
            'login'     =>  $this->login,
            'phone'     =>  $this->phone,
            'name'      =>  $this->name,
            'surname'   =>  $this->surname,
            'school_name'   =>  $this->school_name,
            'session_id'    =>  $this->session_id,
            'school'    =>  $this->school_id,
            'courses'   =>  UserCourseResource::collection(UserCourse::whereUserId($this->id)->get()),
            'deadline'  =>  $this->deadline,
            'count' =>  $this->count,
        ];
    }
}

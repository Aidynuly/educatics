<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
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
            'name'  =>  Translate::find($this->name),
            'city'      =>  City::find($this->city_id),
        ];
    }
}

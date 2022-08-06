<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'name'  =>  Translate::whereId($this->name)->value($request->lang),
            'surname'  =>  Translate::whereId($this->surname)->value($request->lang),
            'position'  =>  Translate::whereId($this->position)->value($request->lang),
            'created_at'=>  $this->created_at,
            'image' =>  $this->image,
        ];
    }
}

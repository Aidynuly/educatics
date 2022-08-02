<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseLangResource extends JsonResource
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
            'description'   => isset($lang) ? Translate::whereId($this->description)->value($lang) : Translate::find($this->title),
            'price' =>  $this->price,
            'certificate'   =>  $this->certificate,
            'background_color'  =>  $this->background_color,
            'icon'  =>  $this->icon,
            'trailer'   =>  $this->trailer,
            'created_at'    =>  $this->created_at,
        ];
    }
}

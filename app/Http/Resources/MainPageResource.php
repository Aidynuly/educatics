<?php

namespace App\Http\Resources;

use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class MainPageResource extends JsonResource
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
            'title' =>  Translate::whereId($this->title)->value($lang),
            'description' =>  Translate::whereId($this->description)->value($lang),
            'icon'  =>  $this->icon,
            'video_url' =>  $this->video_url,
            'block' =>  $this->block,
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\Tariff;
use App\Models\Translate;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
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
            'user_id'   =>  $this->user_id,
            'tariff'    => Translate::whereId(Tariff::whereId($this->tariff_id)->value('title'))->value($lang),
            'course'    => Translate::whereId(Course::whereId($this->course_id)->value('title'))->value($lang),
            'status'    =>  $this->status,
            'created_at'    =>  $this->created_at,
            'price'     =>  Course::whereId($this->course_id)->value('price'),
            'tariff_id' =>  $this->tariff_id,
        ];
    }
}

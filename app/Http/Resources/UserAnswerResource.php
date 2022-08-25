<?php

namespace App\Http\Resources;

use App\Models\Translate;
use App\Models\UserTest;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = auth()->user();
        $test = $request['test_id'];
        $userTest = UserTest::whereTestId($test)->where('user_id', $user->id)->where('answer_id', $this->id)->exists();

        return [
            'id'    =>  $this->id,
            'title' =>   isset($request->lang) ? Translate::whereId($this->title)->value($request->lang) : Translate::find($this->title),
            'is_correct'    =>  boolval($this->is_correct),
            'choose'   =>  $userTest,
        ];
    }
}

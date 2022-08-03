<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\City;
use App\Models\ProfTestAnswer;
use App\Models\Tariff;
use App\Models\Sphere;
use App\Models\UserCourse;
use App\Http\Resources\UserCourseResource;
use App\Http\Resources\ProfTestAnswerResource;
use App\Http\Resources\SphereResource;
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
        $outputs = ProfTestAnswer::whereSessionId($this->session_id)->get();
        $data['correctCount'] = ProfTestAnswer::whereSessionId($this->session_id)->where('is_correct', true)->count();

        $answers = ProfTestAnswer::whereSessionId($this->session_id)->where('is_correct', true)->pluck('answer_id')->toArray();
        $spheres = [];
        foreach ($answers as $answer) {
            $ab = Answer::whereId($answer)->whereNotNull('sphere_id')->first();
            if (isset($ab->sphere_id)) {
                $spheres[] = $ab->sphere_id;
            }
        }
        $vals = array_count_values($spheres);
        if (count($vals) > 0) {
            $value = max($vals);
            $id = array_search($value, $vals);
            $sphere = Sphere::join('translates as title', 'title.id', 'spheres.title')
                ->join('translates as desc', 'desc.id', 'spheres.description')
                ->where('spheres.id', $id)
                ->select('spheres.id', 'title.ru as title', 'desc.ru as description', 'spheres.icon')
                ->first();
        }
        $profTest['answers'] = ProfTestAnswerResource::collection($outputs);
        $profTest['correct_count'] = $data['correctCount'];

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
            'courses'   =>  UserCourseResource::collection(UserCourse::whereUserId($this->id)->get()),
            'deadline'  =>  $this->deadline,
            'count' =>  $this->count,
            'prof_test' =>  $profTest,
            'sphere'        =>  $sphere ?? null,
            'city'      =>  new CityResource(City::find($this->city_id)),
            'image' =>  $this->image,
        ];
    }
}

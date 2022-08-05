<?php

namespace App\Http\Resources;

use App\Models\CourseIntro;
use App\Models\CourseVideo;
use App\Models\Translate;
use App\Models\Sphere;
use App\Models\UserCourseIntro;
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
        $lang = $request->lang;
        $user = auth()->user();
        $intros = CourseIntro::whereCourseId($this->id)->get();
        if (isset($user)) {
            $finishedCount = 0;
            foreach ($intros as $intro) {
                $userIntro = UserCourseIntro::where('course_intro_id', $intro->id)->where('user_id', $user->id)->first();
                if (isset($userIntro)) {
                    if ($userIntro->status == 'finished') {
                        $finishedCount++;
                    }
                }
            }

        }
        return [
            'id'    =>  $this->id,
            'title' =>  isset($lang) ? Translate::whereId($this->title)->value($lang) : Translate::find($this->title),
            'description' =>  isset($lang) ? Translate::whereId($this->description)->value($lang) : Translate::find($this->description),
            'price'     =>  $this->price,
            'queue' =>  $this->queue,
            'certificate'   =>  $this->certificate,
            'created_at'    =>  $this->created_at,
            'background_color'  => $this->background_color,
            'icon'      =>  $this->icon,
            'trailer'   =>  $this->trailer,
            'sphere'   =>  isset($lang) ? Sphere::join('translates as title', 'title.id', 'spheres.title')->join('translates as desc', 'desc.id', 'spheres.description')->where('spheres.id', $this->sphere_id)
                ->select('spheres.id','title.'.$lang.' as title','desc.'.$lang.' as description')->first() : Sphere::find($this->sphere_id),
            'count_intro'   =>  CourseIntro::whereCourseId($this->id)->where('type', 'course')->count(),
            'intros'    =>  CourseIntroTitleResource::collection($intros),
            'finished_count'    =>  isset($user) ? $finishedCount : null,
        ];
    }
}

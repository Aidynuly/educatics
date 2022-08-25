<?php

namespace App\Http\Resources;

use App\Models\Answer;
use App\Models\City;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\ProfTestAnswer;
use App\Models\Tariff;
use App\Models\Sphere;
use App\Models\Translate;
use App\Models\UserCertificate;
use App\Models\UserCourse;
use App\Http\Resources\UserCourseResource;
use App\Http\Resources\ProfTestAnswerResource;
use App\Http\Resources\SphereResource;
use App\Models\UserCourseIntro;
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

        $userCourses = UserCourse::whereUserId($this->id)->where('status',UserCourse::STATUS_IN_PROCESS)->get()->unique('course_id');

        $analytics = [];
        $countCourse = count($userCourses);
        $procent = 0;
        if ($countCourse) {
            $procent = 100 / $countCourse;
        }
        foreach ($userCourses as $key => $value) {
            $course = Course::find($value['course_id']);
            $countIntros = CourseIntro::whereCourseId($course->id)->count();
            $intros = CourseIntro::where('course_id', $course->id)->pluck('id')->toArray();
            $analytics[$key]['label'] = Translate::whereId($course->title)->value('ru');
            $analytics[$key]['color'] = $course->background_color;
            $analytics[$key]['count_intro'] = $countIntros;
            $finished_count_intro = UserCourseIntro::where('user_id', $this->id)->whereIn('course_intro_id', $intros)->where('status', UserCourseIntro::STATUS_FINISHED)->count();
            $process_count_intro = UserCourseIntro::where('user_id', $this->id)->whereIn('course_intro_id', $intros)->where('status', UserCourseIntro::STATUS_IN_PROCESS)->count();
            $declined_count_intro = UserCourseIntro::where('user_id', $this->id)->whereIn('course_intro_id', $intros)->where('status', UserCourseIntro::STATUS_DECLINED)->count();
            $analytics[$key]['process_count_intro'] = $process_count_intro;
            $analytics[$key]['finished_count_intro'] = $finished_count_intro;
            $analytics[$key]['process_count_intro'] = $process_count_intro;
            $analytics[$key]['declined_count_intro'] = $declined_count_intro;
            $analytics[$key]['finished_procent'] = $finishedProcent = $this->getProcent($countIntros, $finished_count_intro);
            $analytics[$key]['process_procent'] = $this->getProcent($countIntros, $process_count_intro);
            $analytics[$key]['declined_procent'] = $this->getProcent($countIntros, $declined_count_intro);
            $analytics[$key]['value'] = ($finishedProcent * $procent) / 100;
        }

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
            'courses'   =>  UserCourseResource::collection(UserCourse::whereUserId($this->id)->where('status',UserCourse::STATUS_IN_PROCESS)->get()),
            'deadline'  =>  $this->deadline,
            'count' =>  $this->count,
            'prof_test' =>  $profTest,
            'sphere'        =>  $sphere ?? null,
            'city'      =>  new CityResource(City::find($this->city_id)),
            'image' =>  $this->image,
            'certificates'  =>  UserCertificateResource::collection(UserCertificate::where('user_id', $this->id)->get()),
            'verified_at'   =>  $this->verified_at,
            'verified'  => isset($this->verified_at),
            'course_count'  => $countCourse,
            'analytics'  =>  $analytics,
        ];
    }

    private function getProcent($countIntro, $countStatus)
    {
        return ($countStatus * 100) / $countIntro;
    }
}

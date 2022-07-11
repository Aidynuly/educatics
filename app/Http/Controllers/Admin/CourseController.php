<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\CourseIntro;
use App\Models\Translate;
use App\Models\Sphere;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function redirect;
use function request;
use function view;

/**
 * Class CourseController
 * @package App\Http\Controllers
 */
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::paginate(10);

        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        $spheres = Sphere::get();

        return view('admin.course.create', compact('course', 'spheres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = Translate::create([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        $description = Translate::create([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if (isset($request['icon'])) {
            $icon = $this->uploadImage($request->file('icon'));
        }

        if (isset($request['certificate'])) {
            $name = $this->uploadDocument($request->file('certificate'));
        }
        $course = Course::create([
            'title' =>  $title['id'],
            'description'   =>  $description['id'],
            'certificate'   =>  $name ?? null,
            'price' =>  $request['price'],
            'background_color'  =>  $request['background_color'],
            'icon'      =>  $icon ?? null,
            'sphere_id' =>  $request['sphere_id']
        ]);

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $course = Course::find($id);
        $intros = CourseIntro::whereCourseId($id)->get();
        $count = UserCourse::whereCourseId($id)->get();

        return view('admin.course.show', compact('course'), compact('intros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $spheres = Sphere::get();

        return view('admin.course.edit', compact('course', 'spheres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $title = Translate::find($course->title)->update([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        $description = Translate::find($course->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if (isset($request['icon'])) {
            $icon = $this->uploadImage($request->file('icon'));
        }

        if (isset($request['certificate'])) {
            $name = $this->uploadDocument($request->file('certificate'));
        }

        $course->update([
            'background_color'  =>  $request['background_color'],
            'price'             =>  $request['price'],
            'icon'          =>  $icon ?? $course->icon,
            'certificate'       =>  $name ?? $course->certificate,
            'sphere_id'     =>  $request['sphere_id'] ?? $course->sphere_id,
        ]);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $course = Course::find($id)->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully');
    }
}

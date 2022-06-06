<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\CourseIntro;
use App\Models\Question;
use App\Models\Test;
use App\Models\Translate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Sodium\randombytes_uniform;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $test = new Test();
        $courses = Course::get();

        return view('admin.test.create', [
            'test'  =>  $test,
            'courses'   =>  $courses,
            'intro_id'  =>  $request['intro_id']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $title = Translate::create([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        $test = Test::create([
            'course_intro_id'   =>  $request['intro_id'],
            'title'         =>  $title['id'],
            'type'          =>  Test::COURSE_TYPE,
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now(),
        ]);

        return redirect()->route('test.show', $request['intro_id'])->with('success','Успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tests = Test::whereCourseIntroId($id)->get();
        $intro = CourseIntro::find($id);

        return view('admin.test.index', ['tests' => $tests, 'courseId' => $intro['course_id'], 'introId' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $answers = Answer::whereQuestionId($id)->get();

        return view('admin.test.edit', [
            'question' => $question,
            'answers' => $answers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $intro = CourseIntro::find($test['course_intro_id']);
        $test->delete();

        return redirect()->route('test.show', $intro['id'])->with('success', 'Успешно удален');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Translate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $test = Test::find($request['test_id']);

        return view('admin.questions.create', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = Translate::create([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'        =>  $request['title_en'],
        ]);

        $test = Test::find($request['test_id']);

        Question::create([
            'test_id'   =>  $request['test_id'],
            'title'     =>  $title->id,
            'image'     =>  'var/test/image',
            'created_at'    =>  Carbon::now(),
        ]);

        return redirect()->route('test.show',$test['course_intro_id'])->with('success', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $answers = Answer::whereQuestionId($question->id)->get();

        return view('admin.questions.edit', compact('question', 'answers'));
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
        //
    }
}

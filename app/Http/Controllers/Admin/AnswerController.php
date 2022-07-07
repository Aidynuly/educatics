<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Sphere;
use App\Models\Question;
use App\Models\Translate;
use Illuminate\Http\Request;

class AnswerController extends Controller
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
        $question = Question::find($request['id']);
        $spheres = Sphere::get();

        return view('admin.answer.create', ['question' => $question, 'spheres' => $spheres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $translate = Translate::create([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        Answer::insert([
            'question_id'   =>  $request['question_id'],
            'title'     =>  $translate['id'],
            'is_correct'    =>  $request['is_correct'] ? true : false,
            'sphere_id'     =>  $request['sphere_id'],
        ]);

        return redirect()->route('prof-tests.index')->with('success', 'Успешно добавлено');
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
        $answer = Answer::find($id);
        $spheres = Sphere::get();

        return view('admin.answer.edit', compact('answer', 'spheres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        Translate::find($answer->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        $answer->update([
            'is_correct'    =>  $request['is_correct'] ? true : false,
            'sphere_id'     =>  $request['sphere_id'] ?? $answer->sphere_id,
        ]);

        return redirect()->route('prof-tests.edit', Answer::whereId($id)->value('question_id'))->with('success', 'Успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::find($id)->delete();

        return redirect()->route('prof-tests.index')->with('success', 'Успешно удалено');
    }
}

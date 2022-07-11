<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Translate;
use Carbon\Carbon;
use Carbon\Traits\Test;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(10);

        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'en'    =>  $request['title_en'],
        ]);

        $description = Translate::create([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);
        $faq = Faq::create([
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'created_at'    =>  Carbon::now(),
        ]);

        return redirect()->route('faq.index')->with('success', 'Успешно добавлено');
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
        $faq = Faq::find($id);

        return view('admin.faq.edit', compact('faq'));
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
        $faq = Faq::find($id);
        Translate::find($faq->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        Translate::find($faq->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        return redirect()->route('faq.index')->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();

        return redirect()->route('faq.index')->with('success', 'Успешно удалено');
    }
}

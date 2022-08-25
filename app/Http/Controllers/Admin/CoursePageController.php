<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoursePage;
use App\Models\Translate;
use Illuminate\Http\Request;

class CoursePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = CoursePage::get();

        return view('admin.course-page.index', compact('texts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $text = CoursePage::find($id);

        return view('admin.course-page.edit', compact('text'));
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
        $page = CoursePage::find($id);
        $title = Translate::find($page->title)->update([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        if (isset($page->description)) {
            $description = Translate::find($page->description)->update([
                'ru' => $request['description_ru'],
                'kz' => $request['description_kz'],
                'en' => $request['description_en'],
            ]);
        }

        if ($request->hasFile('image')) {
            $icon = $this->uploadImage($request->file('image'));
        }
        $page->update([
            'image' => $icon ?? $page->image,
            'block' =>  $request['icon'] ?? $page->block,
        ]);

        return redirect()->route('course-page.index')->with('success','Успешно обновлено');
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

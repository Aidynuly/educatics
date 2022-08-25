<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoursePage;
use App\Models\EventPage;
use App\Models\Translate;
use Illuminate\Http\Request;

class EventPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = EventPage::get();

        return view('admin.event-page.index', compact('texts'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $text = EventPage::find($id);

        return view('admin.event-page.edit', compact('text'));
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
        $page = EventPage::find($id);
        Translate::find($page->title)->update([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        if (isset($page->description)) {
            Translate::find($page->description)->update([
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

        return redirect()->route('event-page.index')->with('success', 'Успешно обновлено');
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

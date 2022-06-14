<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translate;
use Illuminate\Http\Request;
use App\Models\Mainpage;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Mainpage::get();

        return view('admin.main-page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main-page.create');
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

        if ($request['icon']) {
            $icon = $this->uploadImage($request->file('icon'));
        }

        $mainPage = Mainpage::create([
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'video_url'     =>  $request['video_url'],
            'icon'      =>  $icon ?? null,
        ]);

        return redirect()->route('main-page.index')->with('success', 'Успешно добавлено');
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
        $mainPage = Mainpage::find($id);

        return view('admin.main-page.edit', compact('mainPage'));
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
        $mainPage = Mainpage::find($id);
        $title = Translate::find($mainPage->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);

        $description = Translate::find($mainPage->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if ($request['icon']) {
            $icon = $this->uploadImage($request->file('icon'));
        }

        $mainPage->update([
            'video_url'     =>  $request['video_url'] ?? $mainPage->video_url,
            'icon'      =>  $icon ?? null,
        ]);

        return redirect()->route('main-page.index')->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mainpage::find($id)->delete();

        return redirect()->route('main-page.index')->with('success', 'Успешно удалено');
    }
}

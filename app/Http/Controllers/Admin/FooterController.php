<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Translate;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::get();

        return view('admin.footer.index', compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.footer.create');
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
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        if (isset($request->description_ru)) {
            $description = Translate::create([
                'ru' => $request['description_ru'],
                'kz' => $request['description_kz'],
                'en' => $request['description_en'],
            ]);
        }

        if ($request->hasFile('image')) {
            $icon = $this->uploadImage($request->file('image'));
        }
        Footer::create([
            'block' =>  $request['block'],
            'title' =>  $title->id,
            'description'   =>  $description->id ?? null,
            'image'     =>  $icon ?? null,
            'link'      =>  $request['link'] ?? null,
        ]);

        return redirect()->route('footer.index')->with('success', 'Успешно добавлено');
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
        $footer = Footer::find($id);

        return view('admin.footer.edit', compact('footer'));
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
        $footer = Footer::find($id);

        Translate::find($footer->title)->update([
            'ru'    =>  $request['title_ru'],
            'en'    =>  $request['title_en'],
            'kz'    =>  $request['title_kz'],
        ]);
        if (isset($footer->description)) {
            $description = Translate::find($footer->description)->update([
                'ru' => $request['description_ru'],
                'kz' => $request['description_kz'],
                'en' => $request['description_en'],
            ]);
        }

        if ($request->hasFile('image')) {
            $icon = $this->uploadImage($request->file('image'));
        }

        $footer->update([
            'image' =>  $icon ?? $footer->image,
            'link'  =>  $request['link'] ?? $footer->link,
            'block' =>  $request['block'],
        ]);

        return redirect()->route('footer.index')->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::find($id)->delete();

        return redirect()->route('footer.index')->with('success', 'Успешно удалено');
    }
}

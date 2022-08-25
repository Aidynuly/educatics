<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Translate;
use File;

class StoryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stories = Story::get();
        return view('admin.story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoryRequest  $request
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
            'ru'        =>  $request['description_ru'],
            'kz'        =>  $request['description_kz'],
            'en'        =>  $request['description_en'],
        ]);
        if ($request['image']) {
            $image = $this->uploadImage($request->file('image'));
        }
        Story::create([
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'image'  =>  $image ?? null,
        ]);

        return redirect()->route('stories.index')
            ->with('success', 'История добавлена.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('admin.story.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoryRequest  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        Translate::find($story->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        Translate::find($story->description)->update([
            'ru'        =>  $request['description_ru'],
            'kz'        =>  $request['description_kz'],
            'en'        =>  $request['description_en'],
        ]);

        if ($request['image']) {
            if (File::exists($story->image)) {
                File::delete($story->image);
            }
            $image = $this->uploadImage($request->file('image'));
        }

        $story->update([
            'image'  =>  $image ?? $story->image,
        ]);

        return redirect()->route('spheres.index')
            ->with('success', 'История изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $user = auth()->user();
        $story->delete();

        return redirect()->route('stories.index')
            ->with('success', 'История удалена');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Models\Mainpage;
use App\Models\Translate;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use function redirect;
use function request;
use function view;

/**
 * Class AboutUController
 * @package App\Http\Controllers
 */
class AboutUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::get();

        return view('admin.about-u.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutU = new AboutUs();
        return view('admin.about-u.create', compact('aboutU'));
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
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);

        $description = Translate::create([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if ($request['image']) {
            $image = $this->uploadImage($request->file('image'));
        }
        $aboutU = AboutUs::create([
            'title'     =>  $title->id,
            'description'   =>  $description->id,
            'image'     =>  $image ?? null,
            'created_at'    =>  Carbon::now(),
            'block' =>  $request['block']
        ]);

        return redirect()->route('about-us.index')
            ->with('success', 'AboutU created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutU = AboutUs::find($id);

        return view('admin.about-u.show', compact('aboutU'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutU = AboutUs::find($id);

        return view('admin.about-u.edit', compact('aboutU'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Translate $aboutU
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AboutUs $aboutU)
    {
        $title = Translate::find($aboutU->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);

        $description = Translate::find($aboutU->description)->update([
            'ru'    =>  $request['description_ru'],
            'kz'    =>  $request['description_kz'],
            'en'    =>  $request['description_en'],
        ]);

        if ($request['image']) {
            if (File::exists($aboutU->image)) {
                File::delete($aboutU->image);
            }
            $image = $this->uploadImage($request->file('image'));
        }
        $aboutU->update([
            'image'      =>  $image ?? $aboutU->image,
        ]);

        return redirect()->route('about-us.index')
            ->with('success', 'AboutU updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aboutU = AboutUs::find($id)->delete();

        return redirect()->route('about-us.index')
            ->with('success', 'AboutU deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sphere;
use App\Models\Translate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SphereController
 * @package App\Http\Controllers
 */
class SphereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spheres = Sphere::paginate();

        return view('admin.sphere.index', compact('spheres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $sphere = new Sphere();

        return view('admin.sphere.create');
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
            'ru'        =>  $request['description_ru'],
            'kz'        =>  $request['description_kz'],
            'en'        =>  $request['description_en'],
        ]);
        if ($request['icon']) {
            $icon = $this->uploadImage($request->file('icon'));
        }
        Sphere::create([
            'title' =>  $title->id,
            'description'   =>  $description->id,
            'icon'  =>  $icon ?? null,
        ]);

        return redirect()->route('spheres.index')
            ->with('success', 'Sphere created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sphere = Sphere::find($id);

        return view('admin.sphere.show', compact('sphere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sphere = Sphere::find($id);

        return view('admin.sphere.edit', compact('sphere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sphere $sphere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sphere $sphere)
    {
        Translate::find($sphere->title)->update([
            'ru'    =>  $request['title_ru'],
            'kz'    =>  $request['title_kz'],
            'en'    =>  $request['title_en'],
        ]);
        Translate::find($sphere->description)->update([
            'ru'        =>  $request['description_ru'],
            'kz'        =>  $request['description_kz'],
            'en'        =>  $request['description_en'],
        ]);

        if ($request['icon']) {
            $icon = $this->uploadImage($request->file('icon'));
        }

        $sphere->update([
            'icon'  =>  $icon ?? $sphere['icon'],
        ]);

        return redirect()->route('spheres.index')
            ->with('success', 'Sphere updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sphere = Sphere::find($id)->delete();

        return redirect()->route('spheres.index')
            ->with('success', 'Sphere deleted successfully');
    }
}

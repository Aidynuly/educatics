<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Http\Controllers\Controller;
use App\Models\Translate;
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
        $translate = Translate::create($request->all());
        $aboutU = AboutUs::create([
            'description'   =>  $translate->id,
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translate $aboutU)
    {
        $aboutU->update($request->all());

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Illuminate\Http\Request;
use function redirect;
use function request;
use function view;

/**
 * Class PromocodeController
 * @package App\Http\Controllers
 */
class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes = Promocode::orderByDesc('id')->paginate(20);

        return view('admin.promocode.index', compact('promocodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promocode = new Promocode();
        return view('admin.promocode.create', compact('promocode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocode = Promocode::create($request->all());

        return redirect()->route('promocodes.index')
            ->with('success', 'Promocode created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promocode = Promocode::find($id);

        return view('admin.promocode.show', compact('promocode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocode = Promocode::find($id);

        return view('admin.promocode.edit', compact('promocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Promocode $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocode $promocode)
    {
        $promocode->update($request->all());

        return redirect()->route('promocodes.index')
            ->with('success', 'Promocode updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $promocode = Promocode::find($id)->delete();

        return redirect()->route('promocodes.index')
            ->with('success', 'Promocode deleted successfully');
    }
}

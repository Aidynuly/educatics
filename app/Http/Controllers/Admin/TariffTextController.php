<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use App\Models\TariffText;
use App\Models\Translate;
use Illuminate\Http\Request;

class TariffTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $tariff = Tariff::find($request['tariff_id']);

        return view('admin.tariff-text.create', compact('tariff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $text = Translate::create([
            'ru'    =>  $request->discount_ru,
            'kz'    =>  $request->discount_kz,
            'en'    =>  $request->discount_en,
        ]);

        $tariffText = TariffText::create([
            'tariff_id' =>  $request['tariff_id'],
            'text'      =>  $text->id,
        ]);

        return redirect()->route('tariffs.show', $request['tariff_id'])->with('success', 'Успешно создано');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TariffText::find($id)->delete();

        return redirect()->route('tariffs.index')->with('success', 'Успешно удалено');
    }
}

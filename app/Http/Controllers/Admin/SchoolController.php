<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\School;
use App\Models\Translate;
use Illuminate\Http\Request;
use function redirect;
use function request;
use function view;

/**
 * Class SchoolController
 * @package App\Http\Controllers
 */
class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::get();

        return view('admin.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school = new School();
        $cities = City::get();

        return view('admin.school.create', ['school' => $school, 'cities' => $cities]);
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
        $city = School::create([
            'name' =>  $translate->id,
            'city_id'   =>  $request['city_id'],
        ]);

        return redirect()->route('schools.index')
            ->with('success', 'School created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::find($id);

        return view('admin.school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        $cities = City::get();
        return view('admin.school.edit', ['school' => $school, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  School $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $translate = Translate::findOrFail($school->name);
        $translate->update($request->all());

        return redirect()->route('schools.index')
            ->with('success', 'School updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $school = School::find($id);
        Translate::find($school->name)->delete();
        $school->delete();

        return redirect()->route('schools.index')
            ->with('success', 'School deleted successfully');
    }
}

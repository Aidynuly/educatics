<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\Translate;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use function redirect;
use function request;
use function view;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        return view('admin.employee.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $img = $this->uploadImage($request->file('image'));
        }
        $name = Translate::create([
            'ru'    =>  $request['name_ru'],
            'kz'    =>  $request['name_kz'],
            'en'    =>  $request['name_en'],
        ]);
        $surname = Translate::create([
            'ru'    =>  $request['surname_ru'],
            'kz'    =>  $request['surname_kz'],
            'en'    =>  $request['surname_en'],
        ]);
        $position = Translate::create([
            'ru'    =>  $request['position_ru'],
            'kz'    =>  $request['position_kz'],
            'en'    =>  $request['position_en'],
        ]);
        $employee = Employee::create([
            'image'     =>  $img ?? null,
            'name'  =>  $name->id,
            'surname'   =>  $surname->id,
            'position'  =>  $position->id,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        if ($request->hasFile('image')) {
            $img = $this->uploadImage($request->file('image'));
        }
        if (isset($employee->name)) {
            Translate::find($employee->name)->update([
                'ru' => $request['name_ru'],
                'kz' => $request['name_kz'],
                'en' => $request['name_en'],
            ]);
        } else {
            $name = Translate::create([
                'ru'    =>  $request['name_ru'],
                'kz'    =>  $request['name_kz'],
                'en'    =>  $request['name_en'],
            ]);
        }
        if (isset($employee->surname)) {
            Translate::find($employee->surname)->update([
                'ru' => $request['surname_ru'],
                'kz' => $request['surname_kz'],
                'en' => $request['surname_en'],
            ]);
        } else {
            $surname = Translate::create([
                'ru'    =>  $request['surname_ru'],
                'kz'    =>  $request['surname_kz'],
                'en'    =>  $request['surname_en'],
            ]);
        }
        if (isset($employee->position)) {
            Translate::find($employee->position)->update([
                'ru' => $request['position_ru'],
                'kz' => $request['position_kz'],
                'en' => $request['position_en'],
            ]);
        } else {
            $position = Translate::create([
                'ru'    =>  $request['position_ru'],
                'kz'    =>  $request['position_kz'],
                'en'    =>  $request['position_en'],
            ]);
        }
        $employee->update([
            'image'     =>  $img ?? $employee->image,
            'name'      => $employee->name ?? $name->id,
            'surname'      => $employee->surname ?? $surname->id,
            'position'      => $employee->position ?? $position->id,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = Employee::find($id)->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}

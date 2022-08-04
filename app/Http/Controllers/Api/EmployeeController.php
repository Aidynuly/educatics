<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get(Request $request)
    {
        $request->validate(['lang' => 'required']);
        $lang = $request->lang;
        $employees = Employee::get();

        return self::response(200, EmployeeResource::collection($employees), 'success');
    }
}

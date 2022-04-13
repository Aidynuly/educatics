<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function get(Request $request)
    {
        $employees = Employee::get();

        return self::response(200, $employees, 'success');
    }
}

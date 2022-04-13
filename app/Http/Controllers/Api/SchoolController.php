<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function get(Request $request)
    {
        return self::response(200, School::get(), 'success');
    }
}

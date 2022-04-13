<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function get(Request $request)
    {
        return self::response(200, City::get(), 'success');
    }
}

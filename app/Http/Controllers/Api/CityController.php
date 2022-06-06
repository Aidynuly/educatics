<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Tariff;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function get(Request $request)
    {
        return self::response(200, CityResource::collection(City::get()), 'success');
    }

    public function getTariff(Request $request)
    {
        return self::response(200, Tariff::get(), 'success');
    }
}

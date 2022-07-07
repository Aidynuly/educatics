<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\TariffResource;
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
        $request->validate([
            'lang'  =>  'required',
        ]);
        $data['first'] = new TariffResource(Tariff::first());
        $data['second'] = new TariffResource(Tariff::find(10));
        $data['third'] = new TariffResource(Tariff::find(11));

        return self::response(200, $data, 'success');
    }
}

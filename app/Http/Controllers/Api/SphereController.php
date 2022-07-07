<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sphere;

class SphereController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
        ]);
        $lang = $request->lang;
        $spheres = Sphere::join('translates as title', 'title.id', 'spheres.title')
            ->join('translates as desc', 'desc.id', 'spheres.description')
            ->select('spheres.id', 'title.'.$lang.' as title', 'desc.'.$lang.' as description', 'spheres.icon', 'spheres.created_at')->get();
        return self::response(200, $spheres, 'success');
    }
}

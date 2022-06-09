<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'name'  =>  'required',
            'surname'  =>  'required',
            'phone'  =>  'required',
            'city_id'  =>  'required|exists:cities,id',
            'login'  =>  'required',
            'age'  =>  'required',
            'school_name'  =>  'required',
        ]);

        $feedback = Feedback::create($request->all());

        return self::response(201, $feedback, 'created');
    }
}

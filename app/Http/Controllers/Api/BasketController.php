<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Tariff;
use App\Models\Basket;
use App\Http\Resources\BasketResource;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'tariff_id' => 'required|exists:tariffs,id',
            'courses' => 'required|array',
        ]);
        $user = auth()->user();
        $tariff = Tariff::find($request['tariff_id']);
        foreach ($request['courses'] as $course) {
            if (UserCourse::whereUserId($user->id)->where('course_id', $course)->exists()) {
                return self::response(400, new CourseResource(Course::find($course)), 'Курс уже был куплен!');
            }
        }
        if ($tariff->count < count($request['courses'])) {
            return response()->json([
                'message' => 'Количество курсов не совпадает с количеством тарифа'
            ], 400);
        }
        if (Basket::where('user_id', $user->id)->where('tariff_id', '!=', $request['tariff_id'])->where('status', 'in_process')->exists()) {
            return response()->json([
                'message' => 'У вас уже есть другой тариф. Очистите корзину!',
            ], 400);
        }
        if (Basket::whereUserId($user->id)->where('tariff_id', $request['tariff_id'])->where('status', 'in_process')->exists()) {
            Basket::whereUserId($user->id)->where('tariff_id', $request['tariff_id'])->where('status', 'in_process')->delete();
        }
        foreach ($request['courses'] as $course) {
            Basket::insert([
                'user_id' => $user->id,
                'tariff_id' => $tariff->id,
                'course_id' => $course,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $baskets = Basket::where('user_id', $user->id)->get();

        return self::response(201, $baskets, 'created');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'basket_id' => 'required|exists:baskets,id',
        ]);
        Basket::find($request['basket_id'])->delete();

        return self::response(202, null, 'deleted');
    }

    public function get(Request $request)
    {
        $request->validate([
            'lang' => 'required',
        ]);
        $user = auth()->user();
        if (isset($request['tariff_id'])) {
            Basket::whereUserId($user->id)->where('tariff_id', $request['tariff_id'])->where('status', 'in_process')->delete();
        }
        $baskets = Basket::where('user_id', $user->id)->where('status', 'in_process')->get();
        $totalPrice = 0;
        if (count($baskets) < 0) {
            return self::response(400, null, 'В корзине пусто');
        }
        $tariff = Basket::where('user_id', $user->id)->where('status', Basket::STATUS_IN_PROCESS)->first();
        $totalPrice += Tariff::whereId($tariff->tariff_id)->value('price');

        return response()->json([
            'data' => BasketResource::collection($baskets),
            'message' => 'success',
            'status' => 200,
            'total_price' => $totalPrice,
            'tariff_id' => Basket::where('user_id', $user->id)->where('status', Basket::STATUS_IN_PROCESS)->value('tariff_id'),
        ]);
    }

    public function clear(Request $request)
    {
        $user = auth()->user();
        Basket::where('user_id', $user->id)->delete();

        return response()->json([
            'message' => 'success',
        ], 200);
    }

    public function courses(Request $request)
    {
        $request->validate([
            'lang'  =>  'required',
            'tariff_id' =>  'required|exists:tariffs,id'
        ]);
        $user = auth()->user();
        $courses = Basket::whereUserId($user->id)->where('tariff_id', $request['tariff_id'])->where('status', 'in_process')->pluck('course_id')->toArray();

        return self::response(200, $courses, 'success');
    }
}

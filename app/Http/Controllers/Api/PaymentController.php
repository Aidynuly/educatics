<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use App\Models\User;
use App\Models\Basket;
use App\Models\UserCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Service\Paybox;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $request->validate([
            'tariff_id' =>  'required|exists:tariffs,id',
        ]);
        $user = auth()->user();
        $tariff = Tariff::find($request['tariff_id']);
        $req = [
            'pg_salt'   =>  'some random string',
            'pg_amount' =>  $tariff->price,
            'pg_description'    =>  'payment',
            'pg_order_id'   =>  "$user->id",
            'tariff_id' =>  $tariff->id,
        ];
        $payment = new Paybox($req);
        $response = $payment->initPay($req);

        return self::response(200, $response, 'success');
    }

    public function success($user, $tariff)
    {
        $tariff = Tariff::find($tariff);
        User::find($user)->update([
            'tariff_id'    =>  $tariff->id,
            'deadline'      =>  Carbon::now()->addMonths(3),
            'count'     =>  $tariff->count,
        ]);
        Basket::where('user_id', $user)->where('tariff_id', $tariff->id)->update([
            'status'    =>  'success'
        ]);
        $baskets = Basket::where('user_id', $user)->where('tariff_id', $tariff->id)->get();
        if (count($baskets) > 0 || count($baskets) == 0) {
            foreach ($baskets as $basket) {
                UserCourse::insert([
                    'user_id'   =>  $user,
                    'course_id' =>  $basket['course_id'],
                    'status'        =>  'in_process',
                    'created_at'    =>  Carbon::now(),
                ]);
            }
        }
        return view('emails.success');
    }

    public function reject($user, $tariff)
    {
        User::find($user)->update([
            'tariff_id' =>  null,
            'deadline'      =>  null,
            'count'     =>  0,
        ]);
        $baskets = Basket::where('user_id', $user)->where('tariff_id', $tariff)->update([
            'status'    =>  'reject'
        ]);

        return self::response(200, User::find($user), 'success');
    }
}

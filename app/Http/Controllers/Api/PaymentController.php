<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Paybox;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $request->validate([
            'price' =>  'required',
        ]);
        $payment = new Paybox($request->all());
        $response = $payment->initPay($request->all());

        return self::response(200, $response, 'success');
    }
}

<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Http;

class Paybox
{
    const URL = 'https://api.paybox.money/init_payment.php';
    const SECRET_KEY = 'CmAKMPDUfIm0aOOm';
    const MERCHANT_ID = '542526';
    const INIT_ROUTE = 'init_payment.php';
    const SUCCESS_URL = 'https://jaryk-back.test-nomad.kz/api/success-payment/';
    const REJECT_URL = 'https://jaryk-back.test-nomad.kz/api/reject-payment/';
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function initPay()
    {
        $this->data['pg_success_url'] = self::SUCCESS_URL . $this->data['pg_order_id'] . '/' . $this->data['tariff_id'] . '/' . $this->data['transaction_id'] . '/' . $this->data['promocode'];
        $this->data['pg_reject_url'] = self::REJECT_URL . $this->data['pg_order_id'] . '/' . $this->data['tariff_id'] . '/' . $this->data['transaction_id'] . '/' . $this->data['promocode'];
        $this->data['pg_merchant_id'] = self::MERCHANT_ID;
        $requestForSignature = $this->makeFlatParamsArray($this->data);

        ksort($requestForSignature);
        array_unshift($requestForSignature, self::INIT_ROUTE);
        array_push($requestForSignature, self::SECRET_KEY);

        $this->data['pg_sig'] = md5(implode(';', $requestForSignature));
        $response = Http::post(self::URL, $this->data);

        return new \SimpleXMLElement($response);
    }

    private function makeFlatParamsArray($arrParams, $parent_name = '')
    {
        $arrFlatParams = [];
        $i = 0;
        foreach ($arrParams as $key => $val) {
            $i++;
            $name = $parent_name . $key . sprintf('%03d', $i);
            if (is_array($val)) {
                $arrFlatParams = array_merge($arrFlatParams, $this->makeFlatParamsArray($val, $name));
                continue;
            }
            $arrFlatParams += array($name => (string)$val);
        }

        return $arrFlatParams;
    }
}

<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Http;

class Paybox
{
    const URL = 'https://api.paybox.money/init_payment.php';
    const SECRET_KEY = 'CmAKMPDUfIm0aOOm';
    const MERCHANT_ID = '542526';
    const INIT_ROUTE = 'init_payment.php';
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function initPay()
    {
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

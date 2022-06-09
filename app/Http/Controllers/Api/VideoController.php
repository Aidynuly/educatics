<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vimeo\Vimeo;

class VideoController extends Controller
{
    const CLIENT_ID = '7e1cb8ef45c2a9ab8020420bbcfb905d8a4dfc04';
    const CLIENT_SECRET = 'Pqg3wYI9cc66ac3TpgAHX09fuRXpcGp1Bti0jxLY5xnoa6cEC9hyZPjVoMVQX+y2Rrf8SvD2zDl12A6chSbY7RM7aQ4qSWDLjHKfJrGFnkGqCoT4JlIyMbx5TebJOpeg';
    const ACCESS_TOKEN = '1e4c2619f3606a56b99cbbbfa760cbc4';

    public function get(Request $request)
    {
        $client = new Vimeo(self::CLIENT_ID, self::CLIENT_SECRET, self::ACCESS_TOKEN);
        $response = $client->request('/tutorial', [], 'get');
        dd($response);
    }
}

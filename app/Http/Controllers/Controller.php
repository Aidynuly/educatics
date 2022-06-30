<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function response($status, $data, $message = null): JsonResponse
    {
        return response()->json([
            'success'   =>  boolval($status == 200),
            'status'    =>  $status,
            'message'   =>  $message,
            'data'  =>  $data,
        ], $status);
    }

    protected function uploadImage($image)
    {
        $path = Storage::disk('public')->put('images', $image);
        $name = basename($path);

        return 'storage/images/' . $name;
    }

    protected function uploadDocument($doc)
    {
        $path = Storage::disk('public')->put('docs', $doc);
        $name = basename($path);

        return 'storage/docs/' . $name;
    }
}

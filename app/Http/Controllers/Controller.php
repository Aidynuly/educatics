<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Storage;
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static function response($status, $data, $message = null): JsonResponse
    {
        return response()->json([
            'success'   =>  boolval($status == 200 || $status == 201 || $status == 202),
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

    protected function deleteFile($file)
    {
        try {
            Storage::delete($file);
        } catch (\RuntimeException $exception) {
            dd($exception->getMessage());
        }
    }

    protected function getProcentFromUser($count)
    {
        $userCount = User::count();

        return ($count * 100) / $userCount;
    }

    protected function makeCertificate($name,$surname, $course)
    {
        $data = [
            'name' => $name,
            'course'    =>  $course,
            'surname'   =>  $surname,
        ];
        $pdf = PDF::loadView('pdf', $data);
        $path = $pdf->stream('element.pdf')->header('Content-Type: text/html; charset=utf-8' , 'application/pdf', 'charset=utf-8');
        $name = rand().'_'.time().'.pdf';
        \Illuminate\Support\Facades\Storage::put('public/pdf/'. $name, $path);

        return 'storage/pdf/' . $name;
    }
}

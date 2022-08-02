<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function get(Request $request)
    {
        $name = 'Name Surname';
        $course = 'Course';

        return view('certificate.index', compact('name', 'course'));
    }
}

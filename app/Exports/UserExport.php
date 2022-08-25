<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UserExport implements FromView
{
    public function view(): View
    {
        return view('exports.user', [
            'users' =>  User::get()
        ]);
    }
}

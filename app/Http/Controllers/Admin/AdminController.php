<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $moderator = Moderator::where('login', $request['login'])->first();
        if ($moderator) {
            if (Hash::check($request['password'], $moderator['password'])) {
                session()->put('vK68TF23TfYKYDBZSCC9', 1);
                session()->put('admin', 1);
                session()->save();

                return redirect()->route('admin.main');
            }
            return redirect()->back()->withErrors(['Неправильный пароль!']);
        }

        return redirect()->back()->withErrors(['Пользователь не существует!']);
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->flush();

        return redirect()->route('login');
    }

    public function main(): Factory|View|Application
    {
        return view('admin.main');
    }

    public function loginPage(): View|Factory|Application|\Illuminate\Http\RedirectResponse
    {
        if (session()->has('admin')) {
            return redirect()->route('admin.main');
        }

        return view('admin.login');
    }
}

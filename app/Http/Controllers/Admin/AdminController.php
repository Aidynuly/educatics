<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderator;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;

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
        $firstDay = Carbon::now()->startOfMonth()->modify('-1 month')->toDateString();
        $lastDay = Carbon::now()->endOfMonth()->modify('-1 month')->toDateString();
        $transactions = Transaction::where('created_at', Carbon::now()->month)->get();
        $successTransactions = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_SUCCESS)->get();
        $processTransactions = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_IN_PROCESS)->get();
        $rejectTransactions = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_REJECT)->get();
        $successSum = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_SUCCESS)->sum('price');
        $processSum = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_IN_PROCESS)->sum('price');
        $rejectSum = Transaction::where('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_REJECT)->sum('price');

        return view('admin.main', compact(
            'firstDay', 'lastDay', 'transactions', 'successTransactions', 'processTransactions', 'rejectTransactions', 'successSum', 'processSum',
            'rejectSum'
        ));
    }

    public function loginPage(): View|Factory|Application|\Illuminate\Http\RedirectResponse
    {
        if (session()->has('admin')) {
            return redirect()->route('admin.main');
        }

        return view('admin.login');
    }

    public function pdf(Request $request)
    {
        $pdf = PDF::loadView('index');
        $path = Storage::put('public/pdf/invoice-1.pdf', $pdf->output());
        $url = basename($path);
        dd($url);
    }
}

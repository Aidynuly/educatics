<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $firstDay = Carbon::now()->startOfMonth()->toDateString();
        $lastDay = Carbon::now()->endOfMonth()->toDateString();
        $transactions = Transaction::whereMonth('created_at', Carbon::now()->month)->get();
        $successTransactions = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_SUCCESS)->get();
        $processTransactions = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_IN_PROCESS)->get();
        $rejectTransactions = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_REJECT)->get();
        $successSum = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_SUCCESS)->sum('price');
        $processSum = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_IN_PROCESS)->sum('price');
        $rejectSum = Transaction::whereMonth('created_at', Carbon::now()->month)->where('status', Transaction::STATUS_REJECT)->sum('price');

        $courses = Course::orderBy('queue','asc')->paginate(10);

        return view('admin.main', compact(
            'firstDay', 'lastDay',
            'transactions',
            'successTransactions',
            'processTransactions',
            'rejectTransactions',
            'successSum',
            'processSum',
            'rejectSum',
            'courses',
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
        $data = [
            'name' => 'Name',
            'surname'   =>   'Surname',
            'course'    =>  'Course',
        ];
        $pdf = PDF::loadView('pdf', $data);
        $path = $pdf->stream('element.pdf')->header('Content-Type: text/html; charset=utf-8' , 'application/pdf', 'charset=utf-8');
        $name = rand().'_'.time().'.pdf';
        Storage::put('public/pdf/'. $name, $path);

        return self::response(200, $name, 'success');
    }
}

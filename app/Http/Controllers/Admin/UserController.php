<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\City;
use App\Models\School;
use App\Models\Tariff;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Compound;
use function redirect;
use function request;
use function view;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $tariffs = Tariff::get();
        $schools = School::get();
        $cities = City::get();

        return view('admin.user.create', ['user' => $user, 'tariffs' => $tariffs, 'schools' => $schools, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
            $user->update([
                'image' =>  $path
            ]);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);
        $transactions = Transaction::whereUserId($id)->get();
        $baskets = Basket::whereUserId($id)->where('status', Basket::STATUS_IN_PROCESS)->get();
        $courses = UserCourse::whereUserId($id)->get();

        return view('admin.user.show', compact('user', 'transactions', 'baskets', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $tariffs = Tariff::get();
        $schools = School::get();
        $cities = City::get();

        return view('admin.user.edit', ['user' => $user, 'tariffs' => $tariffs, 'schools' => $schools, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image'));
            $user->update([
                'image' =>  $path
            ]);
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}

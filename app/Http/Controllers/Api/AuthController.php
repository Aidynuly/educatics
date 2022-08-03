<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Requests\ExecuteSolutionRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        $user->password = Hash::make($request['password']);
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'  =>  $token,
            'data'      =>  $user,
            'message'   =>  'success',
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        if (!Auth::attempt($request->only('login', 'password'))) {
            return self::response(400, null, 'incorrect phone or password');
        }

        $user = User::whereLogin($request['login'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'  =>  $token,
            'data'          =>  $user,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return self::response(200, null, 'Logout');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'old_password'  =>  'required',
            'password'  =>  'required|confirmed|min:6',
        ]);
        $user = auth()->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password'  =>  Hash::make($request->password)
            ])->save();

            return self::response(202, new UserResource($user), 'success');
        }

        return self::response(400, null, 'Старый пароль неверный');
    }

    public function updateSession(Request $request)
    {
        $request->validate([
            'session_id'    =>  'required'
        ]);
        $user = auth()->user();
        $user->update([
            'session_id'    =>  $request['session_id'],
        ]);

        return self::response(202, null, 'success');
    }

    public function update(Request $request)
    {
        $request->validate([
            'age'       =>  'required',
            'login' =>  'required',
            'phone' =>  'required',
            'name'  =>  'required',
            'surname'   =>  'required',
            'school_name'   =>  'required',
            'city_id'   =>  'required|exists:cities,id',
        ]);
        $user = auth()->user();
        $user->update([
            'age'       =>  $request['age'],
            'login' =>   $request['login'],
            'phone' =>   $request['phone'],
            'name'  =>  $request['name'],
            'surname'   =>  $request['surname'],
            'school_name'   =>   $request['school_name'],
            'city_id'   =>   $request['city_id'],
        ]);

        return self::response(200, new UserResource(auth()->user()),'success');
    }

    public function upload(Request $request)
    {
        $request->validate(['image' => 'required']);
        $user = auth()->user();
        $path = $this->uploadImage($request->file('image'));
        $user->update([
            'image' =>  $path,
        ]);

        return self::response(202, new UserResource(auth()->user()), 'success');
    }
}

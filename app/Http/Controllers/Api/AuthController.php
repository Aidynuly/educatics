<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use function PHPUnit\Framework\isNull;

class UserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        if ($token) {
            $user = User::find($token->tokenable_id);
            if (isset($user->verified_at)) {
                return $next($request);
            }
        }

        return response()->json([
            'status'    =>  401,
            'message'   =>  'Not Authorized',
        ], 401);
    }
}

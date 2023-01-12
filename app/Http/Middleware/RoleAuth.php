<?php

namespace App\Http\Middleware;

use App\Models\LoginToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $loginToken = LoginToken::where('token', session('token'))->first();
        $user = User::find($loginToken->user_id);

        if ($user->role->name != $role) {
            return redirect()->back();
        }

        return $next($request);
    }
}

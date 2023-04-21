<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EUSMiddleware
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


        $credentials = $request->only('name', 'password', 'role');
        if (Auth::attempt($credentials)) {
            if (Gate::allows('isAdmin')) {
                return $next($request);
            } else {
                abort(403);
            }
        } else {
            return to_route('log-in')->with('danger', 'error login !');
        }
    }
}

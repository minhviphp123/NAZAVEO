<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkUserMiddleware
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
        if (Auth::check()) {
            // Người dùng đã đăng nhập, tiếp tục xử lý request
            return $next($request);
        } else {
            // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
            // return redirect('/login');
            session()->put('!login-mess', 'not yet login');
            return redirect()->route('home');
        }
    }
}

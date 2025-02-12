<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_id != '2') {
                return $next($request);
            } else {
                return redirect()->route('admin.login.form')->with('error', 'Tài khoản và mật khẩu không hợp lệ!');
            }
        } else {
            return redirect()->route('admin.login.form')->with('error', 'Vui lòng đăng nhập tài khoản của bạn!');
        }
    }
}

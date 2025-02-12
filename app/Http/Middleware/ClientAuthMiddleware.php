<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $restrictedRoutes = ['client.login.form', 'client.register.form'];

            // dd($request->route()->getName());

            if (in_array($request->route()->getName(), $restrictedRoutes)) {
                return redirect()->route('client.home')->with('error', 'Bạn đã đăng nhập, không thể truy cập trang này!');
            }
        }

        return $next($request);
    }
}

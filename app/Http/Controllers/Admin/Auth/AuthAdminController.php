<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view("backend.auth.login");
    }

    public function login(AuthLoginRequest $request)
    {
        $dataLogin = $request->only(["email", "password"]);

        $remember_token = $request->has('remember');
        // dd($dataLogin);
        if (Auth::attempt($dataLogin, $remember_token)) {
            if (Auth::user()->role_id == '1' || Auth::user()->role_id == '3') {

                $request->session()->put('admin_auth', Auth::user());
                return redirect()->route("index")->with("success", "Đăng Nhập Thành Công!");
            } else {
                return back()->with("error", "Email và mật khẩu không hợp lệ!");
            }
        } else {
            return back()->with("error", "Email hoặc Mật Khẩu không đúng!");
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.logout.success')->with('success', 'Đăng xuất thành công');
    }

    public function viewLogout()
    {
        return view('backend.auth.logout');
    }
}

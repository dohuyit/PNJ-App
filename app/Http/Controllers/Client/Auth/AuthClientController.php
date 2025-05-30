<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthClientController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(AuthLoginRequest $request)
    {
        $dataLogin = $request->only(['email', 'password']);

        $user = User::where('email', $dataLogin['email'])->first();

        if (!$user) {
            return back()->with("error", "Email hoặc Mật khẩu không đúng!");
        }

        if ($user->google_id) {
            return back()->with("error", "Tài khoản đăng nhập không hợp lệ!");
        }

        $remember_token = $request->has('remember');
        if (Auth::attempt($dataLogin, $remember_token)) {
            if (Auth::user()->role_id == '2') {
                $request->session()->put('client_auth', Auth::user());

                // dd(session()->all()); 
                return redirect()->route('client.home')->with('success', 'Đăng nhập thành công');
            } else {
                return back()->with("error", "Email và mật khẩu không hợp lệ!");
            }
        } else {
            return back()->with("error", "Email hoặc Mật Khẩu không đúng!");
        }
    }

    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function register(AuthRegisterRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $dataRegister = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => 2
                ];

                // dd($dataRegister);
                User::create($dataRegister);
            });

            return redirect()->route('client.login.form')->with('success', 'Đăng kí tài khoản thành công');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Lỗi dữ liệu, vui lòng kiểm tra lại');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        session()->forget('client_auth');

        return redirect()->route('client.home')->with('success', 'Đăng xuất tài khoản thành công!');
    }
}

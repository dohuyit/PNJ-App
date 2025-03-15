<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    // Chuyển hướng đến Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Xử lý phản hồi từ Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            // dd($googleUser);
            $user = $this->findOrCreateUser($googleUser);
            if ($user->role_id == 2) {
                Auth::login($user);
                Session::put('client_auth', Auth::user());
            } else {
                return redirect()->route('client.login.form')->with('error', 'Đăng nhập thất bại');
            }
            if (session()->has('set_password')) {
                $idUser = Session::get('idNewUserByGoogle', null);
                return view('frontend.auth.set-password', compact('idUser'));
            }
            return redirect()->route('client.home')->with('success', 'Đăng nhập thành công');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('client.login.form')->with('error', 'Lỗi đăng nhập Google.');
        }
    }

    // Tạo hoặc lấy người dùng từ cơ sở dữ liệu
    private function findOrCreateUser($googleInfo)
    {
        $user = User::where('email', $googleInfo->email)->first();
        // dd($user);
        if (!$user) {
            $user = User::create([
                'username' => $googleInfo->getName(),
                'email' => $googleInfo->getEmail(),
                'role_id' => 2,
                'google_id' => $googleInfo->getId(),
                'password' => bcrypt(random_int(10000, 99999)),
            ]);
            session([
                'set_password' => true,
                'idNewUserByGoogle' => $user->id
            ]);
        }
        return $user;
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function showSetPasswordForm()
    {
        // Nếu chưa đăng nhập hoặc không có session đặt mật khẩu thì quay về trang chủ
        if (!Auth::check() || !session()->has('set_password')) {
            return redirect()->route('client.home');
        }

        return view('frontend.auth.set-password');
    }

    public function processPassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('client.login.form');
        }

        $request->validate([
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ]);

        $idUser = $request->input('id');

        $updated = User::where('id', $idUser)->update([
            'password' => bcrypt($request->input('password'))
        ]);

        Session::forget(['set_password', 'idNewUserByGoogle']);

        if ($updated) {
            return redirect()->route('client.login.form')->with('success', 'Mật khẩu đã được cập nhật thành công.');
        } else {
            return back()->with('error', 'Cập nhật mật khẩu thất bại. Vui lòng thử lại.');
        }
    }
}

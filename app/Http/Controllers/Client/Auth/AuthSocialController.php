<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            return redirect()->route('client.home')->with('success', 'Đăng nhập thành công');
        } catch (\Exception $e) {
            Log::error('Lỗi Google Auth: ' . $e->getMessage());
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
        }
        return $user;
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
}

<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user = $this->findOrCreateUser($googleUser, 'google');
            Auth::login($user);
            return redirect()->route('client.home');
        } catch (\Exception $e) {
            return redirect()->route('client.login.form')->with('error', 'Lỗi đăng nhập Google.');
        }
    }

    // // Chuyển hướng đến Facebook
    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // // Xử lý phản hồi từ Facebook
    // public function handleFacebookCallback()
    // {
    //     try {
    //         $facebookUser = Socialite::driver('facebook')->user();
    //         $user = $this->findOrCreateUser($facebookUser, 'facebook');
    //         Auth::login($user);
    //         return redirect()->route('home');
    //     } catch (\Exception $e) {
    //         return redirect()->route('login')->with('error', 'Lỗi đăng nhập Facebook.');
    //     }
    // }

    // Tạo hoặc lấy người dùng từ cơ sở dữ liệu
    private function findOrCreateUser($providerUser, $provider)
    {
        $user = User::where('email', $providerUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'password' => bcrypt(uniqid()), // Mặc định tạo mật khẩu ngẫu nhiên
            ]);
        }

        return $user;
    }
}

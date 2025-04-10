<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            // dd($facebookUser);
            $user = $this->findOrCreateUser(null, $facebookUser);
            if (!$user) {
                return redirect()->route('client.login.form')
                    ->with('error', 'Không thể tạo hoặc tìm thấy tài khoản người dùng.');
            }

            if ($user->role_id == 2) {
                Auth::login($user);
                Session::put('client_auth', Auth::user());
                return redirect()->route('client.home')
                    ->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('client.login.form')
                    ->with('error', 'Tài khoản không có quyền truy cập.');
            }
        } catch (\Exception $e) {
            Log::error('Lỗi Facebook Auth: ' . $e->getMessage());
            return redirect()->route('client.login.form')->with('error', 'Lỗi đăng nhập Facebook.');
        }
    }


    private function findOrCreateUser($googleInfo = null, $facebookInfo = null)
    {
        try {
            if ($googleInfo) {
                $user = User::where('email', $googleInfo->email)->first();

                if (!$user) {
                    $user = User::create([
                        'username' => $googleInfo->getName(),
                        'email' => $googleInfo->getEmail(),
                        'role_id' => 2,
                        'google_id' => $googleInfo->getId(),
                        'password' => bcrypt(random_int(10000, 99999)),
                    ]);
                } else {
                    // Update google_id if not set
                    if (!$user->google_id) {
                        $user->google_id = $googleInfo->getId();
                        $user->save();
                    }
                }
            } elseif ($facebookInfo) {
                // Check user by facebook_id first
                $user = User::where('facebook_id', $facebookInfo->getId())->first();

                if (!$user) {
                    // If not found by facebook_id, check by email
                    $user = User::where('email', $facebookInfo->getEmail())->first();
                }

                if (!$user) {
                    $user = User::create([
                        'username' => $facebookInfo->getName(),
                        'email' => $facebookInfo->getEmail(),
                        'role_id' => 2,
                        'facebook_id' => $facebookInfo->getId(),
                        'password' => bcrypt(random_int(10000, 99999)),
                    ]);
                } else {
                    // Update facebook_id if not set
                    if (!$user->facebook_id) {
                        $user->facebook_id = $facebookInfo->getId();
                        $user->save();
                    }
                }
            }

            return $user;
        } catch (\Exception $e) {
            Log::error('Error in findOrCreateUser: ' . $e->getMessage());
            return null;
        }
    }
}

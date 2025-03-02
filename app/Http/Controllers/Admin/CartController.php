<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        $user = Auth::user();
        dd($user);
        try {
            $cart = Cart::query()->where('user_id');
        } catch (\Throwable $e) {
            dd($e->getMessage);
        }
    }
}

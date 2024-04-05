<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models;
use Illuminate\Cache\LuaScripts;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart_page()
    {
        $user = Auth::user();
        $carts = CartModel::where('user_id', $user->id)->get();

        if ($carts !== null && $carts->isNotEmpty()) {
            return view('cart', compact('carts'));
        } else {
            $carts = NULL;
            return view('cart', compact('carts'));
        }
    }

    public function add_to_cart($id)
    {
        $user = User::find(Auth::user()->id);
        $product_id = $id;

        // Check if the product is already in the cart
        $cart = $user->carts()->where('product_id', $product_id)->first();
        $times = 0;
        if ($cart) {
            // If the product is already in the cart, update the quantity
            $cart->increment('times'); // You can customize this based on your needs

            $times = $cart->times;
        } else {
            // If the product is not in the cart, add a new item
            $cart = new CartModel();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->save();
            $times = 1;
        }
        $cart = $user->carts()->where('product_id', $product_id)->first();
        $data = [
            'success' => true,
            'times' => $times,
            // any other data you want to include
        ];

        return response()->json($data);
    }
    public function buy_now($id)
    {
        $user = User::find(Auth::user()->id);
        $product_id = $id;

        // Check if the product is already in the cart
        $cart = $user->carts()->where('product_id', $product_id)->first();

        if ($cart) {
            // If the product is already in the cart, update the quantity
            $cart->increment('times'); // You can customize this based on your needs
        } else {
            // If the product is not in the cart, add a new item
            $cart = new CartModel();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->save();
        }

        return redirect()->route('cart.page');
    }

    public function updateQuantity(Request $request)
    {
        try {
            $cartId = $request->input('cart_id');
            $quantity = $request->input('quantity');

            $cart = CartModel::findOrFail($cartId);
            $cart->update(['times' => $quantity]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    public function cart_count()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cartCount = CartModel::where('user_id', $user->id)->count();
            return response()->json(['success' => true, 'cartCount' => $cartCount]);
        } else {
            return response()->json(['success' => false, 'message' => 'User is not authenticated']);
        }
    }


}

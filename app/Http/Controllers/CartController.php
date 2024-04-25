<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\IPAddressModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart_page()
    {
        $user = Auth::user();
        $carts = CartModel::where('user_id', $user->id)->get();

        // Create an array to store product IDs in the cart
        $productIdsInCart = $carts->pluck('product_id')->toArray();

        // Create an array to store category IDs of products in the cart
        $categoryIds = ProductModel::whereIn('id', $productIdsInCart)->pluck('category_id')->toArray();

        // Fetch recommended products based on the categories of products in the cart
        $recommendedProducts = ProductModel::whereNotIn('id', $productIdsInCart)
            ->whereIn('category_id', $categoryIds)
            ->get();

        if ($carts->isNotEmpty()) {
            return view('cart', compact('carts', 'recommendedProducts'));
        } else {
            $carts = null;
            $recommendedProducts = null;
            return view('cart', compact('carts', 'recommendedProducts'));
        }
    }



    public function add_to_cart($id)
    {
        $user = User::find(Auth::user()->id);
        $product_id = $id;

        // Check if the product is already in the cart
        $cart = $user->carts()->where('product_id', $product_id)->first();

        if ($cart) {
            // If the product is already in the cart, update the quantity
            $cart->increment('times'); // You can customize this based on your needs
            $times = $cart->times;
        } else {
            // If the product is not in the cart, add a new item with times = 1
            $cart = new CartModel();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->times = 1; // Set times to 1
            $cart->save();
            $times = 1;
        }

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
        $user_id = Auth::user()->id;
        $cart = CartModel::where('id', $request->cart_id)
            ->where('user_id', $user_id)
            ->orWhere('product_id', $request->product_id)
            ->first();
        $product = ProductModel::findOrFail($request->product_id);

        if ($cart) {
            // Update the quantity based on the increment value
            $cart->update([
                'times' => $cart->times + $request->increment,
            ]);

            // Return a JSON response indicating success
            return response()->json([
                'success' => true,
                'message' => 'Cart quantity updated successfully',
                'times' => $cart->times,
                'price' => $product->discounted_price,


            ]);
        } else {
            // If the cart item is not found, return a JSON response indicating failure
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found',
            ]);
        }
    }




    public function cart_count()
    {
        if (Auth::user()) {
            $cartCount = CartModel::where('user_id', Auth::user()->id)->count();
            return response()->json([
                'success' => true,
                'cartCount' => $cartCount,
            ]);
        } else {
            $ip=request()->ip();
            $IpID=IPAddressModel::where('ip_address',$ip)->first();
            $cartCount = CartModel::where('ip_id', $IpID->id)->get()->count();
            return response()->json([
                'success' => true,
                'cartCount' => $cartCount,

            ]);
        }
    }
}

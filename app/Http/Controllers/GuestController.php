<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CartModel;
use App\Models\IPAddressModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function temp_cart_page()
    {
        $IP = request()->ip();
        $found = IPAddressModel::where('ip_address', $IP)->first();
        if ($found) {
            $carts = CartModel::where('ip_id', $found->id)->get();

            // Create an array to store product IDs in the cart
            $productIdsInCart = $carts->pluck('product_id')->toArray();

            // Create an array to store category IDs of products in the cart
            $categoryIds = ProductModel::whereIn('id', $productIdsInCart)->pluck('category_id')->toArray();

            // Fetch recommended products based on the categories of products in the cart
            $recommendedProducts = ProductModel::whereNotIn('id', $productIdsInCart)
                ->whereIn('category_id', $categoryIds)
                ->get();
            if ($carts->isNotEmpty()) {
                return view('guest.tempCart', compact('carts', 'recommendedProducts'));
            }else {
                $carts = null;
                $recommendedProducts = null;
                return view('guest.tempCart', compact('carts', 'recommendedProducts'));
            }
        }else {
            $carts = null;
            $recommendedProducts = null;
            return view('guest.tempCart', compact('carts', 'recommendedProducts'));
        }
    }

    public function updateQuantity(Request $request)
    {
       $IP= $request->ip();
       $found = IPAddressModel::where('ip_address', $IP)->first();
        $cart = CartModel::where('id', $request->cart_id)
            ->where('ip_id', $found->id)
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


}

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
            return view('newcart', compact('carts', 'recommendedProducts'));
        } else {
            $carts = null;
            $recommendedProducts = null;
            return view('newcart', compact('carts', 'recommendedProducts'));
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
        session()->put('add-to-cart-success', 'Product added to cart successfully');
        $data = [
            'success' => true,
            'times' => $times,

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
            $times=$cart->times + $request->increment;
            // Update the quantity based on the increment value
            $cart->update([
                'times' => $cart->times + $request->increment,
            ]);

            // Return a JSON response indicating success
            return response()->json([
                'success' => true,
                'message' => 'Cart quantity updated successfully',
                'times' => $times,
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




    public function cart_count(Request $request)
    {
        if (Auth::user()) {
            $cartCount = CartModel::where('user_id', Auth::user()->id)->count();
            return response()->json([
                'success' => true,
                'cartCount' => $cartCount,
            ]);
        } else {
            $cookies = $request->cookie();
            $products = [];

            // Check if the 'products' cookie exists
            if (isset($cookies['products'])) {
                // Unserialize the cookie value
                $cookie_data = unserialize($cookies['products']);

                // Initialize an empty array to store product IDs and quantities
                $products = [];

                // Iterate through each product ID and quantity in the cookie data
                foreach ($cookie_data as $product_id => $quantity) {
                    // Retrieve the product from the database based on its ID
                    $product = ProductModel::find($product_id);

                    // If the product exists, add it to the products array along with its quantity
                    if ($product) {
                        $products[] = [
                            'id' => $product->id,
                            'name' => $product->name,
                            'image' => $product->image,
                            'model' => $product->model,
                            'quantity' => $quantity['items'],
                            'discounted_price' => $product->discounted_price,
                        ];
                    }
                }
                $cartCount = count($products);
                return response()->json([
                    'success' => true,
                    'cartCount' => $cartCount,

                ]);
            }
        }
    }
}

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
    public function temp_cart_page(Request $request)
    {

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
                        'image'=> $product->image,
                        'model'=> $product->model,
                        'quantity' => $quantity['items'],
                        'discounted_price' => $product->discounted_price,
                    ];
                }
            }

            // Pass the products array to the view
            return view('guest.tempCart', compact('products'));
        } else {
            $products=[] ;
            return view('guest.tempCart', compact('products'));
        }

    }



    public function del_cookie(Request $request, $id)
    {
        $productCookie = $request->cookie('products');

        if ($productCookie !== null) {
            $productArray = unserialize($productCookie);

            // Check if the product exists in the cookie array
            if (isset($productArray[$id])) {
                // Unset the product from the cookie array
                unset($productArray[$id]);

                // Serialize the updated product array
                $serializedProductArray = serialize($productArray);

                // Set the updated product array as a new cookie
                return redirect()->back()->cookie('products', $serializedProductArray)->with('success','Success Delete');
            }
        }


        return redirect()->back();
    }
    public function update_Quantity(Request $request) {
        $productId = $request->product_id;
        $increment = $request->increment;
        $productCookie = $request->cookie('products');

        if ($productCookie !== null) {
            $productArray = unserialize($productCookie);

            // Check if the product exists in the cookie array
            if (isset($productArray[$productId])) {
                $product = ProductModel::findOrFail($productId);
                $oldQuantity = $productArray[$productId]['items'];
                $newQuantity = $increment + $oldQuantity;

                // Update the quantity in the cookie
                $productArray[$productId]['items'] = $newQuantity;

                // Serialize the updated product array back into the cookie
                $updatedCookie = serialize($productArray);

                // Update the cookie with the new data
                return response()->json([
                    'success' => true,
                    'message' => 'Cart quantity updated successfully',
                    'times' => $newQuantity,
                    'price' => $product->discounted_price
                ])->withCookie(cookie('products', $updatedCookie));
            } else {
                // If the cart item is not found, return a JSON response indicating failure
                return response()->json([
                    'success' => false,
                    'message' => 'Cart item not found',
                ]);
            }
        } else {
            // Handle case where the product cookie is not found
            return response()->json([
                'success' => false,
                'message' => 'Product cookie not found',
            ]);
        }
    }

}

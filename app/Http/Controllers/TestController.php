<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountModel;
// use Symfony\Component\HttpFoundation\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use App\Models\ProductModel;
class TestController extends Controller
{
    public function req_test(Request $request)
    {
        dd($request->all());
        if ($request->price_after_coupan) {
            $offer = DiscountModel::where('coupon_code', $request->code)->first();
            $offerName = $offer->on_festival_name;
            $offerPrice = $offer->discount_percentage;
            $offerCode = $offer->coupon_code;
        } else {
            dd("not works");
        }
    }


    public function req_ip(Request $request ,$id)
    {

        $cookie_name = "products"; // Cookie name

        // Retrieve the existing cookie, if it exists
        $cookie_value = $request->cookie($cookie_name);

        // If the cookie exists, unserialize it to get the array data
        if ($cookie_value !== null) {
            $cookie_data = unserialize($cookie_value);
        } else {
            $cookie_data = [];
        }

        // Check if the product already exists in the cookie
        if (array_key_exists($id, $cookie_data)) {
            // If the product exists, increment its quantity
            $cookie_data[$id]['items']++;
        } else {
            // If the product doesn't exist, add it to the cookie with quantity 1
            $cookie_data[$id] = [
                'items' => 1,
            ];
        }

        // Set the expiration time for the cookie
        $minutes = 30 * 24 * 60; // 30 days expiration time

        // Serialize the updated array data and store it as a cookie
        Cookie::queue($cookie_name, serialize($cookie_data), $minutes);

        // Optionally, you can return a response indicating success
        return response()->json(['success' => true]);
    }

    public function cart_page(Request $req)
    {
        $cookies = $req->cookie();

        // Check if the 'Name' cookie exists
        if (isset($cookies['products'])) {
            // Unserialize the cookie value
            $cookie_data = unserialize($cookies['products']);

            foreach ($cookie_data as $key => $value) {
                $products[]=ProductModel::where('id',$key)->get();
                foreach ($value as $innerKey => $innerValue) {
                    echo "Inner Key: $innerKey, Inner Value: $innerValue <br>";
                }
            }
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\IPAddressModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use illuminate\Support\Facades\Log;
// use Symfony\Component\HttpFoundation\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class WithoutLoginCartController extends Controller
{
    public function add_to_cart(Request $request, $productId)
    {
        $currentTimestamp = Carbon::now();
        $valid = $currentTimestamp->addYears(100);

        $expirationMinutes = $currentTimestamp->diffInMinutes(Carbon::now());
        $response = new Response('Hello World');
        $cookie = Cookie::make('product_id', $productId, $expirationMinutes);
        $response->withCookie($cookie);


        return response()->json([
            'success' => true,
            'message' => $cookie->getName(),$cookie->getValue()

        ]);


        // try {
        //     $IP = $request->ip();

        //     $found = IPAddressModel::where('ip_address', $IP)->first();

        //     if ($found) {
        //         $cart = CartModel::where('ip_id', $found->id)
        //             ->Where('product_id', $productId)
        //             ->first(); // Use first() to retrieve a single result

        //         if ($cart) {
        //             // Cart exists, update its times
        //             $cart->times++;
        //             $cart->save();
        //         } else {
        //             // Cart doesn't exist, create a new one
        //             $success = CartModel::create([
        //                 'product_id' => $productId,
        //                 'times' => 1,
        //                 'type' => 'withoutlogin',
        //                 'ip_id' => $found->id, // Associate cart with IP
        //             ]);
        //         }
        //     } else {
        //         // IP not found, create a new cart and associate with IP
        //         $success = IPAddressModel::create([
        //             'ip_address' => $IP,
        //         ]);

        //         if ($success) {
        //             CartModel::create([
        //                 'product_id' => $productId,
        //                 'times' => 1,
        //                 'ip_id' => $success->id,
        //                 'type' => 'withoutlogin',
        //             ]);
        //         }
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Successfully Added to Cart',
        //     ]);
        // } catch (ModelNotFoundException $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Cart or product not found',
        //         'productID' => $productId,
        //         'error'=>$e->getMessage(),
        //     ]);
        // }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DiscountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class DiscountController extends Controller
{

    public function validateCoupon(Request $request)
    {
        try {
            $couponCode = $request->code;
            $discount = DiscountModel::where('coupon_code', $couponCode)->first();

            if ($discount) {
                if ($discount->status == 1) {
                    $discountPercentage = $discount->discount_percentage;
                    $discountedPrice = $request->finalPrice - ($request->finalPrice * ($discountPercentage / 100));

                    // Construct response data
                    $responseData = [
                        'success' => true,
                        'message' => 'Coupon applied successfully',
                        'discount_percentage' => $discountPercentage,
                        'discounted_price' => $discountedPrice
                    ];

                    return response()->json($responseData);
                } else {
                    return response()->json(['success' => false, 'message' => 'Coupon expired'], 404);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Coupon not valid'], 404);
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error in validateCoupon: ' . $e->getMessage());

            // Return a generic error response
            return response()->json(['success' => false, 'message' => 'An error occurred while validating the coupon'], 500);
        }
    }
}

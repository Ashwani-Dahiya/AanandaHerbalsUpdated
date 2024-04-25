<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountModel;
class TestController extends Controller
{
    public function req_test(Request $request)
    {
        dd($request->all());
        if($request->price_after_coupan){
            $offer=DiscountModel::where('coupon_code',$request->code)->first();
            $offerName=$offer->on_festival_name;
            $offerPrice=$offer->discount_percentage;
            $offerCode=$offer->coupon_code;

        }else{
            dd("not works");
        }
    }


public function req_ip(Request $request) {
   
    $userIP = $request->ip();
    dd($userIP) ;
}

}

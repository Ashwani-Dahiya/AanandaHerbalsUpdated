<?php

namespace App\Http\Controllers;

use App\Models\DiscountModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    public function offers_page()
    {
        $offers = DiscountModel::all();
        return view('admin.all_offers', compact('offers'));
    }
    public function add_offer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'on_festival_name' => 'required',
                'discount_percentage' => 'required',
                'coupon_code' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('add_error', 'Validation failed')->withErrors($validator)->withInput();
            }

            DiscountModel::create([
                'on_festival_name' => $request->on_festival_name,
                'discount_percentage' => $request->discount_percentage,
                'coupon_code' => $request->coupon_code,
                'status' => $request->status,
            ]);

            return redirect()->back()->with('add_success', 'Offer Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('add_error', 'Something went wrong');
        }
    }
    public function update_offer(Request $request, $id)

    {
        try {
            $validator = Validator::make($request->all(), [
                'on_festival_name' => 'required',
                'discount_percentage' => 'required',
                'coupon_code' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('add_error', 'Validation failed')->withErrors($validator)->withInput();
            }
            $offer = DiscountModel::find($id);
            $offer->update([
                'on_festival_name' => $request->on_festival_name,
                'discount_percentage' => $request->discount_percentage,
                'coupon_code' => $request->coupon_code,
                'status' => $request->status,
            ]);
            return redirect()->back()->with('update_success', 'Offer Updated Successfully');
        }
     catch (\Exception $e) {
        return redirect()->back()->with('update_error', 'Something went wrong');
    }

    }
}

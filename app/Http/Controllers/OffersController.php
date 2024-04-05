<?php

namespace App\Http\Controllers;

use App\Models\OffersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OffersController extends Controller
{
    public function offers_page()
    {
        $offers = OffersModel::all();
        return view('admin.all_offers', compact('offers'));
    }
    public function add_offer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'type' => 'required',
                'value' => 'required',
                'price' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('add_error', 'Validation failed')->withErrors($validator)->withInput();
            }

            OffersModel::create([
                'name' => $request->name,
                'type' => $request->type,
                'value' => $request->value,
                'price' => $request->price,
            ]);

            return redirect()->back()->with('add_success', 'Offer Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('add_error', 'Something went wrong');
        }
    }
    public function update_offer(Request $request, $id)

    {
        try {
            $offer = OffersModel::find($id);
            $offer->update([
                'name' => $request->name,
                'type' => $request->type,
                'value' =>  $request->value,
                'price' =>  $request->price,
            ]);
            return redirect()->back()->with('update_success', 'Offer Updated Successfully');
        }
     catch (\Exception $e) {
        return redirect()->back()->with('update_error', 'Something went wrong');
    }

    }
}

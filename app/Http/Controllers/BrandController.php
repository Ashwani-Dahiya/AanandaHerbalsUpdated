<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandModel;

class BrandController extends Controller
{
    public function all_brand_page()
    {
        $brands = BrandModel::orderBy("id", "desc")->get();
        return view("admin.all_brands", compact("brands"));
    }
    public function add_brand(Request $request)
    {

        try {
            $request->validate([
                'image' => 'required|file|mimes:jpeg,png,jpg,webp',
                "name" => "required",
                "seq" => "required",
                "discount" => "required",

            ]);


            $file = $request->file('image');


            $targetDirectory = 'uploads/Brands Images/';


            $fileName =  $file->getClientOriginalName();
            $file->move(public_path($targetDirectory), $file->getClientOriginalName());

            BrandModel::create([
                'logo' => $fileName,
                'name' => $request->name,
                'seq' => $request->seq,
                'discount' => $request->discount,

            ]);

            return redirect()->back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
    public function update_brand(Request $request, $id)
    {
        $request->validate([
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
            'name' => 'required',
            'seq' => 'required',
            'discount' => 'required',
        ]);

        $brand = BrandModel::find($id);

        if (!$brand) {
            return redirect()->back()->with('Update_error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            $oldImagePath = public_path('uploads/Brands Images/' . $brand->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload and save the new image
            $file = $request->file('new_image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Brands Images/';
            $file->move(public_path($targetDirectory), $fileName);
            $brand->logo = $fileName;
        }
        $brand->name = $request->name;
        $brand->seq = $request->seq;
        $brand->discount = $request->discount;
        $brand->save();



        return redirect()->back()->with('update_success', 'Record updated successfully.');
    }
}

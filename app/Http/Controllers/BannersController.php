<?php

namespace App\Http\Controllers;

use App\Models\HomeLastBannerModel;
use Illuminate\Http\Request;
use App\Models\HomeMainBannerModel;
use App\Models\HomeMiddleBannerModel;

class BannersController extends Controller
{
    public function main_banner()
    {
        $lists = HomeMainBannerModel::all();
        return view('admin.home_mainbanner', compact('lists'));
    }
    public function insert_main_banner(Request $request)
    {

        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
        ]);


        $file = $request->file('image');


        $targetDirectory = 'uploads/Main Bannner/';


        $targetPath = $targetDirectory . $file->getClientOriginalName();
        $fileName =  $file->getClientOriginalName();
        print_r($targetPath);

        $file->move(public_path($targetDirectory), $file->getClientOriginalName());

        HomeMainBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'paragraph' => $request->paragraph,
            'sub_title' => $request->sub_title,

        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function delete_main_banner($id)
    {
        $banner = HomeMainBannerModel::find($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }


    public function update_main_banner(Request $request, $id)
    {
        $request->validate([
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
        ]);


        $banner = HomeMainBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            $oldImagePath = public_path('uploads/Main Bannner/' . $banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload and save the new image
            $file = $request->file('new_image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Main Bannner/';
            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->sub_title = $request->sub_title;
        $banner->title = $request->title;
        $banner->paragraph = $request->paragraph;
        $banner->save();



        return redirect()->back()->with('success', 'Record updated successfully.');
    }
    public function middle_banner()
    {
        $lists = HomeMiddleBannerModel::all();
        return view('admin.home_middlebanner', compact('lists'));
    }

    public function insert_middle_banner(Request $request)
    {

        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
        ]);


        $file = $request->file('image');


        $targetDirectory = 'uploads/Middle Bannner/';

        $fileName =  $file->getClientOriginalName();

        $file->move(public_path($targetDirectory), $file->getClientOriginalName());

        HomeMiddleBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'discount' => $request->discount,

        ]);

        return redirect()->back()->with('success', 'Banner uploaded successfully.');
    }

    public function delete_middle_banner($id)
    {
        $banner = HomeMiddleBannerModel::find($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }
    public function update_middle_banner(Request $request, $id)

    {
        $request->validate([
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
        ]);

        $banner = HomeMiddleBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            $oldImagePath = public_path('uploads/Middle Bannner/' . $banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload and save the new image
            $file = $request->file('new_image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Middle Bannner/';
            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->sub_title = $request->sub_title;
        $banner->title = $request->title;
        $banner->discount = $request->discount;
        $banner->save();



        return redirect()->back()->with('success', 'Record updated successfully.');
    }
    public function last_banner()
    {
        $lists = HomeLastBannerModel::all();
        return view('admin.home_lastbanner', compact('lists'));
    }
    public function insert_last_banner(Request $request)
    {

        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,webp',
        ]);


        $file = $request->file('image');


        $targetDirectory = 'uploads/Last Bannner/';


        $targetPath = $targetDirectory . $file->getClientOriginalName();
        $fileName =  $file->getClientOriginalName();
        print_r($targetPath);

        $file->move(public_path($targetDirectory), $file->getClientOriginalName());

        HomeLastBannerModel::create([
            'image' => $fileName,
            'title' => $request->title,
            'discount' => $request->discount,

        ]);

        return redirect()->back()->with('success', 'Banner Added successfully.');
    }
    public function delete_last_banner($id)
    {
        $banner = HomeLastBannerModel::find($id);
        $banner->delete();
        return redirect()->back()->with('danger', 'Record deleted successfully.');
    }
    public function update_last_banner(Request $request, $id)
    {
        $request->validate([
            'discount' => 'required',
            'new_image' => 'file|mimes:jpeg,png,jpg,webp',
        ]);


        $banner = HomeLastBannerModel::find($id);

        if (!$banner) {
            return redirect()->back()->with('error', 'Record not found.');
        }

        if ($request->hasFile('new_image')) {
            $oldImagePath = public_path('uploads/Last Bannner/' . $banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Upload and save the new image
            $file = $request->file('new_image');
            $fileName = $file->getClientOriginalName();
            $targetDirectory = 'uploads/Last Bannner/';
            $file->move(public_path($targetDirectory), $fileName);
            $banner->image = $fileName;
        }
        $banner->discount = $request->discount;
        $banner->title = $request->title;
        $banner->save();



        return redirect()->back()->with('success', 'Record updated successfully.');
    }
}

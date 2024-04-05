<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\ProductModel;
use App\Models\SectionModel;
use App\Models\SectionProductsModel;

class SectionController extends Controller
{
    public function section_page()
    {
        $sections = SectionModel::all();
        return view('admin.all_section_pages', compact('sections'));
    }
    public function add_section(Request $request)
    {
        try {
            SectionModel::create([
                'name' => $request->name,
                'seq' => $request->seq,
            ]);
            return redirect()->back()->with('success', 'Section added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delete_section($id)
    {
        try {
            SectionModel::find($id)->delete();
            return redirect()->back()->with('del_success', 'Section deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('del_error', $e->getMessage());
        }
    }
    public function update_section(Request $request, $id)
    {
        $section = SectionModel::find($id);
        $section->update([
            'name' => $request->name,
            'seq' => $request->seq,
        ]);
        return redirect()->back()->with('update_success', 'Section updated successfully');
    }
    public function assign_product_page()
    {
        $productsData = ProductModel::all();
        $sections = SectionModel::all();
        $sectionProducts = SectionProductsModel::all();
        return view('admin.all_assign_to_section_pages', compact('productsData', 'sections','sectionProducts'));
    }
    public function assign_product(Request $request)
    {
        try {
            $section_id = $request->section_id;
            $car_ids = $request->input('car_id');
            if (is_array($car_ids) && count($car_ids) > 0) {
                foreach ($car_ids as $car_id) {
                    SectionProductsModel::create([
                        'section_id' => $section_id,
                        'product_id' => $car_id,
                        'seq' => $request->seq,
                    ]);
                }
                return redirect()->back()->with('success', 'Products assigned to section successfully');
            } else {
                return redirect()->back()->with('error', 'No cars selected to assign to section');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}

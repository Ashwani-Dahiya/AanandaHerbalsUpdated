<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $list = ProductModel::orderBy("id", "desc")->paginate(12);

        $search = $request['value'] ??= "";
        if ($search != "") {
            $list = ProductModel::where('name', "LIKE", "%$search%")->paginate(20);
        } else {
            $list = ProductModel::paginate('20');
        }
        return view("products", compact("list", "search"));
    }
    public function shop()
    {
        $list = ProductModel::orderBy("id", "desc")->paginate(9);
        $minPrice = 0;
        $maxPrice = 5000;
        return view("shop-left-sidebar", compact("list", "minPrice", "maxPrice"));
    }
    public function more($id)
    {
        $data = ProductModel::find($id);
        $numImages = 0;
        if (!empty($data->image)) $numImages++;
        if (!empty($data->image2)) $numImages++;
        if (!empty($data->image3)) $numImages++;
        if (!empty($data->image4)) $numImages++;
        if (!empty($data->image5)) $numImages++;

        // Pass $numImages to your view
        return view('product-detail')->with('numImages', $numImages)->with('data', $data);
    }

    public function all_products_page()
    {
        $lists = ProductModel::orderBy("id", "desc")->get();
        foreach ($lists as $list) {
            $cat_id = $list->category_id;
            $brand_id = $list->brand_id;
            $list->category = CategorieModel::where('id', $cat_id)->first();
            $list->brand = CategorieModel::where('id', $brand_id)->first();
        }
        return view("admin.my_products", compact("lists"));
    }
    public function add_products_page()
    {
        $categories = CategorieModel::orderBy("id", "desc")->get();
        $brands = CategorieModel::orderBy("id", "desc")->get();

        return view("admin.add_product", compact('categories', 'brands'));
    }
    public function add_products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'model' => 'required',
            'price' => 'required|number',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_image' => 'required|file|mimes:jpeg,png,jpg,webp',
            'product_image_2' => 'file|mimes:jpeg,png,jpg,webp',
            'product_image_3' => 'file|mimes:jpeg,png,jpg,webp',
            'product_image_4' => 'file|mimes:jpeg,png,jpg,webp',
            'product_image_5' => 'file|mimes:jpeg,png,jpg,webp',
            'color' => 'required',
            'about1' => 'required',
            'about2' => 'required',
            'year' => 'required|number',
            'warranty' => 'required|number',
            'discounted_price' => 'required|number',
            'sold_count' => 'required|number',
            'available_products' => 'required|number',
            'delivery_charges' => 'required|number'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $targetDirectory = 'uploads/Products Images/';

        // Handle product_image separately
        $productImage = $request->file('product_image');
        $productImageName = $productImage->getClientOriginalName();
        $productImage->move(public_path($targetDirectory), $productImageName);

        // Handle additional product images if provided
        $additionalImages = [];
        for ($i = 2; $i <= 5; $i++) {
            $fileInputName = 'product_image_' . $i;

            if ($request->hasFile($fileInputName)) {
                $additionalImage = $request->file($fileInputName);
                $additionalImageName = $additionalImage->getClientOriginalName();
                $additionalImage->move(public_path($targetDirectory), $additionalImageName);
                $additionalImages[] = $additionalImageName;
            }
        }

        // Create the product record
        $product = new ProductModel();
        $product->name = $request->product_name;
        $product->abbr = "notuhgm";
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->model = $request->model;
        $product->colors = $request->color;
        $product->image = $productImageName;
        $product->image2 = isset($additionalImages[0]) ? $additionalImages[0] : null;
        $product->image3 = isset($additionalImages[1]) ? $additionalImages[1] : null;
        $product->image4 = isset($additionalImages[2]) ? $additionalImages[2] : null;
        $product->image5 = isset($additionalImages[3]) ? $additionalImages[3] : null;
        $product->price = $request->price;
        $product->discounted_price = $request->discounted_price;
        $product->about1 = $request->about1;
        $product->about2 = $request->about2;
        $product->warranty = $request->warranty;
        $product->year = $request->year;
        $product->available_products = $request->available_products;
        $product->sold_count = $request->sold_count;
        $product->delivery_charges = $request->delivery_charges;
        $product->save();

        return redirect()->back()->with('success', 'Product Added successfully.');
    }


    public function delete_product($id)
    {
        ProductModel::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted successfully.');
    }
}

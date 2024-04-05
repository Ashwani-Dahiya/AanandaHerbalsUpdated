<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\BrandModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\CategorieModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;
use App\Models\SectionModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function filter_search(Request $request)
    {
        $price = $request->input("filter_price");
        $cleanedPriceRange = str_replace(['₹', ' '], '', $price);
        $priceArray = explode('-', $cleanedPriceRange);

        $minPrice = (int) $priceArray[0];
        $maxPrice = (int) $priceArray[1];

        $list = ProductModel::whereBetween('price', [$minPrice, $maxPrice])->paginate(9);

        if ($list->isEmpty()) {
            // Handle the case when no products are found
            echo 'No products found within the specified price range.';
        }

        // Products found within the specified price range
        return view('shop-left-sidebar', compact('list','minPrice','maxPrice') );




    }
}

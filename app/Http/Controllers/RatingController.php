<?php

namespace App\Http\Controllers;

use App\Models\RatingModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductModel;

class RatingController extends Controller
{
    public function rating_page(){
        $ratings = RatingModel::all();
        $ratingData = [];

        foreach ($ratings as $rating){
            $user_id = $rating->user_id;
            $product_id = $rating->product_id;
            $user = User::find($user_id);
            $product = ProductModel::find($product_id);

            $ratingData[] = [
                'rating' => $rating,
                'user' => $user,
                'product' => $product
            ];
        }
        return view('admin.product_ratings', compact('ratingData'));
    }
    public function delete_rating($id){
$rating = RatingModel::find($id);
$rating->delete();
return redirect()->back()->with('success','Rating Delete Succcess');
    }
}


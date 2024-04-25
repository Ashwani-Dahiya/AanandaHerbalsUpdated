<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\CityModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\StateModel;

class CheckoutController extends Controller
{
    public function page()
{
    $user = Auth::user();
    $states = StateModel::with('cities')->get();
    $lastAddress = AddressModel::where('user_id', $user->id)->orderBy('id', 'DESC')->first();
    if (!$lastAddress) {
        $lastAddress = NULL;
    }
    $cities = CityModel::all();
    $cityNames = []; // Array to store city names

    // Iterate through cities to get city names
    foreach ($cities as $city) {
        $cityNames[$city->id] = $city->city; // Store city name using city ID as key
    }

    $carts = $user->carts()->with('product')->get();
    $user = User::find(Auth::user()->id);

    return view("checkout", compact("user", "carts", "states", "lastAddress", "cityNames"));
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function main_page()
    {
        $user = User::find(Auth::user()->id);
        return view('user_view.user_dashboard', compact("user"));
    }
    public function your_orders()
    {
        $user = auth()->user();
        $orders=OrderModel::where('user_id', $user->id)->get();
if($orders){
    return view('user_view.user_orders', compact('orders'));

}else{
    $orders=NULL;
    return view('user_view.user_orders', compact('orders'));
    }
    }
    public function update_profile()
    {
        $states = StateModel::with('cities')->get();
        $record = User::find(Auth::user()->id);
        return view("user_view.user_update_profile", compact("states", "record"));
    }
    public function delete_page()
    {

        return view("user_view.user_delete_profile");
    }
    public function change_password_page()

    {
        $record = User::find(Auth::user()->id);
        return view("user_view.user_change_password", compact("record"));


    }
    public function getCities($stateId)
    {
        $cities = CityModel::where('state_id', $stateId)->get();
        return response()->json($cities);
    }
}

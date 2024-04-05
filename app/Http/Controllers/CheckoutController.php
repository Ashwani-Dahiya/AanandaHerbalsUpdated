<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\StateModel;
class CheckoutController extends Controller
{
   public function page(){
    $user = Auth::user();
    $states = StateModel::with('cities')->get();

        $carts = $user->carts()->with('product')->get();
    $user=User::find(Auth::user()->id);

    return view("checkout",compact("user","carts","states"));
   }
}

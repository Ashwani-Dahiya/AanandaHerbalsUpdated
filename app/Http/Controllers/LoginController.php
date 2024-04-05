<?php

namespace App\Http\Controllers;

use App\Models\SignUpModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
{
    $userData = SignUpModel::where("email", $request->email)->first();

    if ($userData) {
        $hashedPassword = $userData->password;

        if (Hash::check($request->password, $hashedPassword)) {
            return redirect()->route('home.page');
        } else {
            echo "Password does not match!";
            return redirect()->back()->with("alert", "Invailed Password!");
        }
    } else {
        return redirect()->back()->with("alert", "User not Found!");
    }
}


}

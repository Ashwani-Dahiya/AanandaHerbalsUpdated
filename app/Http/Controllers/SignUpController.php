<?php

namespace App\Http\Controllers;

use App\Models\SignUpModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function insert(Request $request)
    {
        try {
            $cpassword = $request->input("cpassword");
            $password = $request->input("password");

            if ($cpassword != $password) {
                return redirect()->back()->with("alert", "Password Does Not Match");
            } else {
                $hashedPassword = Hash::make($request->password);
                $data = $request->all();
            SignUpModel::create([
                "first_name" => $data["first_name"],
                "last_name" => $data["last_name"],
                "email" => $data["email"],
                "password"=> $hashedPassword,
                "phone_number" => $data["phone_number"],
                "address" => $data["address"],
                "country" => $data["country"],
                "state" => $data["state"],
                "city" => $data["city"],
                "post_code" => $data["post_code"]
            ]);
            return redirect()->route('login')->with('alert','Now Login');
            }


        } catch (\Exception $e) {
            return redirect()->back()->with("message", "An error occurred: " . $e->getMessage())->withInput();
        }
    }
}

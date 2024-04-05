<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\HomeMainBannerModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControler extends Controller
{
    public function login_page()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard'); // Redirect to the dashboard page if the user is already logged in
        } else {

            return view("admin.index");
        }
    }





    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Find the user by username
        $admin = AdminModel::where('username', $username)->first();

        if ($admin) {
            // Check the password
            if ($password === $admin->password) {
                // Passwords match, manually log in the user
                Auth::guard('admin')->login($admin);

                return redirect()->route('admin.dashboard');
            }
        }

        // Invalid credentials
        return redirect()->route('adm.login.page')->with('error', 'Invalid credentials');
    }


    public function index()
    {
        $delivered=OrderModel::where('order_status','delivered')->count();
        $pending=OrderModel::where('order_status', 'pending')->count();
        $cancelled=OrderModel::where('order_status', 'cancelled')->count();
        $products=ProductModel::all()->count();
        $accepted=OrderModel::where('order_status', 'accepted')->count();
        $shipped=OrderModel::where('order_status', 'shipped')->count();
        return view('admin.dashboard',compact('delivered','pending','cancelled','products','accepted','shipped'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('adm.login.page');
    }


    public function all_user()
    {
        $user = User::all();
        return view('admin.all_users', compact('user'));
    }
    public function redirect_page(){
        return redirect()->back();
    }

    
}

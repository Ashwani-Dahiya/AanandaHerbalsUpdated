<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterPageController extends Controller
{
    public function privacy_policy_page(){
        return view('privacy_policy');
    }
    public function terms_conditions_page(){
        return view('terms_conditions');
    }
    public function returns_refunds_page(){
        return view('returns_refunds');
    }
    public function shipping_policy_page(){
        return view('shipping_policy');
    }
}

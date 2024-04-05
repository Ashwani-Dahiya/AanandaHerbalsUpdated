@extends('layouts.app')



@section('content')
<style>
    body {
        background-color: #f9fafa
    }

    .padding {
        padding: 3rem !important
    }

    .user-card-full {
        overflow: hidden;
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px;
    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#7DB390), to(#7DB390));
        background: linear-gradient(to right, #7DB390, #7DB390);
    }

    .user-profile {
        padding: 20px 0;
    }

    .card-block {
        padding: 1.25rem;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    .img-radius {
        border-radius: 5px;
    }



    h6 {
        font-size: 14px;
    }

    .card .card-block p {
        line-height: 25px;
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px;
        }
    }

    .card-block {
        padding: 1.25rem;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .card .card-block p {
        line-height: 25px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .text-muted {
        color: #919aa3 !important;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
        font-weight: 600;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .user-card-full .social-link li {
        display: inline-block;
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .profile-button {
        background: rgb(125, 179, 144);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: rgb(74, 137, 96);
    }

    .profile-button:focus {
        background: rgb(125, 179, 144);
        box-shadow: none
    }

    .profile-button:active {
        background: rgb(125, 179, 144);
        box-shadow: none
    }
</style>
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Profile</h2>
                        <span> <a href="index.php">Home</a> - Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop -->
<section class="section-shop padding-tb-100">
    <div class="container">

        <div class="row mt-4">
            <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="col-sm-12 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25">
                            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                alt="User-Profile-Image">
                        </div>
                        <h6 class="f-w-600">Welcome
                            {{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}
                        </h6>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-12 mb-24">
                    <div class="row mb-minus-24 sticky">
                        <div class="col-lg-12 col-sm-6 col-6 cr-product-box mb-24">
                            <div class="cr-product-tabs">
                                <ul>
                                    <a href="{{ route('user.dashboard') }}">
                                        <li class="mt-2">Profile</li>
                                    </a>
                                    <a href="{{ route('user.orders') }}">
                                        <li class="mt-2">Your Orders</li>
                                    </a>
                                    <a href="{{ route('user.update.profile') }}">
                                        <li class="mt-2">Update Profile</li>
                                    </a>
                                    <a href="{{ route('change.password.page') }}">
                                        <li class="mt-2">Change Password</li>
                                    </a>
                                    <a href="{{ route('delete.account.page') }}">
                                        <li class="mt-2">Delete Account</li>
                                    </a>
                                    <a href="{{ route('logout') }}">
                                        <li class="mt-2">Logout</li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('user')
            @endsection

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
                        <span> <a href="{{ url('/') }}">Home</a> - Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register -->
<section class="section-register padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Update Your Profile</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container ">
                <div class="row">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-xl-12 col-md-12">
                                    <div class="card user-card-full col-xl-12 col-md-12">
                                        <div class="row m-l-0 m-r-0">
                                            <div class="col-sm-12 bg-c-lite-green user-profile">
                                                <div class="card-block text-center text-white">
                                                    <div class="m-b-25">
                                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png"
                                                            class="img-radius" alt="User-Profile-Image">
                                                    </div>
                                                    <h6 class="f-w-600">Welcome {{ $user->first_name }}
                                                        {{ $user->last_name }}</h6>

                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                @if (session('success'))
                                                <script>
                                                    window.onload = function() {
            window.alert("{{session('success')  }}");
        };
                                                </script>
                                                @endif <div class="card-block">
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                                    <div class="row">
                                                        <div class="col-sm-4 mt-2">
                                                            <p class="m-b-10 f-w-600">Name</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->first_name }}
                                                                {{ $user->last_name }}</h6>
                                                        </div>

                                                        <div class="col-sm-4 mt-2">
                                                            <p class="m-b-10 f-w-600">Email</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                                        </div>
                                                        <div class="col-sm-4 mt-2">
                                                            <p class="m-b-10 f-w-600">Phone</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->phone }}</h6>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Address</h6>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <p class="m-b-10 f-w-600">Address</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->address }}</h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p class="m-b-10 f-w-600">City</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->city }}</h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p class="m-b-10 f-w-600">State</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->state }}</h6>
                                                        </div>
                                                        <div class="col-sm-4 mt-4">
                                                            <p class="m-b-10 f-w-600">Country</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->country }}</h6>
                                                        </div>
                                                        <div class="col-sm-4 mt-4">
                                                            <p class="m-b-10 f-w-600">Post Code</p>
                                                            <h6 class="text-muted f-w-400">{{ $user->post_code }}</h6>
                                                        </div>
                                                    </div>

                                                    <div class="mt-5 text-center">
                                                        <a href="{{ route('profile.update') }}"><button
                                                                class="btn btn-success profile-button"
                                                                type="button">Edit</button>
                                                    </div></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>




@endsection

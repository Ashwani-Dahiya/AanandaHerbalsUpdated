@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Forgot Password</h2>
                        <span> <a href="{{ route('home') }}">Home</a> - Forgot Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif
<!-- Forgot page -->
<section class="section-login padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Forgot Password</h2>
                    </div>
                    <div class="cr-banner-sub-title">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="{{ asset('img/logo/newlogo.jpg') }}" alt="logo" width="100">
                    </div>
                    <form class="cr-content-form" action="{{ route('forget.password.post') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" placeholder="Enter Your Email" class="cr-form-control" name="email" required>
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="cr-button">Submit</button>
                            <a href="{{ route('register') }}" class="link">
                                Signup?
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

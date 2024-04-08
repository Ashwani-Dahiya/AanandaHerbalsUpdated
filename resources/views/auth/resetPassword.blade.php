@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Create New Password</h2>
                        <span> <a href="{{ route('home') }}">Home</a> - New Password</span>
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
                        <h2>Create New Password</h2>
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
                    <form class="cr-content-form" action="{{ route('new.password.post') }}" method="POST" >
                        @csrf
                        <input type="hidden" value="{{ $email ?? '' }}" name="email"> <!-- Use default value if $email is not set -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" placeholder="Enter Password" class="cr-form-control"
                                    name="password" required>
                            </div>
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" placeholder="Enter Password" class="cr-form-control"
                                    name="password_confirmation" required>
                            </div>
                            @if ($errors->has('password_confirmation'))
                            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="cr-button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

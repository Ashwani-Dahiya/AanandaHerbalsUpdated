@extends('layouts.app')
@section('content')

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>New Registration</h2>
                        <span> <a href="{{ url('/') }}">Home</a> - Register</span>
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
                        <h2>Register New User</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" width="100">
                    </div>

                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <form class="cr-content-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>First Name<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter Your First Name" class="cr-form-control"
                                        name="first_name" required>
                                </div>
                                @if ($errors->has('first_name'))
                                <p class="text-danger">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Enter Your Last Name" class="cr-form-control"
                                        name="last_name">
                                </div>
                                @if ($errors->has('last_name'))
                                <p class="text-danger">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email<span class="text-danger">*</span></label>
                                    <input type="email" placeholder="Enter Your email" class="cr-form-control"
                                        name="email" required>
                                </div>
                                @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number<span class="text-danger">*</span></label>
                                    <input type="tel" placeholder="Enter Your phone number" class="cr-form-control"
                                        name="phone_number" required>
                                </div>
                                @if ($errors->has('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-group">
                                    <label>Address<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Address" class="cr-form-control" name="address"
                                        required>
                                </div>
                                @if ($errors->has('address'))
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Country<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Country" class="cr-form-control" name="country"
                                        required>
                                </div>
                                @if ($errors->has('country'))
                                <p class="text-danger">{{ $errors->first('country') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Region State<span class="text-danger">*</span></label>
                                    <select class="cr-form-control" aria-label="Default select example" name="state" required>
                                        <option selected>Choose ...</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('state'))
                                    <p class="text-danger">{{ $errors->first('state') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>City<span class="text-danger">*</span></label>
                                    <select class="cr-form-control" aria-label="Default select example" name="city" required>
                                        <option selected>Choose ...</option>
                                    </select>
                                </div>
                                @if ($errors->has('city'))
                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Post Code<span class="text-danger">*</span></label>
                                    <input type="number" placeholder="Post Code" class="cr-form-control"
                                        name="post_code" required>
                                </div>
                                @if ($errors->has('post_code'))
                                <p class="text-danger">{{ $errors->first('post_code') }}</p>
                                @endif
                            </div> --}}
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
                            <div class="cr-register-buttons">
                                <button type="submit" class="cr-button">Signup</button>
                                <a href="{{ url('/login') }}" class="link">
                                    Have an account?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/get-cities/' + stateId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="' + value.city + '">' + value.city + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    });
</script> --}}

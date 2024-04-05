@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Login</h2>
                        <span> <a href="{{ url('/') }}">Home</a> - Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('success'))
<script>
    window.onload = function() {
            window.alert("{{session('success')  }}");
        };
</script>
@endif
<!-- Login -->
<section class="section-login padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Login</h2>
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
                        <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" width="100">
                    </div>

                    <form class="cr-content-form" id="loginForm" method="POST">
                        @csrf
                        <div style="text-align: center">
                            <small class="text-danger" id="error-message"></small>
                        </div>
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" placeholder="Enter Your Email" class="cr-form-control" name="email"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" placeholder="Enter Your password" class="cr-form-control"
                                name="password" required>
                        </div>
                        <div class="remember">
                            <span class="form-group custom">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </span>
                            <a class="link" href="{{ route('forgot.password.page') }}">Forgot Password?</a>
                        </div><br>
                        <div class="login-buttons">
                            <button type="submit" id="loginButton" class="cr-button">Login</button>
                            <a href="{{ url('/register') }}" class="link">
                                Signup?
                            </a>
                        </div>
                    </form>

                    <!-- Add this element for displaying the error message -->


                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $(document).ready(function () {
        $("#loginButton").on("click", function (event) {
            event.preventDefault();
            var formData = new FormData($("#loginForm")[0]);
            var $message = $("#error-message");

            $.ajax({
                type: "POST",
                url: "{{ route('login') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status) {
                        // Redirect to home page
                        window.location.href = "{{ route('login') }}";
                    } else {
                        // Display error message in the specified div
                        $message.text(response.msg || 'Invalid credentials. Please try again.');
                    }
                },
                error: function (error) {
                    // Handle other errors
                    if (error.status === 422) {
                        var errors = error.responseJSON.errors;
                        var errorMessage = '';

                        $.each(errors, function (key, value) {
                            errorMessage += value[0] + '<br>';
                        });

                        $message.html(errorMessage);
                    } else {
                        $message.text('Invalid credentials. Please try again.');
                    }
                }
            });
        });
    });
</script>





@endsection

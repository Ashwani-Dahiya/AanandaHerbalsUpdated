@extends('layouts.user_view')


@yield('content')

@section('user')
@if (session('error'))
<script>
    window.onload = function() {
            window.alert("{{session('error')  }}");
        };
</script>
@endif
<div class="col-lg-9 col-12 md-30 cr-product-box" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
    <div class="row col-100 mb-minus-24 ">
        <div class="col-sm-12 cr-product-card " style="padding-left: 40px">
            <h5 class="text-center">Delete Account</h5>
            <form class="cr-content-form" action="{{ route('delete.auth') }}"   method="POST">
                @method('POST')
                @csrf
                <div style="text-align: center">
                    <small class="text-danger" id="error-message"></small>
                </div>
                <div class="form-group">
                    <label>Email Address*</label>
                    <input type="email" placeholder="Enter Your Email" class="cr-form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label>Password*</label>
                    <input type="password" placeholder="Enter Your password" class="cr-form-control" name="password"
                        required>
                </div>

                <div class="login-buttons">
                    <button type="submit" class="cr-button">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection

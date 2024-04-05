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


{{-- @if (session('success'))
<script>
    window.onload = function() {
            window.alert("{{session('sucess') }}");
        };
</script>
@endif --}}
<div class="col-lg-9 col-12 md-30 cr-product-box" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
    <div class="row col-100 mb-minus-24 ">
        <div class="col-sm-12 cr-product-card " style="padding-left: 40px">
            <h5 class="text-center">Update Password</h5>
            <form class="cr-content-form" action="{{ route('change.password') }}" method="POST">
                @method('POST')
                @csrf
                <div style="text-align: center">
                    <small class="text-danger" id="error-message"></small>
                </div>
                <div class="form-group">
                    <label>Current Password*</label>
                    <input type="password" placeholder="Enter Your Current Password" class="cr-form-control"
                        name="currentPassword" required>
                        @if ($errors->has('currentPassword'))
                    <p class="text-danger">{{ $errors->first('currentPassword') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>New Password*</label>
                    <input type="password" placeholder="Enter Your New password" class="cr-form-control" name="password"
                        required>
                    @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Cofirm New Password*</label>
                    <input type="password" placeholder="Confirm password" class="cr-form-control"
                        name="password_confirmation" required>
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
</div>
</section>
@endsection

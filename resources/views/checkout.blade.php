@extends('layouts.app')
@section('content')
@if (session('success'))
<script>
    window.onload = function() {
        window.alert("{{session('success')  }}");
    };

</script>
@endif
@php
$totalPrice = 0;
$deliveryCharges=0;
$formattedValue=0;
@endphp
@foreach ($carts as $cart )
@php
$totalPrice += $cart->product->discounted_price *$cart->times;
$deliveryCharges=$cart->product->delivery_charges;
$formattedValue = number_format($deliveryCharges, 2);
@endphp
@endforeach
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Checkout</h2>
                        <span> <a href="index.php">Home</a> - Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout section -->
@if ($carts->isNotEmpty())
<section class="cr-checkout-section padding-tb-100">
    <div class="container">
        <form action="{{ route('add.to.orderItem') }}" method="POST">
            @csrf
            <div class="row">

                <!-- Sidebar Area Start -->
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Summary</h3>
                            </div>
                            <div class="cr-sb-block-content">

                                <div class="cr-checkout-pro">

                                    @foreach ($carts as $cart)
                                    <div class="col-sm-12 mb-6">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="#" class="image">
                                                        <img class="main-image" src="{{ asset('uploads/Products Images/'.$cart->product->image) }}" alt="Product">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content cr-product-details">
                                                <h5 class="cr-pro-title"><a href="#">{{ $cart->product->name }}</a></h5>
                                                <div class="cr-pro-rating">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </div>
                                                <p class="cr-price"><span class="new-price">₹{{
                                                    $cart->product->discounted_price }}</span><span class="text-danger">&nbsp;*&nbsp;</span><span class="new-price">{{ $cart->times }}</span>
                                                    {{-- <span class="old-price">₹{{ $cart->product->price }}</span> --}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach


                                    <div class="cr-checkout-summary">
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right">₹{{ $totalPrice }}</span>
                                        </div>
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right">₹{{ $formattedValue }}</span>
                                        </div>
                                        <div class="cr-checkout-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">₹{{ $totalPrice + $formattedValue }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-del-wrap">
                        <!-- Sidebar Summary Block -->

                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay">
                                    <div class="cr-pay-desc">Please select the preferred payment method to use on this
                                        order.</div>

                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay1" name="radio-group" checked>
                                            <label for="pay1">Cash On Delivery</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay2" name="radio-group">
                                            <label for="pay2">UPI</label>
                                        </span>
                                    </span>
                                    <span class="cr-pay-option">
                                        <span>
                                            <input type="radio" id="pay3" name="radio-group">
                                            <label for="pay3">Bank Transfer</label>
                                        </span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-check-pay-img-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-check-pay-img-inner">
                                    <div class="cr-check-pay-img">
                                        <img src="{{asset('/img/banner/payment.png')}}" alt="payment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">
                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Fill Delivery Details</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-bill-form mb-minus-24">

                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>First Name*</label>
                                                <input type="text" value="{{ $user->first_name }}" name="first_name">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Last Name*</label>
                                                <input type="text" value="{{ $user->last_name }}" name="last_name">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Email*</label>
                                                <input type="text" value="{{ $user->email }}" name="email">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Mobile Number*</label>
                                                <input type="text" value="{{ $user->phone }}" name="phone">
                                            </span>
                                            <span class="cr-bill-wrap">
                                                <label>Address</label>
                                                <input type="text" name="address" name="address">
                                            </span>
                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Country *</label>
                                                <input type="text" value="India" readonly>
                                            </span>

                                            <span class="cr-bill-wrap cr-bill-half ">
                                                <label>State</label>
                                                <select class="form-control" name="state" required>
                                                    <option selected>Choose ...</option>
                                                    @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('state'))
                                                <p class="text-danger">{{ $errors->first('state') }}</p>
                                                @endif
                                            </span>

                                            <span class="cr-bill-wrap cr-bill-half ">
                                                <label>City *</label>
                                                <select class="form-control" aria-label="Default select example" name="city" required>
                                                    <option selected>Choose ...</option>
                                                </select>
                                                @if ($errors->has('city'))
                                                <p class="text-danger">{{ $errors->first('city') }}</p>
                                                @endif
                                            </span>

                                            <span class="cr-bill-wrap cr-bill-half">
                                                <label>Area Pin Code</label>
                                                <input type="number" class="form-control" name="post_code" style="height: 37px">
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                            $finalPrice=$totalPrice + $formattedValue ;
                            @endphp

                            @foreach ($carts as $cart)
                            <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
                            <input type="hidden" name="product_id[]" value="{{ $cart->product_id }}">
                            <input type="hidden" name="total_price" value="{{ $finalPrice }}">

                            <!-- Add more hidden input fields for other data you want to send -->
                            @endforeach
                            <span class="cr-check-order-btn">
                                <button type="submit" class="cr-button mt-30">Place Order</button>
                            </span>

                        </div>
                    </div>
                    <!--cart content End -->
                </div>

            </div>
        </form>
    </div>
</section>
<!-- Checkout section End -->
@else
<h5 class="m-4 p-4">No items in the cart.</h5>
@endif
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('select[name="state"]').on('change', function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/get-cities/' + stateId
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
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

</script>

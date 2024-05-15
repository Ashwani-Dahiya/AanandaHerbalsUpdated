@extends('layouts.app')
@section('content')
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@php
$totalPrice=0;
@endphp
@if(session('success'))
<div class="cr-wish-notify" id="wishNotification">
    <p class="wish-note">Product Deleted Successfully!</p>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#wishNotification").fadeOut(300);
        }, 2000);
    });

</script>
@endif
<!-- cart + summary -->

<section class="bg-light my-5 p-4">
    <div class="container">
        @isset($carts)
        @if($carts->isNotEmpty())
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                <div class="card border shadow-0">
                    <div class="m-4">
                        <h4 class="card-title mb-4">Your shopping cart</h4>
                        @foreach ($carts as $cart)
                        @if($cart->product)
                        <div class="row gy-3 mb-4">
                            <div class="col-lg-5">
                                <div class="me-lg-5">
                                    <div class="d-flex">
                                        <a href="{{ route('more.detail',['id'=>$cart->product->id]) }}"><img
                                                src="{{ asset('uploads/Products Images/'.$cart->product->image) }}"
                                                class="border rounded me-3" style="width: 96px; height: 96px;" /></a>
                                        <div class="">
                                            <a href="{{ route('more.detail',['id'=>$cart->product->id]) }}"
                                                class="nav-link">{{ $cart->product->name }}</a>
                                            <p class="text-muted">{{ $cart->product->model }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                <div class="" style="margin-right: 20px">
                                    <div class="cart-qty-plus-minus">
                                        <!-- Minus Button -->
                                        <button type="button" class="newminus" data-cart-id="{{ $cart->id }}"
                                            data-product-id="{{ $cart->product->id }}">-</button>

                                        <!-- Input Field to Display Quantity -->
                                        <input type="text" id="quantity_{{ $cart->id }}" value="{{ $cart->times }}" readonly>

                                        <!-- Plus Button -->
                                        <button type="button" class="newplus" data-cart-id="{{ $cart->id }}"
                                            data-product-id="{{ $cart->product->id }}">+</button>
                                    </div>
                                </div>

                                <div class="">
                                    <text class="h6 cr-cart-subtotal" id="subtotal_{{ $cart->id }}">₹{{ $cart->times * $cart->product->discounted_price }}</text>
                                    <br />
                                    <small class="text-muted text-nowrap">
                                        ₹{{ $cart->product->discounted_price }} / per
                                        item </small>
                                </div>
                            </div>
                            <div class=" col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start
                                        justify-content-lg-center justify-content-xl-end mb-2">
                                <div class="float-md-end">
                                    <a href="{{ route('delete.card.item', ['id' => $cart->id]) }}"
                                        class="btn btn-light border text-danger icon-hover-danger">  <i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                        </div>
                        @php
                        $totalPrice += $cart->times * $cart->product->discounted_price;
                        @endphp
                        @else
                        <td colspan="7">Product not found</td>
                        @endif
                        @endforeach

                    </div>

                </div>
            </div>
            <!-- cart -->
            <!-- summary -->
            <div class="col-lg-3">
                <div class="card shadow-0 border">
                    <div class="card-body">


                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2 fw-bold cr-cart-total" id="hideen">₹ {{ $totalPrice }}</p>
                            <p class="mb-2 fw-bold cr-cart-total d-none" id="finalprice">₹ {{ $totalPrice }}</p>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('checkout.page') }}" class="btn btn-success w-100 shadow-0 mb-2"> Make
                                Purchase </a>
                            <a href="{{ route('home') }}" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- summary -->
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <p>No items in the cart</p>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- cart + summary -->

<!-- Recommended -->
<div id="cart-url" data-url="{{ url('/cart') }}"></div>
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Recommended Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Discover the Natural Essence in Each Item</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
            <div class="col-xl-12 col-lg-12 col-12 mb-24">
                <div class="row mb-minus-24">
                    @foreach ($recommendedProducts as $items)
                    <div class="mix vegetable col-xxl-3 col-xl-3 col-4 cr-product-box mb-15">
                        <a href="{{ route('more.detail', ['id' => $items->id]) }}">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('uploads/Products Images/' . $items->image) }}"
                                            alt="product-1" height="220">
                                    </div>
                                </div>
                                <div class="cr-product-details">
                                    <a href="{{ route('more.detail', ['id' => $items->id]) }}" class="title">{{
                                        Illuminate\Support\Str::limit($items->name, 30) }}</a>
                                    <p class="cr-price"><span class="new-price">₹{{ $items->discounted_price }}</span>
                                        <span class="old-price">₹{{ $items->price }}</span>
                                    </p>
                                </div>
                        </a>
                        @if (Auth::user())
                        <div
                            class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                            <a class="cr-button col-md-8 addToCartBtn" data-id="{{ $items->id }}"
                                style="font-size: 10px">
                                Add Cart
                            </a>

                        </div>
                        </a>
                        @else
                        <div
                            class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                            <a class="cr-button col-md-5 addToCartBtnWithoutLogin" style="font-size: 10px"
                                data-id="{{ $items->id }}">
                                Add cart
                            </a>

                        </div>

                        @endif

                    </div>
                </div>
                @endforeach
                {{-- {{ $item->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <h6 class="display-6">No items in the cart</h6>
            <div class="cr-cart-update-bottom d-flex justify-content-end">
                <a href="{{ route('home') }}" class="cr-links">Continue Shopping</a>
            </div>
        </div>
    </div>
    @endisset
    </div>
</section>

<script>
    $(document).ready(function() {
        $(".newplus, .newminus").click(function() {
            var element = $(this);
            var cartId = $(this).data("cart-id");
            var productId = $(this).data("product-id");
            var increment = $(this).hasClass("newplus") ? 1 : -1;

            // Add CSRF token to headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // AJAX request
            $.ajax({
                url: "{{ route('cart.update.quantity') }}"
                , type: 'put'
                , dataType: 'json'
                , data: {
                    cart_id: productId
                    , product_id: productId
                    , increment: increment
                , }
                , success: function(response) {
                    // Handle successful response
                    console.log(response);

                    // Check if the update was successful
                    if (response.success) {
                        var times = response.times;
                        var price = response.price;

                        // Update quantity input using ID
                        $('#quantity_' + cartId).val(times);

                        // Update subtotal using ID
                        $('#subtotal_' + cartId).text("₹" + (times * price));

                        // Update total price dynamically
                        updateTotalPrice();
                    } else {
                        console.error("Update quantity failed:", response.message);
                    }
                }
                , error: function(xhr, status, error) {
                    // Handle errors
                    console.error("AJAX error:", xhr.responseText);
                }
            });
        });

        // Function to update total price dynamically
        function updateTotalPrice() {
            var totalPrice = 0;
            $('.cr-cart-subtotal').each(function() {
                var subtotalValue = parseFloat($(this).text().replace('₹', ''));
                totalPrice += subtotalValue;
            });

            // Update final price element
            $('#finalprice').text( "₹ " +totalPrice);

            // Hide the 'hideen' element
            $('#hideen').css('display', 'none');
            $('#finalprice').removeClass('d-none').css('display', 'inline-block');
        }
    });

</script>
@endsection

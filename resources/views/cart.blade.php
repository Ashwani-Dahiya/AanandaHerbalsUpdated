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
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title mt-2">
                        {{-- <h2>Cart</h2> --}}
                        <span><a href="{{ route('home') }}">Home</a> / Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<!-- Cart -->
<section class="section-cart padding-t-100 mb-5">
    <div class="container">
        @isset($carts)
        @if($carts->isNotEmpty())
        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content">
                    <div class="cr-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product company</th>
                                    <th>Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                <tr>
                                    @if($cart->product)
                                    <td class="cr-cart-name">
                                        <a href="{{ route('more.detail',['id'=>$cart->product->id]) }}">
                                            <img src="{{ asset('uploads/Products Images/'.$cart->product->image) }}"
                                                alt="product-1" class="cr-cart-img">
                                        </a>
                                    </td>
                                    <td class="cr-cart-name">{{ $cart->product->name }}</td>
                                    <td class="cr-cart-price"><span>{{ $cart->product->model }}</span></td>
                                    <td class="cr-cart-price"><span class="amount">₹{{ $cart->product->discounted_price
                                            }}</span></td>
                                    <td class="cr-cart-qty">
                                        <div class="cart-qty-plus-minus">
                                            <button type="button" class="newminus" data-cart-id="{{ $cart->id }}"
                                                data-product-id="{{ $cart->product->id }}">-</button>
                                            <input type="text" id="quantity_{{ $cart->id }}" value="{{ $cart->times }}"
                                                readonly>
                                            <button type="button" class="newplus" data-cart-id="{{ $cart->id }}"
                                                data-product-id="{{ $cart->product->id }}">+</button>
                                        </div>
                                    </td>
                                    <td class="cr-cart-subtotal" id="subtotal_{{ $cart->id }}">₹{{ $cart->times *
                                        $cart->product->discounted_price }}</td>
                                    <td class="cr-cart-remove">
                                        <a href="{{ route('delete.card.item', ['id' => $cart->id]) }}">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </td>
                                    @php
                                    $totalPrice += $cart->times * $cart->product->discounted_price;
                                    @endphp
                                    @else
                                    <td colspan="7">Product not found</td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cr-cart-update-bottom">
                                <a href="{{ route('home') }}" class="cr-links">Continue Shopping</a>

                                <h6 class="cr-cart-total" id="hideen">Final Price: ₹ {{ $totalPrice }}</h6>
                                <h6 class="cr-cart-total d-none" id="finalprice"></h6>
                                <a href="{{ route('checkout.page') }}" class="cr-button" id="checkoutBtn">Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<!-- Popular product -->
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
                    <div class="mix vegetable col-xxl-3 col-xl-3 col-6 cr-product-box mb-15">
                        <a href="{{ route('more.detail', ['id' => $items->id]) }}">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('uploads/Products Images/' . $items->image) }}"
                                            alt="product-1" height="220">
                                    </div>


                                </div>
                                <div class="cr-product-details">
                                    {{-- <div class="cr-brand">
                                        <a href="{{ url('/shop') }}">{{ $items->model }}
                                            <div class="cr-star">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-line"></i>
                                                <p>(4.5)</p>
                                            </div>

                                    </div> --}}
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
                            <a class="cr-button col-md-5 addToCartBtn" data-id="{{ $items->id }}"
                                style="font-size: 10px">
                                Add Cart
                            </a>
                            <a href="{{ route('buy.now', ['id' => $items->id]) }}" class="cr-button col-md-5"
                                style="font-size: 10px">
                                Buy now
                            </a>
                        </div>
                        </a>
                        @else
                        <div
                            class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                            <a href="{{ url('/login') }}" class="cr-button col-md-5" style="font-size: 10px">
                                Add cart
                            </a>
                            <a href="{{ url('/login') }}" class="cr-button col-md-5" style="font-size: 10px">
                                Buy now
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
                    cart_id: cartId
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
            $('#finalprice').text("Final Price: ₹" + totalPrice);

            // Hide the 'hideen' element
            $('#hideen').css('display', 'none');
            $('#finalprice').removeClass('d-none').css('display', 'inline-block');
        }
    });

</script>

@endsection

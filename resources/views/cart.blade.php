@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Cart</h2>
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
                                        <a href="javascript:void(0)">
                                            <img src="{{ asset('uploads/Products Images/'.$cart->product->image) }}" alt="product-1" class="cr-cart-img">
                                        </a>
                                    </td>
                                    <td class="cr-cart-name">{{ $cart->product->name }}</td>
                                    <td class="cr-cart-price"><span>{{ $cart->product->model }}</span></td>
                                    <td class="cr-cart-price"><span class="amount">₹{{ $cart->product->discounted_price }}</span></td>
                                    <td class="cr-cart-qty">
                                        <div class="cart-qty-plus-minus">
                                            <button type="button" class="newminus" data-cart-id="{{ $cart->id }}" data-product-id="{{ $cart->product->id }}">-</button>
                                            <input type="text" id="quantity_{{ $cart->id }}" value="{{ $cart->times }}" readonly>
                                            <button type="button" class="newplus" data-cart-id="{{ $cart->id }}" data-product-id="{{ $cart->product->id }}">+</button>
                                        </div>
                                    </td>
                                    <td class="cr-cart-subtotal" id="subtotal_{{ $cart->id }}">₹{{ $cart->times * $cart->product->price }}</td>
                                    <td class="cr-cart-remove">
                                        <a href="{{ route('delete.card.item', ['id' => $cart->id]) }}">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </td>
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
                url: "{{ route('cart.update.quantity') }}",
                type: 'put',
                dataType: 'json',
                data: {
                    cart_id: cartId,
                    product_id: productId,
                    increment: increment,
                },
                success: function(response) {
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
                    } else {
                        console.error("Update quantity failed:", response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error("AJAX error:", xhr.responseText);
                }
            });
        });
    });
    </script>
@endsection

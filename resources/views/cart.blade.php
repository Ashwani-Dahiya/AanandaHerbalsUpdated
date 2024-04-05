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
                    <button type="button" class="minus" data-id="{{ $cart->id }}">-</button>
                    <input type="text" data-id="{{ $cart->product->id }}" class="quantity" value="{{ $cart->times }}" readonly name="times[]">
                    <button type="button" class="plus" data-id="{{ $cart->id }}">+</button>
                </div>
            </td>
            <td class="cr-cart-subtotal">₹{{ $cart->product->discounted_price * $cart->times }}</td>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".plus").click(function() {
            var row = $(this).closest("tr");
            var price = parseFloat(row.find(".cr-cart-price .amount").text().replace("₹", ""));
            var quantityInput = row.find(".quantity");
            var quantity = parseInt(quantityInput.val()) + 1;

            $.ajax({
                url: "/cart/update_quantity"
                , method: "POST"
                , data: {
                    _token: "{{ csrf_token() }}"
                    , cart_id: $(this).data("id")
                    , quantity: quantity
                }
                , success: function(response) {
                    if (response.success) {
                        quantityInput.val(quantity);
                        updateSubtotal(row, price, quantity);
                        updateTotalPrice();
                    } else {
                        alert("Failed to update quantity.");
                    }
                }
                , error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $(".minus").click(function() {
            var row = $(this).closest("tr");
            var price = parseFloat(row.find(".cr-cart-price .amount").text().replace("₹", ""));
            var quantityInput = row.find(".quantity");
            var quantity = parseInt(quantityInput.val());
            if (quantity > 1) {
                quantityInput.val(quantity - 1);
                updateSubtotal(row, price, quantity - 1);
                updateTotalPrice();
            }
        });

        // Function to update subtotal for a row
        function updateSubtotal(row, price, quantity) {
            var subtotal = price * quantity;
            row.find(".cr-cart-subtotal").text("₹" + subtotal.toFixed(0));
        }

        // Function to update total price
        function updateTotalPrice() {
            var total = 0;
            $(".cr-cart-subtotal").each(function() {
                var subtotal = parseFloat($(this).text().replace("₹", ""));
                total += subtotal;
            });
            $("#total_price").text("₹" + total.toFixed(0));
        }
    });

</script>
@endsection

@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Product List</h2>
                        <span> <a href="{{ url('/') }}">Home</a> - product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (session('success'))
    <div class="cr-wish-notify" id="wishNotification">
        <p class="wish-note">Add product in <a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $("#wishNotification").fadeOut(300);
            }, 2000);
        });
    </script>
@endif
<!-- Product Default Style -->
<section class="section-products padding-t-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Welcome</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>All Products are Available Here !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
            @foreach ($list as $newlist )
            <div class="col-lg-3 col-4 cr-product-box mb-24">
                <div class="cr-product-card">
                    <a href="{{ route('more.detail', ['id' => $newlist->id]) }}">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="{{ asset('uploads/Products Images/'.$newlist->image) }}" alt="product-1" height="260">
                        </div>
                    </div>
                </a>
                    <div class="cr-product-details">

                        <a href="{{ route('more.detail', ['id' => $newlist->id]) }}" class="title">{{
                            Illuminate\Support\Str::limit($newlist->name, 30) }}</a>
                        <p class="cr-price"><span class="new-price">₹{{ $newlist->discounted_price}}</span> <span class="old-price">₹{{$newlist->price  }}</span></p>
                    </div>
                    @if (Auth::user())
                    <div class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                        <a href="#" class="cr-button col-md-5 addToCartBtn" data-id="{{ $newlist->id }}" style="font-size: 10px">
                            Add Cart
                        </a>
                        <a href="{{ route('buy.now', ['id' => $newlist->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
                            Buy now
                        </a>
                    </div>
                    @else
                    <div class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
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
            <div class="container mb-24">

                {{ $list->links('pagination::bootstrap-5') }}

            </div>
        </div>
    </div>

</section>



@endsection

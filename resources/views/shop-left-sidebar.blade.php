@extends('layouts.app')

@section('content')

@if (session('success'))
<div class="cr-wish-notify" id="wishNotification">
    <p class="wish-note">Add product in <a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
</div>

>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#wishNotification").fadeOut(300);
        }, 2000);
    });

</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var slider = document.getElementById('slider-range');
        var minPrice = parseFloat('<?php echo $minPrice; ?>');
        var maxPrice = parseFloat('<?php echo $maxPrice; ?>');
        var amountField = document.getElementById('amount');

        // Create the slider
        noUiSlider.create(slider, {
            start: [minPrice, maxPrice]
            , connect: true
            , range: {
                'min': minPrice
                , 'max': maxPrice
            }
            , format: {
                to: function(value) {
                    return '₹' + value.toFixed(0);
                }
                , from: function(value) {
                    return Number(value.replace('₹', ''));
                }
            }
        });

        // Update the input field with selected range
        slider.noUiSlider.on('update', function(values, handle) {
            amountField.value = values.join(' - ');
        });
    });

</script>



<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Shop</h2>
                        <span> <a href="index.php">Home</a> - Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop -->
<section class="section-shop padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Categories</h2>
                    </div>
                    <div class="cr-banner-sub-title">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="cr-shop-sideview">
                    {{-- <div class="cr-shop-categories">
                        <h4 class="cr-shop-sub-title">Category</h4>
                        <div class="cr-checkbox">
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks">
                                <label for="drinks">Juice & Drinks</label>
                                <span>[20]</span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks1">
                                <label for="drinks1">Dairy & Milk</label>
                                <span>[54]</span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="drinks2">
                                <label for="drinks2">Snack & Spice</label>
                                <span>[64]</span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="cr-shop-price">
                        <h4 class="cr-shop-sub-title">By Price</h4>
                        <div class="price-range-slider">
                            <div id="slider-range" class="range-bar"></div>
                            <form action="{{ route('filter.by.price') }}" method="POST">
                                @csrf
                                @method('POST')
                                <p class="range-value">
                                    <label>Price :</label>

                                    <input type="text" id="amount" placeholder="" name="filter_price">

                                </p>
                                <div class="d-flex  justify-content-between">
                                    <button type="submit" class="cr-button">Filter</button>
                                    <a href="{{ url('/shop') }}">
                                        <p class="cr-button">Clear</p>
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                    {{-- <div class="cr-shop-color">
                        <h4 class="cr-shop-sub-title">Colors</h4>
                        <div class="cr-checkbox">
                            <div class="checkbox-group">
                                <input type="checkbox" id="blue">
                                <label for="blue">Blue</label>
                                <span class="blue"></span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="yellow">
                                <label for="yellow">Yellow</label>
                                <span class="yellow"></span>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="red">
                                <label for="red">Red</label>
                                <span class="red"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="cr-shop-weight">
                        <h4 class="cr-shop-sub-title">Weight</h4>
                        <div class="cr-checkbox">
                            <div class="checkbox-group">
                                <input type="checkbox" id="2kg">
                                <label for="2kg">2kg Pack</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="20kg">
                                <label for="20kg">20kg Pack</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" id="30kg">
                                <label for="30kg">30kg pack</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="row">
                    <div class="col-12">
                        <div class="cr-shop-bredekamp">

                            <div class="center-content">
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($list as $newlist)
                                @php
                                $i++;
                                @endphp
                                @endforeach
                                <span>We found {{ $i }} items for you!</span>
                            </div>
                            <div class="cr-select">
                                <label>Sort By :</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Featured</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-100 mb-minus-24">
                    @foreach ($list as $newlist)

                    <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <a href="{{ route('more.detail', ['id' => $newlist->id]) }}">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('uploads/Products Images/'.$newlist->image) }}" alt="product-1" height="200">
                                    </div>

                                </div>
                            </a>
                            <div class="cr-product-details">

                                <a href="{{ route('more.detail', ['id' => $newlist->id]) }}" class="title">{{
                                    Illuminate\Support\Str::limit($newlist->name, 30) }}</a>
                                <p class="text">{{
                                    Illuminate\Support\Str::limit($newlist->name, 30) }}</p>
                                <ul class="list">
                                    <li><label>Model :</label>{{ $newlist->model }}</li>
                                    <li><label>Color :</label>{{ $newlist->colors }}</li>
                                    <li><label>Warranty :</label>{{ $newlist->warranty }}</li>
                                    <li><label>Available Stock :</label>{{ $newlist->available_products }}</li>
                                </ul>
                                <p class="cr-price"><span class="new-price">₹{{ $newlist->discounted_price }}</span> <span class="old-price">₹{{ $newlist->price }}</span></p>
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
                                    <a href="#" class="cr-button col-md-5 addToCartBtnWithoutLogin" style="font-size: 10px" data-id="{{ $newlist->id }}">
                                        Add cart
                                    </a>
                                    <a href="{{ url('/login') }}" class="cr-button col-md-5" style="font-size: 10px">
                                        Buy now
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mb-24">
    {{ $list->links('pagination::bootstrap-5') }}
</div>

@endsection

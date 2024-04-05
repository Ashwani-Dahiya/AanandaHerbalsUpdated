@extends('layouts.app')
@section('content')
<!-- Hero slider -->
<section class="section-hero padding-b-100 next">
    <div class="cr-slider swiper-container">
        <div class="swiper-wrapper">
            @foreach ($banner as $banners)
            <div class="swiper-slide">
                <div class="cr-hero-banner " style="
                width: 100%;
                background-image: url('{{ asset('uploads/Main Bannner/' . $banners->image) }}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cr-left-side-contain slider-animation">
                                    <h5><span>100%</span> {{ $banners->title }}</h5>
                                    <h1>{{ $banners->sub_title }}</h1>
                                    <p class="text-dark">{{ $banners->paragraph }}</p>
                                    <div class="cr-last-buttons">
                                        <a href="{{ url('/shop') }}" class="cr-button">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

@if (session('success'))
<div class="cr-wish-notify" id="wishNotification">
    <p class="wish-note">Add product in <a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
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


<!-- Popular product -->
<div id="cart-url" data-url="{{ url('/cart') }}"></div>
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Explore our Essence of Nature in Every Product</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
            <div class="col-xl-12 col-lg-12 col-12 mb-24">
                <div class="row mb-minus-24">
                    @foreach ($item as $items)
                    <div class="mix vegetable col-xxl-3 col-xl-3 col-6 cr-product-box mb-15">
                        <a href="{{ route('more.detail', ['id' => $items->id]) }}">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="{{ asset('uploads/Products Images/' . $items->image) }}" alt="product-1" height="250">
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
                                <a href="{{ route('more.detail', ['id' => $items->id]) }}" class="title">{{ Illuminate\Support\Str::limit($items->name, 30) }}</a>
                                <p class="cr-price"><span class="new-price">₹{{ $items->discounted_price }}</span>
                                    <span class="old-price">₹{{ $items->price }}</span>
                                </p>

                            </div>
                        </a>
                        @if (Auth::user())
                            <div class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                                <a href="{{ route('add.cart', ['id' => $items->id]) }}" product_id='{{ $items->id }}' class="cr-button col-md-5 add_to_card" style="font-size: 10px">
                                    Add cart
                                </a>
                                <a href="{{ route('buy.now', ['id' => $items->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
                                    Buy now
                                </a>
                            </div>
                        </a>
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
                {{-- {{ $item->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>
    </div>
</section>




<!-- Popular product -->
@foreach ($sections as $currentSection)
<section class="section-popular-product-shape padding-b-100" style="background-color: {{ $loop->iteration % 2 == 0 ? 'white' : '#f5f5f5' }}">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    @if (is_object($currentSection))
                    <div class="cr-banner mt-4">
                        <h2>{{ $currentSection->name }}</h2>
                    </div>
                    <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
                        @foreach ($currentSection->products->slice(0, 4) as $product)
                        <div class="mix vegetable col-xxl-3 col-xl-3 col-6 cr-product-box mb-15">
                            <div class="cr-product-card">
                                <a href="{{ route('more.detail', ['id' => $product->id]) }}">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('uploads/Products Images/' . $product->image) }}" alt="product-1" height="250">
                                        </div>
                                    </div>
                                </a>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="{{ url('/shop') }}">{{ $product->model }}</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('more.detail', ['id' => $product->id]) }}" class="title">{{ Illuminate\Support\Str::limit($product->name, 30) }}</a>
                                    <p class="cr-price"><span class="new-price">₹{{ $product->discounted_price }}</span>
                                        <span class="old-price">₹{{ $product->price }}</span>
                                    </p>
                                </div>
                                @if (Auth::user())
                                <div class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                                    <a href="{{ route('add.cart', ['id' => $product->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
                                        Add cart
                                    </a>
                                    <a href="{{ route('buy.now', ['id' => $product->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
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
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<script>
    $(".add_to_cart").click(function(e){
        e.preventDefault();
      product_id= $(this).attr("product_id");
      link= $(this).attr("href");
$.post(/,  )

    });
</script>






<!-- Product banner -->
<section class="section-product-banner padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-banner-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($newbrand as $b)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000" style="background-color: red">
                            <div class="cr-product-banner-image">
                                <img src="{{ asset('img/product-banner/newoff.jpg') }}" alt="product-banner">
                                <div class="cr-product-banner-contain">
                                    <h5 class="text-white">{{ Illuminate\Support\Str::limit($b->name, 40) }}</h5>
                                    <p><span class="percent">{{ $b->discount }}%</span> <span class="text text-white">
                                            Off on first order</span>
                                    </p>
                                    <div class="cr-product-banner-buttons">
                                        <a href="{{ url('/shop') }}" class="cr-button">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="section-services padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-service-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-red-packet-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Product Packing</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>24X7 Support</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Delivery in 5 Days</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-money-dollar-box-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Payment Secure</h4>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Deal -->
@foreach ($midbanners as $midbanner)
<section class="section-deal padding-b-100">
    <div class="bg-banner-deal" style="
        width: 100%;
    height: 600px;
    position: relative;
    background-image:  url('{{ asset('uploads/Middle Bannner/' . $midbanner->image) }}') ;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-deal-rightside">
                        <div class="cr-deal-content" data-aos="fade-up" data-aos-duration="1000" style="background-color: rgb(255, 255, 255)">
                            <span><code>{{ $midbanner->discount }}%</code> OFF</span>
                            <h4 class="cr-deal-title" style="color: rgb(0, 0, 0);">{{ $midbanner->title }}</h4>
                            <p style="color: rgb(0, 0, 0);">{{ $midbanner->sub_title }}</p>
                            <div id="timer" class="cr-counter">
                                <div class="cr-counter-inner">

                                    <h4 style="color: rgb(0, 0, 0);">
                                        <span id="hours"></span>
                                        Hrs
                                    </h4>
                                    <h4 style="color: rgb(0, 0, 0);">
                                        <span id="minutes"></span>
                                        Min
                                    </h4>
                                    <h4 style="color: rgb(0, 0, 0);">
                                        <span id="seconds"></span>
                                        Sec
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- Popular product -->
@foreach ($lastbanners as $lastbanner)
<section class="section-popular margin-b-100">
    <div class="container">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="2000">
            <div class="cr-products-rightbar">
                <img src="{{ asset('uploads/Last Bannner/' . $lastbanner->image) }}" alt="products-rightview">
                <div class="cr-products-rightbar-content">
                    {{-- <h5>{{ $lastbanner->title }}
                    </h5>
                    <div class="cr-off">
                        <span>Get {{ $lastbanner->discount }}% <code>OFF</code></span>
                    </div> --}}
                    <div class="rightbar-buttons">
                        <a href="{{ url('/shop') }}" class="cr-button">
                            shop now
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endforeach
<!-- Testimonial -->
<section class="section-testimonial padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-banner">
                        <h2>Customers Reviews</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Customer Reviews help customers to learn more about the product and decide whether it is the
                            right product for them.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-testimonial-slider swiper-container">
                    <div class="swiper-wrapper cr-testimonial-pt-50">


                        @foreach ($review as $reviews)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                            <div class="cr-testimonial">
                                <div class="cr-testimonial-image">
                                    <img src="{{ asset('img/testimonial/1.jpg') }}" alt="businessman">
                                </div>
                                <div class="cr-testimonial-inner">
                                    <span>Customer</span>
                                    <h4 class="title">{{ $reviews->name }}</h4>
                                    <p>“{{ $reviews->review }}”
                                    </p>
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="section-blog padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-banner">
                        <h2>Latest News</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Pure Nature, Pure Health: Our Herbal Commitment</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="cr-blog-slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($blog as $newblog)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                            <div class="cr-blog">
                                <div class="cr-blog-image">
                                    <img src="{{ asset('uploads/Blog Images/' . $newblog->image) }}" alt="blog-2">
                                </div>
                                <div class="cr-blog-content">
                                    <span><code>By {{ $newblog->written_by }}</code> | <a href="{{ route('blog.more.detail', ['id' => $newblog->id]) }}">{{ \Carbon\Carbon::parse($newblog->date)->format('d-m-Y') }}</a></span>
                                    <h5>{{ $newblog->title }}</h5>
                                    <a class="read" href="{{ route('blog.more.detail', ['id' => $newblog->id]) }}">Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



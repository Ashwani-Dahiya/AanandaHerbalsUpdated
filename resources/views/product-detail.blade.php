@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
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
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Product Detail</h2>
                        <span> <a href="{{ url('/') }}">Home</a> - Product Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section class="section-about padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="cr-about-image" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                    <div id="demo{{ $data->id }}" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            @for ($i = 0; $i < $numImages; $i++)
                                <button type="button" data-bs-target="#demo{{ $data->id }}" data-bs-slide-to="{{ $i }}" @if($i === 0) class="active" @endif></button>
                            @endfor
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('uploads/Products Images/'.$data->image) }}" alt="Image 1" class="d-block w-100">
                            </div>
                            @if($data->image2)
                            <div class="carousel-item">
                                <img src="{{ asset('uploads/Products Images/'.$data->image2) }}" alt="Image 2" class="d-block w-100">
                            </div>
                            @endif
                            @if($data->image3)
                            <div class="carousel-item">
                                <img src="{{ asset('uploads/Products Images/'.$data->image3) }}" alt="Image 3" class="d-block w-100">
                            </div>
                            @endif
                            @if($data->image4)

                            <div class="carousel-item">
                                <img src="{{ asset('uploads/Products Images/'.$data->image4) }}" alt="Image 4" class="d-block w-100">
                            </div>
                            @endif
                            @if($data->image5)
                            <div class="carousel-item">
                                <img src="{{ asset('uploads/Products Images/'.$data->image5) }}" alt="Image 5" class="d-block w-100">
                            </div>
                            @endif
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo{{ $data->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo{{ $data->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cr-about" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <h4 class="heading">{{ $data->name }}</h4>
                    <div class="cr-about-content">
                        <p>{{ $data->about1 }}</p>
                        <br />
                        <p>{{ $data->about2 }}</p>
                        <ul class="h6">
                            <li class="text-muted"><label class="text-dark">Company : </label> {{ $data->model }}</li>
                            <li class="text-muted"><label class="text-dark">Color : </label> {{ $data->colors }}</li>
                            <li class="text-muted"><label class="text-dark">Available Stock : </label> {{ $data->available_products }}</li>
                        </ul>

                    </div>
                    @if (Auth::user())
                        <div class="cr-last-buttons mt-4 d-flex boder boder-dark gap-2 justify-content-center align-items-center">
                            <a href="{{ route('add.cart', ['id' => $data->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
                                Add cart
                            </a>
                            <a href="{{ route('buy.now', ['id' => $data->id]) }}" class="cr-button col-md-5" style="font-size: 10px">
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
@endsection

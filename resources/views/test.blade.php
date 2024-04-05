@extends('layouts.app')
@section('content')



<!-- Popular product -->
@foreach ($section as $currentSection)
@if (is_object($currentSection))
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">

        <div class="row">

            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">

                        <h2>{{ $currentSection->name }}</h2>
                    </div>
                    @if ($currentSection->brands)
                    @foreach ($currentSection->brands as $brand)
                    @if (is_object($brand))
                    <div class="cr-banner-sub-title">
                        <p>{{ $brand->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
            <div class="col-xl-12 col-lg-12 col-12 mb-24">
                <div class="row mb-minus-24">

                    @if ($brand->products)
                    @foreach ($brand->products as $product)




                    <div class="mix vegetable col-xxl-2 col-xl-4 col-6 cr-product-box mb-15">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('img/product/domcam.webp') }}" alt="product-1">
                                </div>
                                <div class="cr-side-view">
                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                    <i class="ri-shopping-bag-line"></i>
                                </a>
                            </div>
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
                                <a href="{{ url('/shop') }}" class="title">{{ $product->name }}</a>
                                <p class="cr-price"><span class="new-price">₹{{ $product->price }}</span> <span class="old-price">₹{{ $product->discounted_price }}</span></p>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif
                    @else
                    <p>No brand data available</p>
                    @endif
                    @endforeach
                    @endif
                    @else
                    <p>No section data available</p>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

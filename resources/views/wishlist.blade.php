@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Wishlist</h2>
                        <span> <a href="index.php">Home</a> - Wishlist</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wishlist -->
<section class="section-wishlist padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Wishlist</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
            <div class="col-lg-3 col-6 cr-product-box mb-24">
                <div class="cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="assets/img/product/1.jpg" alt="product-1">
                        </div>
                        <div class="cr-side-view">
                            <a class="cr-remove-product" href="javascript:void(0)">
                                <i class="ri-close-line"></i>
                            </a>
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
                            <a href="shop-left-sidebar.php">Vegetables</a>
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                                <p>(4.5)</p>
                            </div>
                        </div>
                        <a href="product-left-sidebar.php" class="title">Fresh organic villa farm lomon
                            500gm pack</a>
                        <p class="cr-price"><span class="new-price">$120.25</span> <span class="old-price">$123.25</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 cr-product-box mb-24">
                <div class="cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="assets/img/product/9.jpg" alt="product-1">
                        </div>
                        <div class="cr-side-view">
                            <a class="cr-remove-product" href="javascript:void(0)">
                                <i class="ri-close-line"></i>
                            </a>
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
                            <a href="shop-left-sidebar.php">Snacks</a>
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <p>(5.0)</p>
                            </div>
                        </div>
                        <a href="product-left-sidebar.php" class="title">Best snakes with hazel nut pack
                            200gm</a>
                        <p class="cr-price"><span class="new-price">$145</span> <span class="old-price">$150</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 cr-product-box mb-24">
                <div class="cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="assets/img/product/2.jpg" alt="product-1">
                        </div>
                        <div class="cr-side-view">
                            <a class="cr-remove-product" href="javascript:void(0)">
                                <i class="ri-close-line"></i>
                            </a>
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
                            <a href="shop-left-sidebar.php">Fruits</a>
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                                <p>(4.5)</p>
                            </div>
                        </div>
                        <a href="product-left-sidebar.php" class="title">Fresh organic apple 1kg simla
                            marming</a>
                        <p class="cr-price"><span class="new-price">$120.25</span> <span class="old-price">$123.25</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 cr-product-box mb-24">
                <div class="cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="assets/img/product/3.jpg" alt="product-1">
                        </div>
                        <div class="cr-side-view">
                            <a class="cr-remove-product" href="javascript:void(0)">
                                <i class="ri-close-line"></i>
                            </a>
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
                            <a href="shop-left-sidebar.php">Fruits</a>
                            <div class="cr-star">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-line"></i>
                                <i class="ri-star-line"></i>
                                <p>(3.2)</p>
                            </div>
                        </div>
                        <a href="product-left-sidebar.php" class="title">Organic fresh venila farm
                            watermelon 5kg</a>
                        <p class="cr-price"><span class="new-price">$50.30</span> <span class="old-price">$72.60</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

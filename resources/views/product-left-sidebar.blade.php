@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Product</h2>
                        <span> <a href="index.php">Home</a> - product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product -->
<section class="section-product padding-t-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="cr-shop-sideview">
                    <div class="cr-shop-categories">
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
                    </div>
                    <div class="cr-shop-price">
                        <h4 class="cr-shop-sub-title">Price</h4>
                        <div class="price-range-slider">
                            <div id="slider-range" class="range-bar"></div>
                            <p class="range-value">
                                <label>Price :</label>
                                <input type="text" id="amount" placeholder="'" readonly>
                            </p>
                            <button type="button" class="cr-button">Filter</button>
                        </div>
                    </div>
                    <div class="cr-shop-color">
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
                            <div class="checkbox-group">
                                <input type="checkbox" id="green">
                                <label for="green">Green</label>
                                <span class="green"></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-shop-weight">
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
                    </div>
                    <div class="cr-shop-tags">
                        <h4 class="cr-shop-sub-title">Tages</h4>
                        <div class="cr-shop-tags-inner">
                            <ul class="cr-tags">
                                <li><a href="javascript:void(0)">Vegetables</a></li>
                                <li><a href="javascript:void(0)">juice</a></li>
                                <li><a href="javascript:void(0)">Food</a></li>
                                <li><a href="javascript:void(0)">Dry Fruits</a></li>
                                <li><a href="javascript:void(0)">Vegetables</a></li>
                                <li><a href="javascript:void(0)">juice</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="row mb-minus-24">
                    <div class="col-md-6 col-12 mb-24">
                        <div class="vehicle-detail-banner banner-content clearfix">
                            <div class="banner-slider">
                                <div class="slider slider-for">
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/9.jpg" alt="product-tab-1" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/10.jpg" alt="product-tab-2" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/11.jpg" alt="product-tab-3" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/12.jpg" alt="product-tab-1" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/13.jpg" alt="product-tab-2" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/14.jpg" alt="product-tab-3" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/15.jpg" alt="product-tab-1" class="product-image">
                                        </div>
                                    </div>
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="assets/img/product/16.jpg" alt="product-tab-2" class="product-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="slider slider-nav thumb-image">
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/9.jpg" alt="product-tab-1">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/10.jpg" alt="product-tab-2">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/11.jpg" alt="product-tab-3">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/12.jpg" alt="product-tab-1">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/13.jpg" alt="product-tab-2">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/14.jpg" alt="product-tab-3">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/15.jpg" alt="product-tab-1">
                                        </div>
                                    </div>
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="assets/img/product/16.jpg" alt="product-tab-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 mb-24">
                        <div class="cr-size-and-weight-contain">
                            <h2 class="heading">Seeds Of Change Oraganic Quinoa, Brown</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, iure minus error
                                doloribus saepe natus?</p>
                        </div>
                        <div class="cr-size-and-weight">
                            <div class="cr-review-star">
                                <div class="cr-star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p>( 75 Review )</p>
                            </div>
                            <div class="list">
                                <ul>
                                    <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                    <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                    <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                    <li><label>Weight <span>:</span></label>200 Grams</li>
                                    <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                    <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                    <li><label>Items <span>:</span></label>1</li>
                                </ul>
                            </div>
                            <div class="cr-product-price">
                                <span class="new-price">$120.25</span>
                                <span class="old-price">$123.25</span>
                            </div>
                            <div class="cr-size-weight">
                                <h5><span>Size</span>/<span>Weight</span> :</h5>
                                <div class="cr-kg">
                                    <ul>
                                        <li class="active-color">50kg</li>
                                        <li>80kg</li>
                                        <li>120kg</li>
                                        <li>200kg</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cr-add-card">
                                <div class="cr-qty-main">
                                    <input type="text" placeholder="." value="1" minlength="1" maxlength="20" class="quantity">
                                    <button type="button" id="add" class="plus">+</button>
                                    <button type="button" id="sub" class="minus">-</button>
                                </div>
                                <div class="cr-add-button">
                                    <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                                </div>
                                <div class="cr-card-icon">
                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cr-paking-delivery">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional" type="button" role="tab" aria-controls="additional" aria-selected="false">Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="cr-tab-content">
                                <div class="cr-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        sapiente odio, error dolore vero temporibus consequatur, nobis veniam odit
                                        dignissimos consectetur quae in perferendis
                                        doloribusdebitis corporis, eaque dicta, repellat amet, illum adipisci vel
                                        perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                        ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                        laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                </div>
                                <h4 class="heading">Packaging & Delivery</h4>
                                <div class="cr-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                        ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                        laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                            <div class="cr-tab-content">
                                <div class="cr-description">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        sapiente
                                        doloribus debitis corporis, eaque dicta, repellat amet, illum adipisci vel
                                        perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                        ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                        laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                </div>
                                <div class="list">
                                    <ul>
                                        <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                        <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                        <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                        <li><label>Weight <span>:</span></label>200 Grams</li>
                                        <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                        <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                        <li><label>Items <span>:</span></label>1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="cr-tab-content-from">
                                <div class="post">
                                    <div class="content">
                                        <img src="assets/img/review/1.jpg" alt="review">
                                        <div class="details">
                                            <span class="date">Jan 08, 2024</span>
                                            <span class="name">Oreo Noman</span>
                                        </div>
                                        <div class="cr-t-review-rating">
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        sapiente doloribus debitis corporis, eaque dicta, repellat amet, illum
                                        adipisci vel
                                        perferendis dolor! quae vero in perferendis provident quis.</p>
                                    <div class="content mt-30">
                                        <img src="assets/img/review/2.jpg" alt="review">
                                        <div class="details">
                                            <span class="date">Mar 22, 2024</span>
                                            <span class="name">Lina Wilson</span>
                                        </div>
                                        <div class="cr-t-review-rating">
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-line"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                        sapiente doloribus debitis corporis, eaque dicta, repellat amet, illum
                                        adipisci vel
                                        perferendis dolor! quae vero in perferendis provident quis.</p>
                                </div>

                                <h4 class="heading">Add a Review</h4>
                                <form action="javascript:void(0)">
                                    <div class="cr-ratting-star">
                                        <span>Your rating :</span>
                                        <div class="cr-t-review-rating">
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-fill"></i>
                                            <i class="ri-star-s-line"></i>
                                            <i class="ri-star-s-line"></i>
                                            <i class="ri-star-s-line"></i>
                                        </div>
                                    </div>
                                    <div class="cr-ratting-input">
                                        <input name="your-name" placeholder="Name" type="text">
                                    </div>
                                    <div class="cr-ratting-input">
                                        <input name="your-email" placeholder="Email*" type="email" required="">
                                    </div>
                                    <div class="cr-ratting-input form-submit">
                                        <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                        <button class="cr-button" type="submit" value="Submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular products -->
<section class="section-popular-products padding-tb-100" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et viverra maecenas accumsan lacus vel facilisis. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-popular-product">
                    <div class="slick-slide">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="assets/img/product/9.jpg" alt="product-1">
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
                                    <a href="shop-left-sidebar.php">Snacks</a>
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                        <p>(4.5)</p>
                                    </div>
                                </div>
                                <a href="product-left-sidebar.php" class="title">Best snakes with hazel nut
                                    mix pack 200gm</a>
                                <p class="cr-price"><span class="new-price">$120.25</span> <span class="old-price">$123.25</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="assets/img/product/10.jpg" alt="product-1">
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
                                <a href="product-left-sidebar.php" class="title">Sweet snakes crunchy nut
                                    mix 250gm
                                    pack</a>
                                <p class="cr-price"><span class="new-price">$100.00</span> <span class="old-price">$110.00</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="assets/img/product/1.jpg" alt="product-1">
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
                                    <a href="shop-left-sidebar.php">Snacks</a>
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                        <p>(4.5)</p>
                                    </div>
                                </div>
                                <a href="product-left-sidebar.php" class="title">Best snakes with hazel nut
                                    mix pack 200gm</a>
                                <p class="cr-price"><span class="new-price">$120.25</span> <span class="old-price">$123.25</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="assets/img/product/2.jpg" alt="product-1">
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
                                <a href="product-left-sidebar.php" class="title">Sweet snakes crunchy nut
                                    mix 250gm
                                    pack</a>
                                <p class="cr-price"><span class="new-price">$100.00</span> <span class="old-price">$110.00</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="slick-slide">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="assets/img/product/3.jpg" alt="product-1">
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
                                <a href="product-left-sidebar.php" class="title">Sweet snakes crunchy nut
                                    mix 250gm
                                    pack</a>
                                <p class="cr-price"><span class="new-price">$100.00</span> <span class="old-price">$110.00</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Track Order</h2>
                        <span> <a href="index.php">Home</a> - Track Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Track Order section -->
<section class="cr-track padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>We delivering happiness and needs, Faster than you can think.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="cr-track-box">
                    <!-- Details-->
                    <div class="row">
                        <div class="col-md-4 m-b-767">
                            <div class="cr-track-card"><span class="cr-track-title">order</span><span>#9857</span>
                            </div>
                        </div>
                        <div class="col-md-4 m-b-767">
                            <div class="cr-track-card"><span class="cr-track-title">Grasshoppers</span><span>M254HT</span></div>
                        </div>
                        <div class="col-md-4 m-b-767">
                            <div class="cr-track-card"><span class="cr-track-title">Expected date</span><span>Feb
                                    17, 2025</span></div>
                        </div>
                    </div>
                    <!-- Progress-->
                    <div class="cr-steps">
                        <div class="cr-steps-body">
                            <div class="cr-step cr-step-completed">
                                <span class="cr-step-indicator">
                                    <i class="ri-check-line"></i>
                                </span>
                                <span class="cr-step-icon">
                                    <i class="ri-shield-check-line"></i>
                                </span>Order<br> confirmed
                            </div>

                            <div class="cr-step cr-step-completed">
                                <span class="cr-step-indicator">
                                    <i class="ri-check-line"></i>
                                </span>
                                <span class="cr-step-icon">
                                    <i class="ri-settings-4-line"></i>
                                </span>Processing<br> order
                            </div>
                            <div class="cr-step cr-step-active">
                                <span class="cr-step-icon">
                                    <i class="ri-gift-line"></i>
                                </span>Quality<br> check
                            </div>
                            <div class="cr-step">
                                <span class="cr-step-icon">
                                    <i class="ri-truck-line"></i>
                                </span>Product<br> dispatched
                            </div>
                            <div class="cr-step">
                                <span class="cr-step-icon">
                                    <i class="ri-home-5-line"></i>
                                </span>Product<br> delivered
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Track Order section End -->
@endsection

@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>About Us</h2>
                        <span> <a href="index.php">Home</a> - About Us</span>
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
                <div class="cr-about" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <h4 class="heading">About The Herbal Paroducts</h4>
                    <p style="text-align: justify;">Welcome to {{ $comp_name }}, where nature's wisdom meets modern wellness. Established with a passion for promoting holistic health, we believe in the transformative power of herbal remedies. Our journey began with a commitment to harness the rich benefits of nature's bounty, creating a range of herbal teas, supplements, and skincare products that empower you to prioritize your well-being.</p>
                    <br/><br/>
                    <div class="cr-about-content">
                        <p>At {{ $comp_name }}, we merge traditional herbal wisdom with cutting-edge research, ensuring that each product is a testament to purity, quality, and effectiveness. Our mission extends beyond providing you with exceptional herbal solutions – we are dedicated to promoting a sustainable and eco-conscious lifestyle.</p>
                            <br>
                            <br>
                            <p>With a foundation built on integrity and transparency, we invite you to explore our herbal universe. Join us in embracing the harmony of holistic living, where every product reflects our dedication to your health and the well-being of our planet.</p>
                            <br>
                            <br>
                            <p>Discover the essence of {{ $comp_name }} , and let nature guide you on a path to vibrant and nourished living.</p>

                        <div class="elementor-counter">
                            <div class="row">
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">1.2</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Vendors</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">410</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Customers</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-12 margin-575">
                                    <h4 class="elementor">
                                        <span class="elementor-counter-number">34</span>
                                        <span class="elementor-suffix">k</span>
                                    </h4>
                                    <div class="elementor-counter-title">
                                        <span>Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="cr-about-image" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                    <img src="{{ asset('img/about/aboutimage.png') }}" alt="side-view">
                    <br/><br/>
                    <h6 class="h6">Our holistic approach doesn’t stop at crafting exceptional herbal products – it’s about fostering a community that embraces the beauty of a harmonious and balanced life. Through transparency, integrity, and a relentless commitment to quality, we invite you to join us in this journey towards vibrant living.</h6>

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



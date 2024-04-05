@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Contact Us</h2>
                        <span> <a href="index.php">Home</a> - Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section class="section-Contact padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Get in Touch</h2>
                    </div>
                    <div class="cr-banner-sub-title ">
                        <p class="text-muted" style="text-align: justify">At {{ $comp_name }}, we believe in the power of nature to enhance your well-being. Our carefully curated range of herbal products is designed to harness the incredible benefits of natural ingredients, bringing you closer to a healthier, more vibrant life.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-minus-24">
            <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="cr-info-box">
                    <div class="cr-icon">
                        <i class="ri-phone-line"></i>
                    </div>
                    <div class="cr-info-content">
                        <h4 class="heading">Contact</h4>
                        <p><a href="javascript:void(0)"><i class="ri-phone-line"></i> &nbsp; {{ $comp_mob }}</a></p>
                        <p><a href="javascript:void(0)"><i class="ri-phone-line"></i> &nbsp; {{ $comp_mob1 }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="cr-info-box">
                    <div class="cr-icon">
                        <i class="ri-mail-line"></i>
                    </div>
                    <div class="cr-info-content">
                        <h4 class="heading">Mail & Website</h4>
                        <p><a href="javascript:void(0)"><i class="ri-mail-line"></i> &nbsp;
                                mail.{{ $comp_email }}</a></p>
                        <p><a href="javascript:void(0)"><i class="ri-globe-line"></i> &nbsp; {{ $comp_web }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                <div class="cr-info-box">
                    <div class="cr-icon">
                        <i class="ri-map-pin-line"></i>
                    </div>
                    <div class="cr-info-content">
                        <h4 class="heading">Address</h4>
                        <p><a href="javascript:void(0)"><i class="ri-map-pin-line"></i> &nbsp; {{ $comp_add }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row padding-t-100 mb-minus-24">
            <div class="col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                {!! $comp_map_link !!}
            </div>
            <div class="col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                <form class="cr-content-form" method="POST" action="{{ route('data.send') }}">
                    @csrf
                    @if(session()->has('message'))
                    <div class="alert alert-success ">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <input type="text" placeholder="Full Name" class="cr-form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" class="cr-form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" placeholder="Phone" class="cr-form-control" name="phone" required>
                    </div>
                    <div class="form-group">
                        <textarea class="cr-form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="cr-button">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection

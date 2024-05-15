@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Read Blog</h2>
                        <span><a href="{{ url('/') }}">Home</a> - About Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Classic -->
<section class="section-blog-Classic padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 md-30">
                <div class="cr-blog-classic" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-blog-classic-content">
                        <div class="cr-comment">
                            <span>By {{ $data->written_by}}<code> / {{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}</code></span>
                        </div>
                        <h2>{{ $data->title }}</h2>
                        <h6>{{ $data->title }}</h6>
                        <p class="text-muted">{{ $data->short_title }}</p>
                        <p>{{ $data->long_about }}</p>
                    </div>
                    <div class="cr-blog-image">
                        <img src="{{ asset('uploads/Blog Images/'.$data->image)}}" alt="blog-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

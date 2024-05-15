@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Blog</h2>
                        <span><a href="{{ url('/') }}">Home</a> - Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Classic -->
<section class="section-blog-Classic padding-tb-100" >
    <div class="container" >
        <div class="row" >

            @foreach ($data as $new )
            <div class="col-lg-12 col-12 md-30 mt-5" >
                <div class="cr-blog-classic" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400" >
                    <div class="cr-blog-classic-content">
                        <div class="cr-comment">
                            <span>By {{ $new->written_by
                                }}<code> / {{ \Carbon\Carbon::parse($new->date)->format('d-m-Y') }}</code></span>
                        </div>
                        <h4>{{ $new->title }}</h4>
                        <p>{{
                            Illuminate\Support\Str::limit($new->about, 120) }}</p>
                        <a href="{{ route('blog.more.detail', ['id' => $new->id]) }}">read more</a>
                    </div>
                    <div class="cr-blog-image">
                        <img src="{{ asset('uploads/Blog Images/'.$new->image) }}" alt="blog-1">
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
    <div class="container mb-24 mt-4">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection

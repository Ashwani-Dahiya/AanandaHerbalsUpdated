@extends('layouts.user_view')


@yield('content')

@section('user')
<div class="col-lg-9 col-12 md-30 cr-product-box" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
    <div class="row">

    </div>
    <div class="row col-100 mb-minus-24 ">
        <div class="col-sm-12 cr-product-card" style="padding-left: 40px">
            <h5 class="text-center">Profile</h5>
                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                <div class="row ">
                    <div class="col-sm-4 mt-2">
                        <p class="m-b-10 f-w-600">Name</p>
                        <h6 class="text-muted f-w-400">{{ $user->first_name }}
                        {{ $user->last_name }}
                        </h6>
                    </div>

                    <div class="col-sm-4 mt-2">
                        <p class="m-b-10 f-w-600">Email</p>
                        <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <p class="m-b-10 f-w-600">Phone</p>
                        <h6 class="text-muted f-w-400">{{ $user->phone }}</h6>
                    </div>
                </div>
                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Address</h6>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="m-b-10 f-w-600">Address</p>
                        <h6 class="text-muted f-w-400">{{ $user->address }}</h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="m-b-10 f-w-600">City</p>
                        <h6 class="text-muted f-w-400">{{ $user->city }}</h6>
                    </div>
                    <div class="col-sm-4">
                        <p class="m-b-10 f-w-600">State</p>
                        <h6 class="text-muted f-w-400">{{ $user->state }}</h6>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <p class="m-b-10 f-w-600">Country</p>
                        <h6 class="text-muted f-w-400">{{ $user->country }}</h6>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <p class="m-b-10 f-w-600">Post Code</p>
                        <h6 class="text-muted f-w-400">{{ $user->post_code }}</h6>
                    </div>
                </div>

                
            </div>
</div>
</div>
</div>
</div>
</section>
@endsection

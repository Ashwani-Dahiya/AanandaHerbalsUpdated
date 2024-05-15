@extends('layouts.app')
@section('content')
<style>
    body {
        background: rgb(205, 238, 216);
    }

    .form-control:focus {
        box-shadow: none;
        border-color: rgb(152, 213, 173);
    }

    .profile-button {
        background: rgb(125, 179, 144);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: rgb(74, 137, 96);
    }

    .profile-button:focus {
        background: rgb(125, 179, 144);
        box-shadow: none
    }

    .profile-button:active {
        background: rgb(125, 179, 144);
        box-shadow: none
    }

    .back:hover {
        color: rgb(125, 179, 144);
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }
</style>
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        {{-- <h2>Update Profile</h2> --}}
                        <span> <a href="{{ url('/') }}">Home</a> - Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Register -->
<section class="section-register padding-tb-100">
    <div class="container">
        <div class="row d-none">
            <div class="col-lg-12">
                <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-banner">
                        <h2>Update Your Profile</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form action="{{ route('profile.update.data') }}" method="POST">
                @csrf
                @method('POST')

                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4 border-right">

                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                    class="rounded-circle mt-5" width="150px"
                                    src="https://img.icons8.com/bubbles/100/000000/user.png"><span
                                    class="font-weight-bold">{{ $record->first_name }}
                                    {{ $record->last_name }}
                                </span><span class="text-black-50">{{ $record->email }}</span><span> </span></div>

                        </div>

                        <div class="col-md-7 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Updation</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                            class="form-control" placeholder="first name"
                                            value="{{ $record->first_name }}" name="first_name" required>
                                    </div>
                                    <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                                            class="form-control" value="{{ $record->last_name }}" placeholder="surname"
                                            name="last_name">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                            class="form-control" placeholder="enter phone number"
                                            value="{{ $record->phone }}" name="phone" required></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                            class="form-control" placeholder="enter email id"
                                            value="{{ $record->email }}" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12"><label class="labels">Address Line </label><input type="text"
                                        class="form-control" placeholder="enter address line"
                                        value="{{ $record->address }}" name="address" required></div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Country</label><select name="country"
                                            id="" class="form-control">
                                            <option selected>{{ $record->country }}</option>
                                            <option value="India">India</option>
                                        </select></div>
                                        <div class="col-md-6">
                                            <label class="labels">State</label>
                                            <select name="state" id="state-select" class="form-control">
                                                <option selected value="{{ $record->state }}">{{ $record->state }}</option>
                                                @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="labels">City</label>
                                            <select name="city" id="city-select" class="form-control">
                                                <option selected>{{ $record->city }}</option>
                                                @foreach ($states as $state)
                                                @foreach ($state->cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                        class="form-control" name="post_code" placeholder="enter postcode"
                                        value="{{ $record->post_code }}">
                                </div>
                                <div class="mt-5 text-center">
                                    <input type="submit" class="btn btn-success profile-button" value="Update">
                                </div>
            </form>
        </div>
    </div>

    </div>
    </div>

    </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#state-select').on('change', function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    url: '/get-cities/' + stateId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#city-select').empty();
                        $.each(data, function(key, value) {
                            $('#city-select').append('<option value="' +
                                value.city + '">' + value.city + '</option>');
                        });
                    }
                });
            } else {
                $('#city-select').empty();
            }
        });
    });
</script>
@endsection

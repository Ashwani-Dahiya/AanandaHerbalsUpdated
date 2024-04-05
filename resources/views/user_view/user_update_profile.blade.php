@extends('layouts.user_view')


@yield('content')

@section('user')
<style>
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
<div class="col-lg-9 col-12 md-30 cr-product-box" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
    <div class="row">

    </div>
    <div class="row col-100 mb-minus-24 ">
        <div class="col-sm-12 cr-product-card" style="padding-left: 40px">
            <h5 class="text-center">Update Profile</h5>
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Updation</h4>
                    </div>
                    <div class="row mt-2">
                        <form action="{{ route('profile.update.data') }}" method="POST">
                            @csrf
                            @method('POST')
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
                                <option value="">India</option>
                            </select></div>
                        <div class="col-md-6"><label class="labels">State</label>
                            <select name="state" id="" class="form-control">
                                <option selected>{{ $record->state }}</option>
                                @foreach ($states as $state )
                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12"><label class="labels">City</label><select name="city" id=""
                                class="form-control">
                                <option selected>{{ $record->city }}</option>
                                @foreach ($states as $state)
                                @foreach ($state->cities as $city)
                                <option value="{{ $city->city }}">{{ $city->city }}</option>
                                @endforeach
                                @endforeach
                            </select></div>
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
</div>
</section>
@endsection


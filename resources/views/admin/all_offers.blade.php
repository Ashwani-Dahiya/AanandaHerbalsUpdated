@include('admin.header')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Offers</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.offer.page') }}">offers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Offer</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        @if (session('add_success'))
                                        <div class="alert alert-success">
                                            {{ session('add_success') }}
                                        </div>
                                        @endif

                                        @if (session('add_error'))
                                        <div class="alert alert-danger">
                                            {{ session('add_error') }}
                                        </div>
                                        @endif



                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.add.offer') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Offer Name</label>
                                                        <input class="form-control" type="text" name="on_festival_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Discount in Percentage</label>
                                                        <input class="form-control" type="number" name="discount_percentage" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Coupon Code</label>
                                                        <input class="form-control" type="text" name="coupon_code" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <select class="form-control" name="status" required>
                                                            <option value="1">Active</option>
                                                            <option value="0">Block</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of offers</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">

                                            @if (session('update_success'))
                                        <div class="alert alert-success">
                                            {{ session('update_success') }}
                                        </div>
                                        @endif

                                        @if (session('update_error'))
                                        <div class="alert alert-danger">
                                            {{ session('update_error') }}
                                        </div>
                                        @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Offer Name</th>
                                                        <th>Discount in Percentage</th>
                                                        <th>Coupon Code</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i=0;
                                                    @endphp
                                                    @foreach ($offers as $offer )
                                                    <tr>
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $offer->on_festival_name }}</td>
                                                        <td>{{ $offer->discount_percentage }}</td>
                                                        <td>{{ $offer->coupon_code }}</td>
                                                        @if ($offer->status==1)
                                                        <td><span class="badge bg-success">Active</span></td>
                                                        @else
                                                        <td><span class="badge bg-danger">Block</span></td>
                                                        @endif
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal{{ $offer->id }}">Update</button>
                                                            <div id="gridSystemModal{{ $offer->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="gridModalLabel">Update {{ $offer->name }}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.offer',['id'=>$offer->id]) }}">
                                                                                @csrf
                                                                                @method('POST')

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Offer Name</label>
                                                                                            <input type="text" name="on_festival_name" class="form-control" value="{{ $offer->on_festival_name }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Discount in Percentage</label>
                                                                                            <input class="form-control" type="text" name="discount_percentage" value="{{ $offer->discount_percentage }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">
                                                                                                Coupon Code</label>
                                                                                                <input class="form-control" type="text" name="coupon_code" value="{{ $offer->coupon_code }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Status</label>
                                                                                            <select class="form-control" name="status" required>
                                                                                                <option value="1" <?php if($offer->status == "1") echo "selected"; ?>>Active</option>
                                                                                                <option value="0" <?php if($offer->status == "0") echo "selected"; ?>>Block</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <input type="submit" class="btn btn-success" name="update" value="Update">
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')

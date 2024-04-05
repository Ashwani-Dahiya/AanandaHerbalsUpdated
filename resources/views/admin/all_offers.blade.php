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
                                                        <label class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Price</label>
                                                        <input class="form-control" type="text" name="price" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Type</label>
                                                        <select class="form-control" name="type" required>
                                                            <option value="flat">flat</option>
                                                            <option value="per">per</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Value</label>
                                                        <input class="form-control" type="text" name="value" required>
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
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Type</th>
                                                        <th>Value</th>
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
                                                        <td>{{ $offer->name }}</td>
                                                        <td>{{ $offer->price }}</td>
                                                        <td>{{ $offer->type }}</td>
                                                        <td>{{ $offer->value }}</td>
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
                                                                                            <label for="input1" class="form-label">Name</label>
                                                                                            <input type="text" name="name" class="form-control" value="{{ $offer->name }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Price</label>
                                                                                            <input class="form-control" type="text" name="price" value="{{ $offer->price }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Type</label>
                                                                                            <select class="form-control" name="type" required>
                                                                                                <option value="flat" <?php if($offer->type == "flat") echo "selected"; ?>>flat</option>
                                                                                                <option value="per" <?php if($offer->type == "per") echo "selected"; ?>>per</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Value</label>
                                                                                            <input class="form-control" type="text" name="value" value="{{ $offer->value }}">
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

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
                                    <h5 class="m-b-10">Camera Brands</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.all.brands.page') }}">Camera
                                            Brands</a></li>
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
                                        <h5>Add Camera Brand</h5>
                                    </div>
                                    <div class="card-block table-border-style">




                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif


                                        <form method="post" enctype="multipart/form-data"
                                            action="{{ route('adm.add.brand') }}">
                                            @csrf
                                            @method('post')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" required>
                                                        @if ($errors->has('name'))
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Sequence</label>
                                                        <input class="form-control" type="number" name="seq" required>
                                                        @if ($errors->has('seq'))
                                                        <p class="text-danger">{{ $errors->first('seq') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Discount</label>
                                                        <input class="form-control" type="number" name="discount"
                                                            required>
                                                        @if ($errors->has('discount'))
                                                        <p class="text-danger">{{ $errors->first('discount') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="input1" class="form-label">Logo</label>
                                                        <input type="file" class="form-control" name="image" required>
                                                        @if ($errors->has('image'))
                                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit"
                                                        name="btnsave">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Camera Brands</h5>
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
                                                        <th>Sequence</th>
                                                        <th>Discount</th>
                                                        <th>Logo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($brands as $brand )
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $brand->name }}</td>
                                                        <td>{{ $brand->seq }}</td>
                                                        <td>{{ $brand->discount }}</td>
                                                        <td>
                                                            <div class="user-icon">

                                                                <img src="{{ asset('uploads/Brands Images/'.$brand->logo) }}"
                                                                    style="height: 50px; width: 50px;">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#gridSystemModal{{ $brand->id }}">Update</button>
                                                            <div id="gridSystemModal{{ $brand->id }}" class="modal fade"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="gridModalLabel">
                                                                                Update {{ $brand->name }}</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post"
                                                                                enctype="multipart/form-data"
                                                                                action="{{ route('adm.update.brand',['id'=> $brand->id]) }}">
                                                                                @csrf
                                                                                @method('POST')
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1"
                                                                                                class="form-label">Name</label>
                                                                                            <input type="text"
                                                                                                name="name"
                                                                                                class="form-control"
                                                                                                value="{{ $brand->name }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1"
                                                                                                class="form-label">Sequence</label>
                                                                                            <input type="text"
                                                                                                name="seq"
                                                                                                class="form-control"
                                                                                                value="{{ $brand->seq }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1"
                                                                                                class="form-label">Discount</label>
                                                                                            <input type="text"
                                                                                                name="discount"
                                                                                                class="form-control"
                                                                                                value="{{ $brand->discount }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1"
                                                                                                class="form-label">Logo</label>
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                name="new_image">

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <input type="submit"
                                                                                            class="btn btn-success"
                                                                                            name="update"
                                                                                            value="Update">
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6">
                                                                                        <button type="button"
                                                                                            class="btn  btn-secondary"
                                                                                            data-bs-dismiss="modal">Close</button>
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

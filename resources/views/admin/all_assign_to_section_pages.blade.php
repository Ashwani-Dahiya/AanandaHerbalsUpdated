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
                                    <h5 class="m-b-10">Assign Products to Section</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.assign.section.page') }}">Assign Products to Section</a></li>
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
                                        <h5>Add Assign Products to Section</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif


                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.assign.product') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-7 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="input1" class="form-label">Select Section</label>
                                                        <select class="form-control form-select" name="section_id" required>
                                                            <option value="">Select Section</option>
                                                            @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="seq" class="form-label">Sequence</label>
                                                        <input type="number" id="seq" class="form-control" name="seq" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th>Action</th>
                                                                <th>Sr.</th>
                                                                <th>Photo</th>
                                                                <th>Product Name</th>
                                                                <th>Company Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i=0;
                                                            @endphp
                                                            @foreach ($productsData as $data)
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="car_id[]" value="{{ $data->id }}" style="width: 30px; height: 30px;">
                                                                </td>
                                                                <td>{{ $i }}</td>
                                                                <td>
                                                                    <div class="user-icon">
                                                                        <img src="{{ asset('uploads/Products Images/'.$data->image) }}" style="height: 50px; width: 50px;">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $data->name }}
                                                                </td>
                                                                <td>
                                                                    @if (empty($data->name))
                                                                    {{ "not available" }}
                                                                    @else
                                                                    {{ $data->name }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button class="btn btn-primary" type="submit" name="btnsave">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Assigned Products</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Section Name</th>
                                                        <th>Products Name</th>
                                                        <th>Photo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($productsData as $data)
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ $data->name }}
                                                        </td>
                                                        <td>
                                                            {{ $data->name }}
                                                        </td>
                                                        <td>
                                                            <div class="user-icon">
                                                                <img src="{{ asset('uploads/Products Images/'.$data->image) }}" style="height: 50px; width: 50px;">
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

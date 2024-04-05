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
                                    <h5 class="m-b-10">All Products</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.all.products.page') }}">All
                                            Products</a></li>
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
                                        <h5>List of Products</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Category</th>
                                                        <th>Brand</th>
                                                        <th>Name</th>
                                                        <th>Photo</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($lists as $key )
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            @if ($key->category)
                                                            {{ $key->category->name ?? 'N/A' }}
                                                        @else
                                                            N/A
                                                        @endif

                                                             <br>
                                                        </td>
                                                        <td>
                                                            @if ($key->brand)
                                                            {{ $key->brand->name ?? 'N/A' }}
                                                        @else
                                                            N/A
                                                        @endif
                                                           
                                                        </td>
                                                        <td>
                                                            {{ $key->name }}
                                                        </td>
                                                        <td>
                                                            <div class="user-icon">
                                                                <img src="{{ asset('uploads/Products Images/'.$key->image) }}"
                                                                    style="height: 50px; width: 50px;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div><label class="badge bg-success">Active</label></div>
                                                        </td>
                                                        <td>
                                                            <form method="post"
                                                                action="{{ route('adm.del.product', ['id' => $key->id]) }}"
                                                                onsubmit="return confirm('Are you sure you want to delete this Product?')">
                                                                @csrf
                                                                @method('POST')
                                                                <input type="hidden" value="{{ " id" }}" name="id">
                                                                <input type="submit" class="btn btn-danger" name="Apply"
                                                                    value="Delete" style="padding: 0px 10px;">
                                                            </form>
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

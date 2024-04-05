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
                                    <h5 class="m-b-10">All Product Ratings</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Product Ratings</a></li>
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
                                        <h5>List of All Product Ratings</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                            @endif
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Product Details</th>
                                                        <th>User Details</th>
                                                        <th>Rating</th>
                                                        <th>Review</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ( $ratingData as $data )
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ $data['product']->name }}
                                                        </td>
                                                        <td>
                                                            {{ $data['user']->username }}
                                                        </td>
                                                        <td>
                                                            {{ $data['rating']->rating }}
                                                        </td>
                                                        <td>
                                                            {{ $data['rating']->remark }}
                                                        </td>
                                                        <td>
                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.del.rating',[
                                                                'id'=>$data['rating']->id
                                                            ]) }}" onsubmit="return confirm('Are you sure you want to delete this rating?')">
                                                                @csrf
                                                                @method("POST")
                                                                <input type="hidden" value="{{ $data['rating']->id }}" name="id">
                                                                <input type="submit" class="btn btn-danger" name="Apply" value="Delete" style="padding: 0px 10px;">
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

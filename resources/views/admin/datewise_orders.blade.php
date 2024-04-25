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
                                    <h5 class="m-b-10">Datewise Orders</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.datewise.order.page') }}">Datewise Orders</a></li>
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
                                        <h5>List of Datewise Orders</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">

                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-success">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.</th>
                                                            <th>Product Details</th>
                                                            <th>User Details</th>
                                                            <th>Original Price</th>
                                                            <th>Discounted Price</th>
                                                            <th>Item Count</th>
                                                            <th>Total Amount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                <tbody>
                                                    @php
                                                    $i = 0;
                                                    @endphp
                                                   @foreach($ordersData as $data)
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            @if($data['product'])
                                                         {{ $data['product']->name }}
                                                        @else
                                                        N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['user'])
                                                            {{ $data['user']->username }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['item'])
                                                            {{ $data['item']->original_price }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['item'])
                                                            {{ $data['item']->discounted_price }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['item'])
                                                            {{ $data['item']->item_count }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['item'])
                                                            {{ $data['order']->price_after_coupon }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($data['order'])
                                                            {{ $data['order']->order_status }}
                                                        @else
                                                            N/A
                                                        @endif
                                                        </td>

                                                        <td>
                                                            <form action="{{ route('adm.view.order',['id'=>$data['order']->id]) }}" method="POST">
                                                                @csrf
                                                                @method('POST')
                                                                <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                    View Detalis</button>
                                                            </form>

                                                            {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate{{ $data['order']->id }}">Update Status</button> --}}

                                                            <div id="gridSystemModalUpdate{{  $data['order']->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            @if ($data['user'])
                                                                            <h5 class="modal-title" id="gridModalLabel"> {{ $data['user']->username }}</h5>
                                                                            @else
                                                                            <h5 class="modal-title" id="gridModalLabel">User not Found</h5>
                                                                            @endif
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.order.status',['id'=>$data['order']->id]) }}">
                                                                                @csrf
                                                                                @method('POST')
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Update Status</label>
                                                                                            <select name="status" class="form-control form-select" required>
                                                                                                <option value="cancelled">Select Status</option>
                                                                                                <option value="pending">Pending Order
                                                                                                </option>
                                                                                                <option value="accepted">Accept Order
                                                                                                </option>
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

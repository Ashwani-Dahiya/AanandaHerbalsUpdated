@include('admin.header')
@php
$i = 0;
@endphp

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">All Recent Orders</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Recent Orders</a></li>
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
                                        <h5>List of Recent Orders</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                            @endif
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                                        <h6>Pending/Ordered</h6>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2 aria-selected=" false">
                                                        <h6>Accepted Orders</h6>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                                        <h6>Shipped</h6>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                                        <h6>Delivered</h6>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false">
                                                        <h6>Cancelled</h6>
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <table class="table" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.</th>
                                                                {{-- <th>Product Name</th> --}}
                                                                <th>Order ID</th>
                                                                <th>Username</th>
                                                                <th>Phone</th>
                                                                {{-- <th>Price</th> --}}
                                                                {{-- <th>Quantity</th> --}}
                                                                <th>Total</th>
                                                                <th>Address</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @if ($pendingOrders)
                                                            @foreach ($pendingOrders as $order)
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $order->order_num }}</td>
                                                                {{-- <td>
                                                                    @if (isset($items[$order->id]))
                                                                    @foreach ($items[$order->id] as $item)
                                                                    {{ $item->product->name }}
                                                                @endforeach
                                                                @else
                                                                No items found for this order.
                                                                @endif
                                                                </td> --}}
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->first_name }}
                                                                    {{ $order->user->last_name }}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->phone}}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                {{-- <td>{{ $item->discounted_price }}</td>
                                                                <td>{{ $item->item_count }}</td> --}}
                                                                <td>{{ $order->price_after_coupon}}
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->address }}
                                                                    @else
                                                                    Not Found
                                                                    @endif
                                                                </td>
                                                                <td>{{ $order->order_status }}</td>
                                                                <td>
                                                                    <form action="{{ route('adm.view.order',['id'=>$order->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                            View Detalis</button>
                                                                    </form>

                                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate{{ $order->id }}">Update Status</button>

                                                                    <div id="gridSystemModalUpdate{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    @if ($order->user)
                                                                                    <h5 class="modal-title" id="gridModalLabel"> {{ $order->user->username }}</h5>
                                                                                    @else
                                                                                    <h5 class="modal-title" id="gridModalLabel">User not Found</h5>
                                                                                    @endif
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.order.status',['id'=>$order->id]) }}">
                                                                                        @csrf
                                                                                        @method('POST')
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="input1" class="form-label">Update Status</label>
                                                                                                    <select name="status" class="form-control form-select" required>
                                                                                                        <option value="pending">Select Status</option>
                                                                                                        <option value="accepted">Accept Order
                                                                                                        </option>
                                                                                                        <option value="cancelled">Cancel Order
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <label for="input1" class="form-label mt-2">Estimate Delivery Date</label>
                                                                                                    <input type="date" name="estimate_date" class="form-control mt-2" required>
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
                                                        </tbody>
                                                        @endforeach
                                                        @else
                                                        <h6 class="text-danger mt-4">Order not Found</h6>
                                                        @endif
                                                    </table>

                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <table class="table" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.</th>
                                                                {{-- <th>Product Name</th> --}}
                                                                <th>Order ID</th>
                                                                <th>Username</th>
                                                                <th>Phone</th>
                                                                {{-- <th>Price</th> --}}
                                                                {{-- <th>Quantity</th> --}}
                                                                <th>Total</th>
                                                                <th>Address</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i = 0;
                                                            @endphp
                                                            @if($shippedOrders)
                                                            @foreach ($shippedOrders as $order)
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $order->order_num }}</td>
                                                                {{-- <td>
                                                                    @if (isset($items[$order->id]))
                                                                    @foreach ($items[$order->id] as $item)
                                                                    {{ $item->product->name }}
                                                                @endforeach
                                                                @else
                                                                No items found for this order.
                                                                @endif
                                                                </td> --}}
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->first_name }}
                                                                    {{ $order->user->last_name }}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->phone}}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                {{-- <td>{{ $item->discounted_price }}</td>
                                                                <td>{{ $item->item_count }}</td> --}}
                                                                <td>{{ $order->price_after_coupon}}
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->address }}
                                                                    @else
                                                                    Not Found
                                                                    @endif
                                                                </td>
                                                                <td>{{ $order->order_status }}</td>
                                                                <td>
                                                                    <form action="{{ route('adm.view.order',['id'=>$order->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                            View Detalis</button>
                                                                    </form>

                                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate{{ $order->id }}">Update Status</button>

                                                                    <div id="gridSystemModalUpdate{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    @if ($order->user)
                                                                                    <h5 class="modal-title" id="gridModalLabel"> {{ $order->user->username }}</h5>
                                                                                    @else
                                                                                    <h5 class="modal-title" id="gridModalLabel">User not Found</h5>
                                                                                    @endif
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.order.status',['id'=>$order->id]) }}">
                                                                                        @csrf
                                                                                        @method('POST')
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="input1" class="form-label">Update Status</label>
                                                                                                    <select name="status" class="form-control form-select" required>
                                                                                                        <option value="shipped">Select Status</option>
                                                                                                        <option value="delivered">Delivered Order
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <input type="date" name="estimate_date" class="form-control mt-2">
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
                                                        </tbody>

                                                        @endforeach
                                                        @else
                                                        <h6 class="text-danger mt-4">Order not Found</h6>
                                                        @endif
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">
                                                    <table class="table" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.</th>
                                                                {{-- <th>Product Name</th> --}}
                                                                <th>Order ID</th>
                                                                <th>Username</th>
                                                                <th>Phone</th>
                                                                {{-- <th>Price</th> --}}
                                                                {{-- <th>Quantity</th> --}}
                                                                <th>Total</th>
                                                                <th>Address</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i = 0;
                                                            @endphp
                                                            @if($acceptedOrders)


                                                            @foreach ($acceptedOrders as $order)
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $order->order_num }}</td>
                                                                {{-- <td>
                                                                    @if (isset($items[$order->id]))
                                                                    @foreach ($items[$order->id] as $item)
                                                                    {{ $item->product->name }}
                                                                @endforeach
                                                                @else
                                                                No items found for this order.
                                                                @endif
                                                                </td> --}}
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->first_name }}
                                                                    {{ $order->user->last_name }}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->phone}}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                {{-- <td>{{ $item->discounted_price }}</td>
                                                                <td>{{ $item->item_count }}</td> --}}
                                                                <td>{{ $order->price_after_coupon}}
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->address }}
                                                                    @else
                                                                    Not Found
                                                                    @endif
                                                                </td>
                                                                <td>{{ $order->order_status }}</td>
                                                                <td>
                                                                    <form action="{{ route('adm.view.order',['id'=>$order->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                            View Detalis</button>
                                                                    </form>
                                                                    <br>

                                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate{{ $order->id }}">Update Status</button>

                                                                    <div id="gridSystemModalUpdate{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    @if ($order->user)
                                                                                    <h5 class="modal-title" id="gridModalLabel"> {{ $order->user->username }}</h5>
                                                                                    @else
                                                                                    <h5 class="modal-title" id="gridModalLabel">User not Found</h5>
                                                                                    @endif
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.order.status',['id'=>$order->id]) }}">
                                                                                        @csrf
                                                                                        @method('POST')
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <label for="input1" class="form-label">Update Status</label>
                                                                                                    <select name="status" class="form-control form-select" required>
                                                                                                        <option value="accepted">Select Status</option>
                                                                                                        <option value="shipped">Shipped Order
                                                                                                        </option>
                                                                                                    </select>
                                                                                                    <input type="date" name="estimate_date" class="form-control mt-2">
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
                                                        </tbody>

                                                        @endforeach
                                                        @else
                                                        <h6 class="text-danger mt-4">Order not Found</h6>
                                                        @endif
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                    <table class="table" id="pc-dt-simple">
                                                        <table class="table" id="pc-dt-simple">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr.</th>
                                                                    {{-- <th>Product Name</th> --}}
                                                                    <th>Order ID</th>
                                                                    <th>Username</th>
                                                                    <th>Phone</th>
                                                                    {{-- <th>Price</th> --}}
                                                                    {{-- <th>Quantity</th> --}}
                                                                    <th>Total</th>
                                                                    <th>Address</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $i = 0;
                                                                @endphp
                                                                @if($deliveredOrders)


                                                                @foreach ($deliveredOrders as $order)
                                                                @php
                                                                $i++;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $order->order_num }}</td>
                                                                    {{-- <td>
                                                                    @if (isset($items[$order->id]))
                                                                    @foreach ($items[$order->id] as $item)
                                                                    {{ $item->product->name }}
                                                                    @endforeach
                                                                    @else
                                                                    No items found for this order.
                                                                    @endif
                                                                    </td> --}}
                                                                    <td>
                                                                        @if ($order->user)
                                                                        {{ $order->user->first_name }}
                                                                        {{ $order->user->last_name }}
                                                                        @else
                                                                        User Not Found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($order->user)
                                                                        {{ $order->user->phone}}
                                                                        @else
                                                                        User Not Found
                                                                        @endif
                                                                    </td>
                                                                    {{-- <td>{{ $item->discounted_price }}</td>
                                                                    <td>{{ $item->item_count }}</td> --}}
                                                                    <td>{{ $order->price_after_coupon}}
                                                                    </td>
                                                                    <td>
                                                                        @if ($order->user)
                                                                        {{ $order->user->address }}
                                                                        @else
                                                                        Not Found
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $order->order_status }}</td>
                                                                    <td>
                                                                        <form action="{{ route('adm.view.order',['id'=>$order->id]) }}" method="POST">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                                View Detalis</button>
                                                                        </form>
                                                                        <br>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                @else
                                                                <h6 class="text-danger mt-4">Order not Found</h6>
                                                                @endif
                                                            </tbody>

                                                        </table>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                                                    <table class="table" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.</th>
                                                                {{-- <th>Product Name</th> --}}
                                                                <th>Order ID</th>
                                                                <th>Username</th>
                                                                <th>Phone</th>
                                                                {{-- <th>Price</th> --}}
                                                                {{-- <th>Quantity</th> --}}
                                                                <th>Total</th>
                                                                <th>Address</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $i = 0;
                                                            @endphp
                                                            @if($canceledOrders)


                                                            @foreach ($canceledOrders as $order)
                                                            @php
                                                            $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $order->order_num }}</td>
                                                                {{-- <td>
                                                                    @if (isset($items[$order->id]))
                                                                    @foreach ($items[$order->id] as $item)
                                                                    {{ $item->product->name }}
                                                                @endforeach
                                                                @else
                                                                No items found for this order.
                                                                @endif
                                                                </td> --}}
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->first_name }}
                                                                    {{ $order->user->last_name }}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->phone}}
                                                                    @else
                                                                    User Not Found
                                                                    @endif
                                                                </td>
                                                                {{-- <td>{{ $item->discounted_price }}</td>
                                                                <td>{{ $item->item_count }}</td> --}}
                                                                <td>{{ $order->price_after_coupon}}
                                                                </td>
                                                                <td>
                                                                    @if ($order->user)
                                                                    {{ $order->user->address }}
                                                                    @else
                                                                    Not Found
                                                                    @endif
                                                                </td>
                                                                <td>{{ $order->order_status }}</td>
                                                                <td>
                                                                    <form action="{{ route('adm.view.order',['id'=>$order->id]) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#gridSystemModalView1{{ ' id' }}">
                                                                            View Detalis</button>
                                                                    </form>
                                                                    <br>

                                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#gridSystemModalUpdate{{ $order->id }}">Update Status</button>

                                                                    <div id="gridSystemModalUpdate{{ $order->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    @if ($order->user)
                                                                                    <h5 class="modal-title" id="gridModalLabel"> {{ $order->user->username }}</h5>
                                                                                    @else
                                                                                    <h5 class="modal-title" id="gridModalLabel">User not Found</h5>
                                                                                    @endif
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.order.status',['id'=>$order->id]) }}">
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
                                                    @else
                                                    <h6 class="text-danger mt-4">Order not Found</h6>
                                                    @endif
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
    </div>
</div>
@include('admin.footer')

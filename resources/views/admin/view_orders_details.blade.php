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
                                    <h5 class="m-b-10">View Orders</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="#">View Order Details</a></li>
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
                                        <h5>View Order Detail</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        <div class="table-responsive">
                                            {{-- <table class="table" id="pc-dt-simple"> --}}
                                            <table class="table" id="pc-dt">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Order ID</th>
                                                            <td>{{ $order->order_num }}</td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th scope="row">User ID</th>
                                                            <td>{{ $order->user_id }}</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <th scope="row">Product Name</th>
                                                            <td>{{ $product->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Brand Name</th>
                                                            <td>{{ $brand->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Category</th>
                                                            <td>{{ $category->name}}</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <th scope="row">Company</th>
                                                            <td>{{ $product->model }}</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <th scope="row">Color</th>
                                                            <td>{{ $product->colors }}</td>
                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <th scope="row">Product Year</th>
                                                            <td>{{ $product->year }}</td>

                                                        </tr> --}}
                                                        {{-- <tr>
                                                            <th scope="row">Original Price </th>
                                                            <td>{{ $item->original_price }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Discounted Price</th>
                                                            <td>{{ $item->discounted_price }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Item quantity</th>
                                                            <td>{{ $item->item_count }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total Price</th>
                                                            <td>{{ $item->total_price }}</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <th scope="row">Offer Name</th>
                                                            <td>{{ $order->coupon_name ?? "N/A" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Discount in %</th>
                                                            <td>{{ $order->discount_percentage ?? "N/A" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Coupon Code</th>
                                                            <td>{{ $order->coupon_code ?? "N/A" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Price before Offer</th>
                                                            <td>₹ {{ $order->total_price ?? "N/A" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Price After Offer</th>
                                                            <td>₹ {{ $order->price_after_coupon ?? "N/A" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Estimate Date</th>
                                                            <td>{{ $order->estimate_date }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Order Status</th>
                                                            <td>{{ $order->order_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Created Order</th>
                                                            <td>{{ \Carbon\Carbon::parse( $order->created_at)->format('h:i:s A d-m-Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Updated Order</th>
                                                            <td>{{ \Carbon\Carbon::parse($order->updated_at)->format('h:i:s A d-m-Y') }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Order Items</h5>
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
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Original Price</th>
                                                        <th>Discounted Price</th>
                                                        <th>Item Count</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($items as $item )
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <div class="user-icon">
                                                                <img src="{{ asset('uploads/Products Images/'.$item->product->image) }}" style="height: 50px; width: 50px;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($item->product->name)
                                                            {{ $item->product->name ?? 'N/A' }}
                                                            @else
                                                            N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->original_price)
                                                            {{ $item->original_price ?? 'N/A' }}
                                                            @else
                                                            N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->discounted_price)
                                                            {{ $item->discounted_price ?? 'N/A' }}
                                                            @else
                                                            N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->item_count)
                                                            {{ $item->item_count ?? 'N/A' }}
                                                            @else
                                                            N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->total_price)
                                                            {{ $item->total_price ?? 'N/A' }}
                                                            @else
                                                            N/A
                                                            @endif
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
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>User Detail</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="table-responsive">
                                            {{-- <table class="table" id="pc-dt-simple"> --}}
                                            <table class="table" id="pc-dt-">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">First Name</th>
                                                            <td>{{ $user->first_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Last Name</th>
                                                            <td>{{ $user->last_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Phone</th>
                                                            <td>{{ $user->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Email</th>
                                                            <td>{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address</th>
                                                            <td>{{ $user->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">City</th>
                                                            <td>{{ $user->city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">State</th>
                                                            <td>{{ $user->state}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Order Address Detail</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="table-responsive">
                                            {{-- <table class="table" id="pc-dt-simple"> --}}
                                            <table class="table" id="pc-dt-">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Name</th>
                                                            <td>{{ $address->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address Line 1</th>
                                                            <td>{{ $address->address_line1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Address Line 2 </th>
                                                            <td>{{ $address->address_line2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Near By</th>
                                                            <td>{{ $address->near_by }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">City</th>
                                                            <td>{{ $address->city }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">State</th>
                                                            <td>{{ $address->state }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Country</th>
                                                            <td>{{ $address->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Pin Code</th>
                                                            <td>{{ $address->pin }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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

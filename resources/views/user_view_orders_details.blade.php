@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>View Order</h2>
                        <span> <a href="{{ route('home') }}">Home</a> - View Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart -->

<section class="section-cart padding-t-40 mb-3 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="row">
                        <form action="#">
                            <div class="table-responsive-md">

                                <table class="table table-striped">
                                    {{-- <h6 class="display-6">Order Detail</h6> --}}
                                    <tbody>
                                        <tr>
                                            <th scope="row">Order ID</th>
                                            <td>{{ $order->order_num }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Price</th>
                                            <td>Rs. {{ $order->price_after_coupon }}</td>
                                        </tr>
                                        <tr>
                                            @if($order->order_status == 'delivered' || $order->order_status == 'cancelled')
                                            <th scope="row">Estimate Date</th>
                                            <td>{{"N/A" }}</td>
                                            @else
                                            <th scope="row">Estimate Date</th>
                                            <td>{{ $order->estimate_date }}</td>
                                            @endif
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-cart padding-t-40 mb-3 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="row">
                        <form action="#">
                            <div class="cr-table-content">
                                <table>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

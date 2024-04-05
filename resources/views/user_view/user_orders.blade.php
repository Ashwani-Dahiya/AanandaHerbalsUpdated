@extends('layouts.user_view')


@yield('content')

@section('user')
<div class="col-lg-9 col-12 md-30 cr-product-box" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">




    <section class="section-cart padding-t-40 mb-3">
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
                                                <th>Sr. No.</th>
                                                <th>Order ID</th>
                                                <th>Order Date</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=0;
                                            @endphp
                                            @foreach ($orders as $order)
                                            @php
                                            $i++;
                                            @endphp
                                             <tr>
                                                <td>
                                                    {{ $i }}
                                                </td>
                                                <td>
                                                    {{ $order->order_num }}
                                                </td>
                                                <td>
                                                    {{ optional($order->created_at)->format('d-m-Y g:i:s A') }}
                                                </td>

                                                <td class="cr-cart-price">
                                                    ₹ {{ $order->total_price }}
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

</div>

@endsection

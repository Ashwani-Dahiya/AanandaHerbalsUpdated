@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Your Orders</h2>
                        <span> <a href="{{ route('home') }}">Home</a> - Orders</span>
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
                            <div class="cr-table-content">
                                @if($orders->isNotEmpty())
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Order ID</th>
                                            <th>Total Price</th>
                                            <th>Order Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
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
                                            <td class="cr-cart-price">
                                                ₹ {{ $order->total_price }}
                                            </td>
                                            <td>
                                                {{ $order->order_status }}
                                            </td>
                                            <td>
                                                {{ optional($order->created_at)->format('d-m-Y g:i:s A') }}
                                            </td>
                                            <td>
                                                <style>
                                                    .button {
                                                        padding: 10px;
                                                        font-size: 13px;
                                                        border-radius: 5px;
                                                        border: none;
                                                        margin: 4px;
                                                    }

                                                </style>
                                                <div class="d-flex algin-items-center">
                                                    <a href="{{ route('user.view.order.details',['id'=>$order->id]) }}" class="button text-white" style="background-color: #64b496; text-decoration:none;">view
                                                    </a>
                                                    <br>
                                                    @if ($order->order_status != 'cancelled' && $order->order_status != 'delivered')
                                                    <button type="button" class="button bg-danger text-white" data-bs-toggle="modal" data-bs-target="#myModal{{ $order->id }}">Cancel</button>
                                                    @endif


                                                </div>

                                            </td>
                                        </tr>


                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <h6 class="display-6">No Order Found !</h6>
                                        <div class="cr-cart-update-bottom d-flex justify-content-end">
                                            <a href="{{ route('home') }}" class="cr-links">Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($orders as $order)
<!-- The Modal -->
<div class="modal" id="myModal{{$order->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">{{ $order->order_num }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-body">
                    <h5 class="text-center">Why you cancel this order ?</h5>
                </div>
                <form action="{{ route('user.cancel.order',['id'=>$order->id]) }}" method="POST">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlSelect1" id="selectLabel{{$order->id}}">Select your reason</label>
                        <select class="form-control" name="reason" id="select{{$order->id}}">
                            <option selected>Select</option>
                            @foreach ($reasons as $reason )
                            <option>{{ $reason->reason }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group mt-4 mb-4">
                        <label class="form-check-label">Other </label>
                        <input class="form-check-input" type="checkbox" id="check{{$order->id}}">


                    </div>
                    <div id="textArea{{$order->id}}" style="display: none;">
                        <textarea class="form-control" name="reason"></textarea>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="button bg-danger text-white">Submit</button>
            </div>
            </form>

        </div>
    </div>
</div>

<script>
    // JavaScript code to show/hide textarea based on checkbox state
    document.getElementById('check{{$order->id}}').addEventListener('change', function() {
        var selectLabel = document.getElementById('selectLabel{{$order->id}}');
        var select = document.getElementById('select{{$order->id}}');
        var textArea = document.getElementById('textArea{{$order->id}}');

        if (this.checked) {
            selectLabel.style.display = 'none';
            select.style.display = 'none';
            textArea.style.display = 'block';
        } else {
            selectLabel.style.display = 'block';
            select.style.display = 'block';
            textArea.style.display = 'none';
        }
    });

</script>
@endforeach


@endsection

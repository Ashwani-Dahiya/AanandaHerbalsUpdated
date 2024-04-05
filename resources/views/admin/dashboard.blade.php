@include('admin.header')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5>All Time Orders</h5>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Pending</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $pending }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Accepted</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $accepted }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Shipped</h6>
                        <h5 class="text-end text-white"><i class="feather icon-tag float-start"></i><span></span>{{ $shipped }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Delivered</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $delivered }}</h5>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Shipped</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $shipped }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Products</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $products }}</h5>
                    </div>
                </div>
            </div> --}}
        </div>
        <h5>Total</h5>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Pending</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $pending }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Accepted</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $accepted }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Shipped</h6>
                        <h5 class="text-end text-white"><i class="feather icon-tag float-start"></i><span></span>{{ $shipped }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Delivered</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $delivered }}</h5>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Shipped</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $shipped }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Products</h6>
                        <h5 class="text-end text-white"><i class="feather icon-user float-start"></i><span></span>{{ $products }}</h5>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
</div>

@include('admin.footer')

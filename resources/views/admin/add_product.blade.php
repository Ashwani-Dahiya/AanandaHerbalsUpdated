@include('admin.header')
<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }

</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Add Product</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.add.product.page') }}p">Add
                                            Product</a></li>
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
                                        <h5>Add new Product</h5>
                                    </div>
                                    <div class="card-block table-border-style">

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




                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.add.product') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Select Category</label>
                                                    <select name="category_id" class="form-control form-select" required>
                                                        <option value="0">Select Category</option>
                                                        @foreach ($categories as $categorie )
                                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}
                                                        </option>

                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Brand</label>
                                                    <select name="brand_id" class="form-control form-select" required>
                                                        <option value="0">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Product Name</label>
                                                    <input class="form-control" type="text" name="product_name" required>
                                                    @if ($errors->has('product_name'))
                                                    <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Photo 1</label>
                                                    <input class="form-control" type="file" name="product_image" required>
                                                    @if ($errors->has('product_image'))
                                                    <p class="text-danger">{{ $errors->first('product_image') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Photo 2</label>
                                                    <input class="form-control" type="file" name="product_image_2">
                                                    @if ($errors->has('product_image_2'))
                                                    <p class="text-danger">{{ $errors->first('product_image_2') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Photo 3</label>
                                                    <input class="form-control" type="file" name="product_image_3">
                                                    @if ($errors->has('product_image_3'))
                                                    <p class="text-danger">{{ $errors->first('product_image_3') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Photo 4</label>
                                                    <input class="form-control" type="file" name="product_image_4">
                                                    @if ($errors->has('product_image_4'))
                                                    <p class="text-danger">{{ $errors->first('product_image_4') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Photo 5</label>
                                                    <input class="form-control" type="file" name="product_image_5">
                                                    @if ($errors->has('product_image_5'))
                                                    <p class="text-danger">{{ $errors->first('product_image_5') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Product model</label>
                                                    <input class="form-control" type="text" name="model" required>
                                                    @if ($errors->has('model'))
                                                    <p class="text-danger">{{ $errors->first('model') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Colors</label>
                                                    <input class="form-control" type="text" name="color" required value="White">
                                                    @if ($errors->has('color'))
                                                    <p class="text-danger">{{ $errors->first('color') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Price</label>
                                                    <input class="form-control" type="number" name="price" required>
                                                    @if ($errors->has('price'))
                                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Discounted Price</label>
                                                    <input class="form-control" type="number" name="discounted_price" required>
                                                    @if ($errors->has('discounted_price'))
                                                    <p class="text-danger">{{ $errors->first('discounted_price') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Warranty</label>
                                                    <input class="form-control" type="number" name="warranty" required>
                                                    @if ($errors->has('warranty'))
                                                    <p class="text-danger">{{ $errors->first('warranty') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Year</label>
                                                    <input class="form-control" type="number" name="year" required>
                                                    @if ($errors->has('year'))
                                                    <p class="text-danger">{{ $errors->first('year') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Available Products</label>
                                                    <input class="form-control" type="number" name="available_products" required>
                                                    @if ($errors->has('available_products'))
                                                    <p class="text-danger">{{ $errors->first('available_products') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Sold Count</label>
                                                    <input class="form-control" type="number" name="sold_count" required>
                                                    @if ($errors->has('sold_count'))
                                                    <p class="text-danger">{{ $errors->first('sold_count') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Delivery Charges</label>
                                                    <input class="form-control" type="number" name="delivery_charges" required>
                                                    @if ($errors->has('delivery_charges'))
                                                    <p class="text-danger">{{ $errors->first('delivery_charges') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <label>About1</label>
                                                    <textarea class="form-control" name="about1" rows="5"></textarea>
                                                    @if ($errors->has('about1'))
                                                    <p class="text-danger">{{ $errors->first('about1') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <label>About2</label>
                                                    <textarea class="form-control" name="about2" rows="5"></textarea>
                                                    @if ($errors->has('about2'))
                                                    <p class="text-danger">{{ $errors->first('about2') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary btn-lg" type="submit" name="btnsave">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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

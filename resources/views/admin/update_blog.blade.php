@include('admin.header');
@php
$i=0;
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
                                    <h5 class="m-b-10">Update Blog</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.blog.page') }}">
                                            Update</a></li>
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
                                        <h5>Update Blog</h5>
                                    </div>
                                    <div class="card-block table-border-style">


                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <form enctype="multipart/form-data" action="{{ route('adm.update.blog',['id'=>$blog->id]) }}" method="POST" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12 text-center">
                                                    <div class="form-group">
                                                        <img class="rounded" src="{{ asset('uploads/Blog Images/'.$blog->image) }}" alt="" width="200" height="200">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input class="form-control" type="text" name="title" value="{{ $blog->title }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Short-Title</label>
                                                        <textarea rows="20" class="form-control" name="short_title">{{ $blog->short_title }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">About</label>
                                                        <textarea rows="20" class="form-control" name="about" >{{ $blog->about }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Long About </label>
                                                        <textarea rows="20" class="form-control"  name="long_about">{{ $blog->long_about }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Date</label>
                                                        <input class="form-control" type="date" name="date" value="{{ $blog->date }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="input1" class="form-label">Banner Image</label>
                                                        <input type="file" class="form-control" name="image" id="input1" required>
                                                        @if ($errors->has('image'))
                                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-4">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
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

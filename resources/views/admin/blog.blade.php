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
                                    <h5 class="m-b-10">Blog Page</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.blog.page') }}">
                                            Blog Page</a></li>
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
                                        <h5>Add Blog</h5>
                                    </div>
                                    <div class="card-block table-border-style">


                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.insert.blog') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input class="form-control" type="text" name="title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Short-Title</label>
                                                        <textarea rows="20" class="form-control" type="text" name="short_title"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">About</label>
                                                        <textarea rows="20" class="form-control" type="text" name="about"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Long About </label>
                                                        <textarea rows="20" class="form-control" type="text" name="long_about"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Date</label>
                                                        <input class="form-control" type="date" name="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="input1" class="form-label">Banner Image</label>
                                                        <input type="file" class="form-control" name="image" id="input1">
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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Sections</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">


                                            @if (session('danger'))
                                            <div class="alert alert-danger">
                                                {{ session('danger') }}

                                            </div>
                                            @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($lists as $list )
                                                    @php
                                                    $i++;
                                                    @endphp

                                                    <tr>
                                                        <td>
                                                            {{ $i }}
                                                        </td>
                                                        <td>
                                                            {{ $list->title }}
                                                        </td>


                                                        <td>
                                                            <div class="user-icon">

                                                                <img src="{{ asset('uploads/Blog Images/'.$list->image) }}" style="height: 50px; width: 50px;">

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $list->date }}
                                                        </td>
                                                        <td>
                                                            <form action="{{ route('adm.update.blog.page', ['id' => $list->id]) }}" method="POST">
                                                                @csrf
                                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                        </form>
                                                            <form method="post" action="{{ route('adm.del.blog', ['id' => $list->id]) }}" onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-danger mt-1 ">
                                                                    Delete
                                                                </button>
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

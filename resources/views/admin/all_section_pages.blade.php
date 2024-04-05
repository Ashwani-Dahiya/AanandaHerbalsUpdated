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
                                    <h5 class="m-b-10">Home Sections</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.home.section.page') }}">Home Sections</a></li>
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
                                        <h5>Add Home Sections</h5>
                                    </div>
                                    <div class="card-block table-border-style">


                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif


                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.add.section') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Sequence</label>
                                                        <input class="form-control" type="number" name="seq" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <button class="btn btn-primary" type="submit" name="btnsave">Submit</button>
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
                                            @if (session('del_success'))
                                            <div class="alert alert-success">
                                                {{ session('del_success') }}
                                            </div>
                                            @endif
                                            @if (session('update_success'))
                                            <div class="alert alert-success">
                                                {{ session('update_success') }}
                                            </div>
                                            @endif
                                            @if (session('del_error'))
                                            <div class="alert alert-danger">
                                                {{ session('del_error') }}
                                            </div>
                                            @endif
                                            @if (session('update_error'))
                                            <div class="alert alert-danger">
                                                {{ session('update_error') }}
                                            </div>
                                            @endif

                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Sequence</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $i=0;
                                                    @endphp
                                                    @foreach ($sections as $section)
                                                    <tr>
                                                        @php
                                                        $i++;
                                                        @endphp
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $section->name }}</td>

                                                        <td>{{ $section->seq }}</td>

                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal{{ $section->id }}">Update</button>
                                                            <div id="gridSystemModal{{ $section->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="gridModalLabel">{{ $section->name }}</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.section',['id'=>$section->id]) }}">
                                                                                @csrf
                                                                                @method('POST')

                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Category Name</label>
                                                                                            <input type="text" class="form-control" name="name" value="{{ $section->name }}">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1" class="form-label">Seq</label>
                                                                                            <input type="text" class="form-control" name="seq" value="{{ $section->seq }}">
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
                                                            <form method="post" enctype="multipart/form-data" action="{{ route('adm.del.section',['id' => $section->id]) }}" onsubmit="return confirm('Are you sure you want to delete this section?')">
                                                                @csrf
                                                                @method('POST')
                                                                <input type="hidden" value="{{ $section->id }}" name="id">
                                                                <input type="submit" class="btn btn-danger" name="Apply" value="Delete" style="padding: 0px 10px;">
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

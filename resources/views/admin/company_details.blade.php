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
                                    <h5 class="m-b-10">Company Details</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.offer.page') }}">Details</a></li>
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
                                        <h5>Update Company Details</h5>
                                    </div>
                                    <div class="card-block table-border-style">

                                        @if(session('success'))
                                        <div id="session-alert" class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif


                                        @if(session()->has('error'))
                                        <div id="session-alert" class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif


                                        <form method="post" enctype="multipart/form-data" action="{{ route('adm.update.company.details') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Name</label>
                                                        <input class="form-control" type="text" name="comp_name" value="{{ $info->company_name}}" required>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Web-Title</label>
                                                        <input class="form-control" type="text" name="comp_web_title" value="{{ $info->web_title}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Mobile 1</label>
                                                        <input class="form-control" type="text" name="comp_mob_1" value="{{ $info->company_mobile_1}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Mobile 2</label>
                                                        <input class="form-control" type="text" name="comp_mob_2" value="{{ $info->company_mobile_2}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Email 2</label>
                                                        <input class="form-control" type="text" name="comp_email_1" value="{{ $info->company_email_1}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Email 2</label>
                                                        <input class="form-control" type="text" name="comp_email_2" value="{{ $info->company_email_2}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Website</label>
                                                        <input class="form-control" type="text" name="comp_website" value="{{ $info->company_website}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Address</label>
                                                        <input class="form-control" type="text" name="comp_address" value="{{ $info->company_address}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Map-Link</label>
                                                        <textarea class="form-control" rows="10" name="comp_map_link" required>{{ $info->company_map_link}} </textarea>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" type="submit">Update</button>
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

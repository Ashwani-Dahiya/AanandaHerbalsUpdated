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
                                    <h5 class="m-b-10">All Users</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('adm.all.user') }}">All Users</a>
                                    </li>
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
                                        <h5>List of All Users</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">


                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>Wallet Amount</th>
                                                        <th>Register Date</th>
                                                        <th>Login by</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @foreach ($user as $users)
                                                        <tr>

                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <td>{{ $i }}</td>
                                                            <td>
                                                                <div class="user-icon">
                                                                    <img src="user_icon.png"
                                                                        style="height: 50px; width: 50px;">
                                                                </div>
                                                            </td>
                                                            <td>{{ $users->username }}</td>
                                                            <td>{{ $users->username }}</td>
                                                            @if ($users->phone)
                                                                <td>{{ $users->phone }}</td>
                                                            @else
                                                                <td>{{ 'N/A' }}</td>
                                                            @endif
                                                            <td>{{ $users->email }}</td>
                                                            <td>{{ $users->simple_password }}</td>
                                                            <td>{{ $users->username }}</td>
                                                            <td>{{ $users->created_at }}</td>
                                                            <td>{{ $users->login_via }}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#gridSystemModal{{ $users->id }}">Active/Deactive</button>
                                                                <div class="modal fade"
                                                                    id="gridSystemModal{{ $users->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="gridModalLabel">
                                                                                    Active/Decative</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post"
                                                                                    enctype="multipart/form-data">
                                                                                    <input type="hidden" value=""
                                                                                        <div class="row">
                                                                                    <div class="col-md-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <label for="input1"
                                                                                                class="form-label">Select</label>
                                                                                            <select name="name"
                                                                                                class="form-control"
                                                                                                required="">
                                                                                                <option value="1">
                                                                                                    Active
                                                                                                </option>
                                                                                                <option value="0">
                                                                                                    Block
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <input type="submit"
                                                                                    class="btn btn-success"
                                                                                    name="update" value="Update">
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <button type="button"
                                                                                    class="btn  btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                        </div>
                                    </div>
                                    </td>
                                    @endforeach
                                    </tr>

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

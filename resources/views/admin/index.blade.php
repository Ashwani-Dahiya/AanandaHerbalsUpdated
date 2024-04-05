<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <link rel="icon" href="{{ asset('adm/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adm/css/style.css') }}">
</head>

@if (session('error'))
    <script>
        alert('{{ session('error') }}')
    </script>
@endif
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ asset('img/logo/ecomlogo.png') }}" class="img-fluid mb-4" style="width: 100px;">
                        <h4 class="mb-3 f-w-400">Signin</h4>
                        <form action="{{ route('adm.login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                <input type="email" class="form-control" name="username" placeholder="Email address">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                    <label for="checkbox-fill-a1" class="cr">Save credentials</label>
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn btn-block btn-primary mt-2 mb-4">Signin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/menu-setting.js') }}"></script>

</body>

</html>

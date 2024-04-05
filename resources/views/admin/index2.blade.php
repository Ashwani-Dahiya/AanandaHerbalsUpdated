
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Momo Magic Masti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                    <img src="../logo.png" class="img-fluid mb-4" style="width: 100px;">
                        <h4 class="mb-3 f-w-400">Signin</h4>
                        <?php
                        if (isset($_POST["login"])) {

                            $uid = mysqli_real_escape_string($link, $_POST["uid"]);
                            $upass = mysqli_real_escape_string($link, $_POST["password"]);
                            $enrypt = md5($upass);
                            $que = "select * from tbl_admin where email='$uid' and mdpass='$enrypt' and type='frei'";
                            // echo $que;
                            $result = mysqli_query($link, $que);
                            if (mysqli_num_rows($result) > 0) {
                                $data = mysqli_fetch_array($result);
                                $_SESSION["superid"] = $data['id'];
                                $_SESSION["supername"] = $data['name'];
                                header("location:dashboard.php");
                            } else {
                        ?>
                                <p class="label label-danger" style="padding:5px; color:#fff;"><strong>Invalid Username or Password</strong></p>
                        <?php
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                <input type="email" class="form-control" name="uid" placeholder="Email address">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                    <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                    <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
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


<script src="../assets/js/plugins/bootstrap.min.js"></script>
<script src="../assets/js/menu-setting.js"></script>
<script>
    (function() {
        var js = "window['__CF$cv$params']={r:'78fb47812a315c02',m:'iZhInbaB3quLcsmGL4PorCklrOm9lHwj7KvlDxrQseE-1674757402-0-ARCHuznQLlW6PRdXlUs06jLTI58Y6sl/VmMsZsRI/REqyUCuWFRFDIddD/U3YKq29im/RSKv6h75O/ZJPdx1Uvhxil/cT5IVOnPJx1jynj1zymoVOawhOlR+U7oowg85CZQOajkHvM5drq2ewSw3n9myf+Nc2pW2rCJbznx2ZqgPe3KE+pi9Dkp2opDocEYGeRS0CQUxe7FoTMTdiKYd5Kk=',s:[0xe53e39332c,0x8ca166c719],u:'https/codedthemescom/cdn-cgi/challenge-platform/h/g_4063292.html'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='https/codedthemescom/cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible_3932226.js'+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
        var _0xh = document.createElement('iframe');
        _0xh.height = 1;
        _0xh.width = 1;
        _0xh.style.position = 'absolute';
        _0xh.style.top = 0;
        _0xh.style.left = 0;
        _0xh.style.border = 'none';
        _0xh.style.visibility = 'hidden';
        document.body.appendChild(_0xh);

        function handler() {
            var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
            if (_0xi) {
                var _0xj = _0xi.createElement('script');
                _0xj.nonce = '';
                _0xj.innerHTML = js;
                _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
            }
        }
        if (document.readyState !== 'loading') {
            handler();
        } else if (window.addEventListener) {
            document.addEventListener('DOMContentLoaded', handler);
        } else {
            var prev = document.onreadystatechange || function() {};
            document.onreadystatechange = function(e) {
                prev(e);
                if (document.readyState !== 'loading') {
                    document.onreadystatechange = prev;
                    handler();
                }
            };
        }
    })();
</script>
</body>

</html>

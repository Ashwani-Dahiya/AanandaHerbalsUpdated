<?php
include 'header.php';
?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Add Franchise</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Add Franchise</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Franchise</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST["btnsave"])) {

                                            $name = mysqli_real_escape_string($link, $_REQUEST['name']);
                                            $phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
                                            $email = mysqli_real_escape_string($link, $_REQUEST['email']);
                                            $password = mysqli_real_escape_string($link, $_REQUEST['password']);
                                            $city = mysqli_real_escape_string($link, $_REQUEST['city']);
                                            $address = mysqli_real_escape_string($link, $_REQUEST['address']);
                                            $enrypt = md5($password);
                                            $queryy = "insert into tbl_admin (type, email, phone, password, name, mdpass, city, address) values('frei', '$email', '$phone', '$password', '$name', '$enrypt', '$city', '$address')";
                                            // echo $queryy;
                                            $result = mysqli_query($link, $queryy);
                                            if (mysqli_affected_rows($link)) {
                                        ?>
                                                <div class="alert alert-success bg-success text-white" role="alert">Added successfully.</div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Try again.</div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <form method="post" class="mt-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" placeholder="Full name" name="name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" class="form-control" placeholder="Phone number" name="phone" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder="Email address" name="email" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" placeholder="City" name="city" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control" placeholder="Address" name="address" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="btnsave" value="Submit">
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

<?php
include 'footer.php';
?>
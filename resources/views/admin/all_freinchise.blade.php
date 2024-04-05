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
                                    <h5 class="m-b-10">All Franchise</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Franchise</a></li>
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
                                        <h5>List of Franchise</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <?php
                                            if (isset($_POST["update"])) {

                                                $name = mysqli_real_escape_string($link, $_REQUEST['name']);
                                                $phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
                                                $email = mysqli_real_escape_string($link, $_REQUEST['email']);
                                                $password = mysqli_real_escape_string($link, $_REQUEST['password']);
                                                $status = mysqli_real_escape_string($link, $_REQUEST['status']);
                                                $city = mysqli_real_escape_string($link, $_REQUEST['city']);
                                                $address = mysqli_real_escape_string($link, $_REQUEST['address']);
                                                $enrypt = md5($password);
                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_admin set name='$name', phone='$phone', email='$email', password='$password', mdpass='$enrypt', status='$status', city='$city', address='$address' where id='$bill' ";
                                                //echo $queryy;
                                                $result = mysqli_query($link, $queryy);
                                                if ($queryy) {
                                            ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Updated successfully.</div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Not successfully try submitting again.</div>
                                                <?php
                                                }
                                            }
                                            if (isset($_POST["Apply"])) {
                                                $bill = $_POST['id'];
                                                $result = mysqli_query($link, "DELETE FROM tbl_admin where id=$bill ");
                                                if ($result) {
                                                ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Delete successfully.</div>
                                                <?php
                                                } else {
                                                ?>
                                                    <p class="label label-danger"> Error. </p>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>SR.</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Password</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from tbl_admin where type!='admin' order by id desc");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php echo $row['phone']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $row['password']; ?></td>
                                                            <td><?php echo $row['city']; ?></td>
                                                            <td><?php echo $row['address']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] == "0") {
                                                                ?>
                                                                    <div><label class="badge bg-success">Active</label></div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div><label class="badge bg-Warning">Blocked</label></div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal<?= $row['id']; ?>">Update</button>
                                                                <div id="gridSystemModal<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="gridModalLabel"><?php echo $row['name']; ?></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Name</label>
                                                                                                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Phone</label>
                                                                                                <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Email</label>
                                                                                                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Password</label>
                                                                                                <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">City</label>
                                                                                                <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $row['city']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Status</label>
                                                                                                <select name="status" class="form-control">
                                                                                                    <option value="0" <?php if ($row['status'] == "0") echo "selected"; ?>>Active</option>
                                                                                                    <option value="1" <?php if ($row['status'] == "1") echo "selected"; ?>>Block</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Address</label>
                                                                                                <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $row['address']; ?>">
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
                                                                <form method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                    <input type="submit" class="btn btn-danger" name="Apply" value="Delete" style="padding: 0px 10px;">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>

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

<?php
include 'footer.php';
?>
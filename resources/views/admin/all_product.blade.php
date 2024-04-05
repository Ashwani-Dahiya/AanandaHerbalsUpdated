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
                                    <h5 class="m-b-10">All Products</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Products</a></li>
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
                                        <h5>List of Products</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <?php
                                            if (isset($_POST["update"])) {

                                                $bill = $_POST['id'];
                                                $category = mysqli_real_escape_string($link, $_REQUEST['category']);
                                                $pro_name = mysqli_real_escape_string($link, $_REQUEST['pro_name']);
                                                $description = mysqli_real_escape_string($link, $_REQUEST['description']);
                                                $status = mysqli_real_escape_string($link, $_REQUEST['status']);

                                                $oldfile =  mysqli_real_escape_string($link, $_REQUEST['oldfile']);
                                                if (empty($_FILES['thumb']['tmp_name']) || !is_uploaded_file($_FILES['thumb']['tmp_name'])) {
                                                    $thumb = $oldfile;
                                                } else {
                                                    $imagno = $_FILES['thumb']['name'];
                                                    $ran = rand(9999999, 99999999999);
                                                    $imagename = $ran . $imagno;
                                                    $source = $_FILES['thumb']['tmp_name'];
                                                    $target = "uploads/" . $imagename;
                                                    move_uploaded_file($source, $target);

                                                    $thumb = $imagename;
                                                    $save = "uploads/" . $thumb; //This is the new file you saving
                                                    $file = "uploads/" . $thumb; //This is the original file
                                                    $thumb = "uploads/" . $thumb;
                                                    list($width, $height) = getimagesize($file);

                                                    $tn = imagecreatetruecolor($width, $height);

                                                    //$image = imagecreatefromjpeg($file);
                                                    $info = getimagesize($target);
                                                    if ($info['mime'] == 'image/jpeg') {
                                                        $image = imagecreatefromjpeg($file);
                                                    } elseif ($info['mime'] == 'image/gif') {
                                                        $image = imagecreatefromgif($file);
                                                    } elseif ($info['mime'] == 'image/png') {
                                                        $image = imagecreatefrompng($file);
                                                    }

                                                    imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height);
                                                    imagejpeg($tn, $save, 40);
                                                }

                                                $queryy = "update tbl_product set category='$category', pro_name='$pro_name', description='$description', file='$thumb', status='$status' where id='$bill' ";
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
                                                $result = mysqli_query($link, "DELETE FROM tbl_product where id=$bill ");
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
                                                        <th>Sr.</th>
                                                        <th>Photo</th>
                                                        <th>Category</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from tbl_product order by id desc");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td>
                                                                <div class="user-icon">
                                                                    <?php
                                                                    if ($row['file'] == "") {
                                                                    ?>
                                                                        <img src="no_file.png" style="height: 50px; width: 50px;">
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="<?php echo $row['file']; ?>" style="height: 50px; width: 50px;">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $uuuu = $row['category'];
                                                                $au = mysqli_query($link, "select * from tbl_category WHERE id='$uuuu'");
                                                                $o = mysqli_fetch_array($au);
                                                                echo $o['cat_name'];
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row['pro_name']; ?></td>
                                                            <td><?php echo $row['description']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] == 0) {
                                                                ?>
                                                                    <div><label class="badge bg-success">Active</label></div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div><label class="badge bg-danger">Blocked</label></div>
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
                                                                                <h5 class="modal-title" id="gridModalLabel"><?php echo $row['pro_name']; ?></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Select Category</label>
                                                                                                <select name="category" class="form-control form-select" required="">
                                                                                                    <option value="0">Select Category</option>
                                                                                                    <?php
                                                                                                    $q = mysqli_query($link, "select * from tbl_category");
                                                                                                    while ($datac = mysqli_fetch_array($q)) {
                                                                                                    ?>
                                                                                                        <option value="<?= $datac['id']; ?>" <?php if ($datac['id'] == $row['category']) echo "selected"; ?>><?= $datac['cat_name']; ?></option>
                                                                                                    <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Product Name</label>
                                                                                                <input class="form-control" type="text" name="pro_name" required="" value="<?= $row['pro_name']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-8 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Photo</label>
                                                                                                <input class="form-control" type="file" name="thumb">
                                                                                                <input class="form-control" type="hidden" name="oldfile" value="<?= $row['file']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <img src="<?= $row['file']; ?>" style="width: 100px; height: 100px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Description</label>
                                                                                                <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Status</label>
                                                                                                <select name="status" class="form-control form-select">
                                                                                                    <option value="0" <?php if ($row['status'] == "0") echo "selected"; ?>>Active</option>
                                                                                                    <option value="1" <?php if ($row['status'] == "1") echo "selected"; ?>>Block</option>
                                                                                                </select>
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
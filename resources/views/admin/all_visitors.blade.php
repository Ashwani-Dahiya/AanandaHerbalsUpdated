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
                                    <h5 class="m-b-10">All Visitors</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Visitors</a></li>
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
                                        <h5>List of Visitors</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <?php
                                            if (isset($_POST["update"])) {
                                                $remark = mysqli_real_escape_string($link, $_REQUEST['remark']);

                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_student set remark='$remark' where id='$bill' ";
                                                //echo $queryy;
                                                $result = mysqli_query($link, $queryy);
                                                if ($queryy) {
                                            ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Remark Added successfully.</div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Not successfully try submitting again.</div>
                                            <?php
                                                }
                                            }

                                            if (isset($_POST["book_demo"])) {
                                                $demo_date = mysqli_real_escape_string($link, $_REQUEST['demo_date']);
                                                $demo_time = mysqli_real_escape_string($link, $_REQUEST['demo_time']);

                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_student set demo='1', demo_date='$demo_date', demo_time='$demo_time' where id='$bill' ";
                                                //echo $queryy;
                                                $result = mysqli_query($link, $queryy);
                                                if ($queryy) {
                                            ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Demo Added successfully.</div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Not successfully try submitting again.</div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Photo</th>
                                                        <th>Tocken No.</th>
                                                        <th>Name</th>
                                                        <th>F. Name</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Remark</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sss = "select * from tbl_student where visitor='1' and demo='0' order by id desc";
                                                    $result = mysqli_query($link, $sss);
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
                                                                        <img src="user_icon.png" style="height: 50px; width: 50px;">
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="../<?php echo $row['file']; ?>" style="height: 50px; width: 50px;">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row['full_name']; ?></td>
                                                            <td><?php echo $row['father_name']; ?></td>
                                                            <td><?php echo $row['phone1']; ?></td>
                                                            <td>
                                                                <div><label class="badge bg-success">Active</label></div>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row['remark'] != "") {
                                                                ?>
                                                                    <?= $row['remark']; ?>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div><label class="badge bg-danger">No Remark</label></div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="view_visitor.php?id=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-info mr-1">
                                                                    View Details
                                                                </a>

                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal<?= $row['id']; ?>">Add Remark</button>
                                                                <div id="gridSystemModal<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="gridModalLabel">Add Remark (<?php echo $row['full_name']; ?>)</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Remark</label>
                                                                                                <textarea name="remark" class="form-control" rows="10"><?php echo $row['remark']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                            <input type="submit" class="btn btn-success" name="update" value="Update Remark">
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

                                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#gridSystemModalbook<?= $row['id']; ?>">Book Demo</button>
                                                                <div id="gridSystemModalbook<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="gridModalLabel">Book Demo (<?php echo $row['full_name']; ?>)</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Demo Date</label>
                                                                                                <input type="date" class="form-control" name="demo_date" value="<?php echo $row['demo_date']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Demo Time</label>
                                                                                                <input type="text" class="form-control" name="demo_time" value="<?php echo $row['demo_time']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 col-xs-6">
                                                                                            <input type="submit" class="btn btn-success" name="book_demo" value="Book Now">
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
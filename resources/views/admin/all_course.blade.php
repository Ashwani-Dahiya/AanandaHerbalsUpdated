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
                                    <h5 class="m-b-10">Courses</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Course</a></li>
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
                                        <h5>Add Course</h5>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($_POST["btnsave"])) {

                                            $name = mysqli_real_escape_string($link, $_REQUEST['name']);
                                            $duration = mysqli_real_escape_string($link, $_REQUEST['duration']);
                                            $batch = mysqli_real_escape_string($link, $_REQUEST['batch']);

                                            $queryy = "insert into tbl_course (course_name, duration, batch) values('$name', '$duration', '$batch')";
                                            //echo $queryy;
                                            $result = mysqli_query($link, $queryy);
                                            if (mysqli_affected_rows($link)) {
                                        ?>
                                                <div class="alert alert-success bg-success text-white" role="alert">Course added successfully.</div>
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
                                                        <label class="form-label">Course Name</label>
                                                        <input type="text" class="form-control" placeholder="name" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Duration</label>
                                                        <input type="text" class="form-control" placeholder="Duration" name="duration">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Batch</label>
                                                        <select name="batch" class="form-control">
                                                            <option value="0">Select Batch</option>
                                                            <option value="Morning">Morning</option>
                                                            <option value="Evening">Evening</option>
                                                            <option value="Both">Both</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary" name="btnsave" value="Submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Course</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <?php
                                            if (isset($_POST["update"])) {

                                                $course_name = mysqli_real_escape_string($link, $_REQUEST['course_name']);
                                                $duration = mysqli_real_escape_string($link, $_REQUEST['duration']);
                                                $batch = mysqli_real_escape_string($link, $_REQUEST['batch']);

                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_course set course_name='$course_name', duration='$duration', batch='$batch' where id='$bill' ";
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
                                            ?>
                                            <?php
                                            if (isset($_POST["Apply"])) {
                                                $bill = $_POST['id'];
                                                $result = mysqli_query($link, "DELETE FROM tbl_course where id=$bill ");
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
                                                        <th>COURSE NAME</th>
                                                        <th>DURATION</th>
                                                        <th>BATCH</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from tbl_course order by id desc");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['course_name']; ?></td>
                                                            <td><?php echo $row['duration']; ?></td>
                                                            <td><?php echo $row['batch']; ?></td>
                                                            <td>
                                                                <div><label class="badge bg-success">Active</label></div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal<?= $row['id']; ?>">Update</button>
                                                                <div id="gridSystemModal<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="gridModalLabel"><?php echo $row['course_name']; ?></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">

                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">course_name</label>
                                                                                                <input type="text" class="form-control" name="course_name" value="<?php echo $row['course_name']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Duration</label>
                                                                                                <input type="text" class="form-control" name="duration" value="<?php echo $row['duration']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Batch</label>
                                                                                                <select name="batch" class="form-control">
                                                                                                    <option value="Morning"  <?php if($row['batch']=="Morning") echo "selected"; ?>  >Morning</option>
                                                                                                    <option value="Evening"  <?php if($row['batch']=="Evening") echo "selected"; ?>  >Evening</option>
                                                                                                    <option value="Both"  <?php if($row['batch']=="Both") echo "selected"; ?>  >Both</option>
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
                                                                <form method="post" enctype="multipart/form-data" style="float: right;">
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
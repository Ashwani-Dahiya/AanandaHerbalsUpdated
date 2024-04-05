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
                                    <h5 class="m-b-10">Payment Reports</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Payment Reports</a></li>
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
                                        <h5>List of Payments</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">

                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Course</th>
                                                        <th>Name Of Student</th>
                                                        <th>Father's Name</th>
                                                        <th>Contact No. 1</th>
                                                        <th>City</th>
                                                        <th>Total Fees</th>
                                                        <th>Received</th>
                                                        <th>Bal</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from tbl_subscription order by id desc");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <?php
                                                                $u = $row['course_id'];
                                                                $auh = "select * from tbl_course WHERE id='$u'";
                                                                $hh = mysqli_query($link, $auh);
                                                                $h = mysqli_fetch_array($hh);
                                                                echo $h['course_name'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $sstu = $row['student_id'];
                                                                $authttt = "select * from tbl_student WHERE id='$sstu'";
                                                                $auss = mysqli_query($link, $authttt);
                                                                $oss = mysqli_fetch_array($auss);
                                                                ?>
                                                                <?php echo $oss['full_name']; ?></td>
                                                            <td><?php echo $oss['father_name']; ?></td>
                                                            <td><?php echo $oss['phone1']; ?></td>
                                                            <td><?php echo $oss['city']; ?></td>
                                                            <td>
                                                                <?php
                                                                echo $row['amount'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $authrr = "select sum(rec) as rrec from tbl_payment WHERE student_id='$sstu'";
                                                                $aurr = mysqli_query($link, $authrr);
                                                                $orr = mysqli_fetch_array($aurr);
                                                                echo $orr['rrec'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $coll = $row['amount'] - $orr['rrec'];
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($coll != "0") {
                                                                ?>
                                                                    <div><label class="badge bg-warning">Pending</label></div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div><label class="badge bg-success">Completed</label></div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($coll != "") {
                                                                ?>
                                                                    <a href="rec_payment.php?id=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-info mr-1">
                                                                        Receive Payment
                                                                    </a>
                                                                <?php
                                                                }
                                                                ?>

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
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
                                    <h5 class="m-b-10">Datewise Sales</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Datewise Sales</a></li>
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
                                        <h5>Datewise Sales</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <form method="get" action="date_wise_visitor.php" class="mb-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="mb-2">From Date</label>
                                                    <input type="date" name="from_date" class="form-control" value="<?= $mydate; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-2">To Date</label>
                                                    <input type="date" name="to_date" class="form-control" value="<?= $mydate; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-2">&nbsp;</label><br>
                                                    <button class="btn btn-primary" type="submit" name="btnsave">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="table-responsive">
                                            <?php
                                            if (isset($_POST["update"])) {
                                                $demo_resp = mysqli_real_escape_string($link, $_REQUEST['demo_resp']);
                                                $demo_resone = mysqli_real_escape_string($link, $_REQUEST['demo_resone']);

                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_student set demo_resp='$demo_resp', demo_resone='$demo_resone' where id='$bill' ";
                                                //echo $queryy;
                                                $result = mysqli_query($link, $queryy);
                                                if ($queryy) {
                                            ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Response Added successfully.</div>
                                                <?php

                                                } else {
                                                ?>
                                                    <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Not successfully try submitting again.</div>
                                                <?php
                                                }
                                            }

                                            if (isset($_POST["make_student"])) {
                                                $reg_no = mysqli_real_escape_string($link, $_REQUEST['reg_no']);

                                                $bill = $_POST['id'];
                                                $queryy = "update tbl_student set status='1', reg_no='$reg_no', visitor='0' where id='$bill'";
                                                //echo $queryy;
                                                $result = mysqli_query($link, $queryy);
                                                if ($queryy) {
                                                ?>
                                                    <div class="alert alert-success bg-success text-white" role="alert">Student Added successfully.</div>
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
                                                        <th>Order No.</th>
                                                        <th>Date</th>
                                                        <th>Customer Details</th>
                                                        <th>Total Qty</th>
                                                        <th>Total Amt</th>
                                                        <th>Payment Details</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sss = "select * from tbl_order where frei_id='$userid' order by id desc";
                                                    $result = mysqli_query($link, $sss);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row['sale_date']; ?></td>
                                                            <td>
                                                                <?php
                                                                echo "Name: " . $row['cust_name'] . "<br>";
                                                                echo "Mobile: " . $row['cust_mobile'] . "<br>";
                                                                echo "Address: " . $row['cust_addr'];
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row['ttl_quty']; ?></td>
                                                            <td><?php echo $row['ttl_amt']; ?></td>
                                                            <td>
                                                                <div><label class="badge bg-danger">Received: <?= $row['recv']; ?></label></div>
                                                                <div><label class="badge bg-primary">Discount: <?= $row['discount']; ?></label></div>
                                                                <div><label class="badge bg-primary">Balance: <?= $row['balance']; ?></label></div>
                                                                <div><label class="badge bg-primary">Mode: <?= $row['payment_mode']; ?></label></div>
                                                            </td>
                                                            <td>
                                                                <a href="view_visitor.php?id=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-info mr-1">
                                                                    View
                                                                </a>
                                                                <a href="view_visitor.php?id=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-success mr-1">
                                                                    Print
                                                                </a>
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
<?php
include 'header.php';
$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM tbl_subscription WHERE id='$id'");
$datas = mysqli_fetch_array($sel);
$sstu = $datas['student_id'];
$all_installments = $datas['installment'];

$authttt = "select * from tbl_student WHERE id='$sstu'";
$auss = mysqli_query($link, $authttt);
$oss = mysqli_fetch_array($auss);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$auth = "select count(id) as indt from tbl_installment WHERE subs_id='$id'";
$aurssr = mysqli_query($link, $auth);
$orrd = mysqli_fetch_array($aurssr);

$pendd_insta = $all_installments - $orrd['indt'];

?>
<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Receive Payment</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Receive Payment</a></li>
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
                                        <h5>Student Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>Student Id:</th>
                                                <th>Student Name:</th>
                                                <th>Phone:</th>
                                                <th>Total Payment:</th>
                                                <th>Rec Payment:</th>
                                            </tr>
                                            <tr>
                                                <td><?= $sstu; ?></td>
                                                <td><?= $oss['full_name']; ?></td>
                                                <td><?= $oss['phone1']; ?></td>
                                                <td>
                                                    <?php
                                                    echo $datas['amount'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $authrr = "select sum(rec) as rrec from tbl_payment WHERE student_id='$sstu'";
                                                    $aurr = mysqli_query($link, $authrr);
                                                    $orr = mysqli_fetch_array($aurr);
                                                    if ($orr['rrec'] != "") {
                                                        echo $orr['rrec'];
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Installments</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <h4 class="mt-4">Total: <?= $all_installments; ?> Installments</h4>
                                            </div>
                                            <div class="col-md-5">
                                                <h4 class="mt-4">Pending: <?= $pendd_insta; ?> Installments</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($pendd_insta != "0") {
                                                ?>
                                                    <button class="btn btn-success mt-4 buttonp">Receive Payment</button>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 fform">
                                                <?php
                                                if (isset($_POST["btnsave"])) {

                                                    $payment = mysqli_real_escape_string($link, $_REQUEST['payment']);
                                                    $pmode = mysqli_real_escape_string($link, $_REQUEST['pmode']);
                                                    $pay_date = mysqli_real_escape_string($link, $_REQUEST['pay_date']);
                                                    $next_date = mysqli_real_escape_string($link, $_REQUEST['next_date']);

                                                    $queryy = "insert into tbl_installment (student_id, subs_id, pay_date, next_date) values('$sstu','$id','$pay_date','$next_date')";
                                                    //echo $queryy;
                                                    $result = mysqli_query($link, $queryy);
                                                    $last_id = mysqli_insert_id($link);
                                                    if (mysqli_affected_rows($link)) {
                                                        $queryyss = "insert into tbl_payment (student_id, subs_id, inst_id, rec, pmode ) values('$sstu','$id','$last_id','$payment', '$pmode')";
                                                        $resuddlt = mysqli_query($link, $queryyss);
                                                        $page = $_SERVER['PHP_SELF'] . "?id=" . $id;
                                                        $sec = "0";
                                                        header("Refresh: $sec; url=$page");
                                                    } else {
                                                ?>
                                                        <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Try again.</div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Payment Received</label>
                                                                <input type="text" class="form-control" name="payment" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Payment Mode</label>
                                                                <select name="pmode" class="form-control">
                                                                    <option value="Cash">Cash</option>
                                                                    <option value="Online">Online</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Rec Payment Date</label>
                                                                <input type="date" class="form-control" name="pay_date" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Next Payment Date</label>
                                                                <input type="date" class="form-control" name="next_date" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xs-12">
                                                            <input type="submit" class="btn btn-primary" name="btnsave" value="Submit">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br>
                                        <table id="example0" class="table display">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Amount</th>
                                                    <th>Payment Mode</th>
                                                    <th>Rec Date</th>
                                                    <th>Next Inst. Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($link, "select * from tbl_installment where subs_id='$id' order by id desc");
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                            <?php
                                                            $uuuuss = $row['id'];
                                                            $autssh = "select * from tbl_payment WHERE inst_id='$uuuuss'";
                                                            $augg = mysqli_query($link, $autssh);
                                                            $ogg = mysqli_fetch_array($augg);
                                                            echo $ogg['rec'];
                                                            ?>
                                                        </td>
                                                        <td><?php echo $ogg['pmode']; ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($row['pay_date'])); ?></td>
                                                        <td><?php echo date("d-m-Y", strtotime($row['next_date'])); ?></td>
                                                        <td>
                                                            <a href="print_bill.php?bid=<?= $row['id']; ?>" target="_blank" class="btn btn-primary btn-sm">Print</a>
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

<?php
include 'footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(".fform").hide();
    $(".buttonp").click(function() {
        $(".fform").show(1000);
    });
</script>
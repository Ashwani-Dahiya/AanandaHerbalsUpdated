<?php
include 'header.php';
$id = $_GET['bid'];
$sel = mysqli_query($link, "SELECT * FROM tbl_installment WHERE id='$id'");
$datas = mysqli_fetch_array($sel);
$sstu = $datas['student_id'];
$sstuss = $datas['subs_id'];


$ausgggged = mysqli_query($link, "select * from tbl_subscription WHERE id='$sstuss'");
$ossssssddd = mysqli_fetch_array($ausgggged);
$course_iid = $ossssssddd['course_id'];
$all_installments = $ossssssddd['installment'];


$authttt = "select * from tbl_student WHERE id='$sstu'";
$auss = mysqli_query($link, $authttt);
$oss = mysqli_fetch_array($auss);


$authtttsss = "select * from tbl_course WHERE id='$course_iid'";
$ausssss = mysqli_query($link, $authtttsss);
$osssss = mysqli_fetch_array($ausssss);


$autssh = "select * from tbl_payment WHERE inst_id='$id'";
$augg = mysqli_query($link, $autssh);
$ogg = mysqli_fetch_array($augg);



$auth = "select count(id) as indt from tbl_installment WHERE subs_id='$sstuss'";
$aurssr = mysqli_query($link, $auth);
$orrd = mysqli_fetch_array($aurssr);

$pendd_insta = $orrd['indt'];
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
                                    <h5 class="m-b-10">Print receipt</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Print receipt</a></li>
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
                                        <h5>Billing Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="printableArea">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <img src="logo.png" style="width: 130px;"><br>
                                                        <!-- <p style="font-size: 20px; font-weight: 700;">Xpozer Education Consultants</p> -->
                                                    </td>
                                                    <td>
                                                        <img src="<?= $oss['file']; ?>" style="width: 100px; height: 100px;">
                                                    </td>
                                                    <td>
                                                        <b>Reg No.: </b><?= $oss['reg_no']; ?><br>
                                                        <b>USERID: </b><?= $oss['phone1']; ?><br>
                                                        <b>Password: </b><?= $oss['password']; ?><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>SR. No. <?= $id; ?></th>
                                                    <th></th>
                                                    <th>Date:
                                                        <?= $datas['pay_date']; ?>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Student Name:</th>
                                                    <td colspan="2"><?= $oss['full_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Father Name:</th>
                                                    <td colspan="2"><?= $oss['father_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Course Applied:</th>
                                                    <td colspan="2"><?= $osssss['course_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Course Fee:</th>
                                                    <td colspan="2">₹<?= $ossssssddd['amount']; ?>/-</td>
                                                </tr>

                                                <tr>
                                                    <td colspan="3" style="background-color: #ccc; border: 2px solid #000;">
                                                        <table style="width: 100%;">
                                                            <tr style="border-bottom: 1px solid #000;">
                                                                <th>Fee Rec.</th>
                                                                <th>Pay. Mode</th>
                                                                <th>Pay. Date</th>
                                                                <th>Total. Inst.</th>
                                                                <th>Rec. Inst.</th>
                                                                <th>Bal.</th>
                                                                <th>Next Inst.</th>
                                                            </tr>
                                                            <tr style="padding-top: 10px;">
                                                                <td>₹<?= $ogg['rec']; ?>/- </td>
                                                                <td><?= $ogg['pmode']; ?></td>
                                                                <td><?= $datas['pay_date']; ?></td>
                                                                <td>
                                                                    <?= $ossssssddd['installment'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $pendd_insta; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $authrr = "select sum(rec) as rrec from tbl_payment WHERE student_id='$sstu'";
                                                                    $aurr = mysqli_query($link, $authrr);
                                                                    $orr = mysqli_fetch_array($aurr);
                                                                    if($ossssssddd['amount']!=""){
                                                                        echo "₹" . $ossssssddd['amount'] -  $orr['rrec'] . "/-";    
                                                                    }else{
                                                                        echo "₹" . 0 -  $orr['rrec'] . "/-";
                                                                    }
                                                                    
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?= $datas['next_date']; ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <br><br>
                                                        Student Sign.
                                                    </th>
                                                    <th>
                                                        <br><br>
                                                        Parent's Sign.
                                                    </th>
                                                    <th>
                                                        <br><br>
                                                        Auth. Sign.
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <b>Term & Conditions: </b><br>
                                                        1. Fee will not be refunded on any further consequences.<br>
                                                        2. Fee paid for a specific program is not transferrable to any other program. Fee paid is valid for enrolled student only. Transfer between cities and conduction of the program at the requested centre will be subject to the availability of seats. Courseware, content, class menus, timings, schedule and instructor may be changed at the discretion of Xpozer Education Consultants. Xpozer Education Consultants reserve the right to use your name & Photograph to be communicated your success.
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <button class="btn btn-primary submit-btn" onclick="printDiv('printableArea')">Print</button>
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

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
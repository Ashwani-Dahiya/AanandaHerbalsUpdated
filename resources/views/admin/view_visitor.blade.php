<?php
include 'header.php';
$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM tbl_student WHERE id='$id'");
$dataq = mysqli_fetch_array($sel);
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
                                    <h5 class="m-b-10">Visitor Details</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Visitor Details</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-md-12" id="printableArea">
                                <div class="card">
                                    <center>
                                        <img src="logo.png" style="width: 150px; margin-top: 15px;">
                                    </center>
                                    <div class="card-header">
                                        <h5>Visitor Detail</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <td>
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    Full Name
                                                                </th>
                                                                <td><?php echo $dataq['full_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Father's Name
                                                                </th>
                                                                <td><?php echo $dataq['father_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Mother's Name
                                                                </th>
                                                                <td><?php echo $dataq['mother_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Father Ocupations / Income
                                                                </th>
                                                                <td><?php echo $dataq['father_ocu']; ?> (<?php echo $dataq['income']; ?>)</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    No. of Sublings
                                                                </th>
                                                                <td><?php echo $dataq['sublings']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Full Address
                                                                </th>
                                                                <td><?php echo $dataq['address']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Passport
                                                                </th>
                                                                <td><?php echo $dataq['passport']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Reference
                                                                </th>
                                                                <td><?php echo $dataq['refrence']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Contact Details
                                                                </th>
                                                                <td>Phone1: <?php echo $dataq['phone1']; ?>, Phone2: <?php echo $dataq['phone2']; ?>, Email: <?php echo $dataq['email']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Country Intersted
                                                                </th>
                                                                <td><?php echo $dataq['contry_inst']; ?> (<?php echo $dataq['contry_inst2']; ?>)</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    School Name
                                                                </th>
                                                                <td><?php echo $dataq['school_name']; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    Date of Birth
                                                                </th>
                                                                <td><?php echo $dataq['dob']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <h6>Photo</h6>
                                                    <img src="../<?php echo $dataq['file']; ?>" width="200px">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-title">
                                        Qualification Details
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Qualification</th>
                                                    <th>Subject/Stream</th>
                                                    <th>%</th>
                                                    <th>No. Of Backlogs</th>
                                                    <th>Start Date Month/Year</th>
                                                    <th>End Date Month/Year</th>
                                                    <th>Medium Of Instruction</th>
                                                    <th>University/Board</th>
                                                </tr>
                                                <?php
                                                $result = mysqli_query($link, "select * from tbl_edudetail where sid='$id' order by id asc");
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $i++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['quali']; ?></td>
                                                        <td><?php echo $row['subject']; ?></td>
                                                        <td><?php echo $row['pers']; ?></td>
                                                        <td><?php echo $row['backlog']; ?></td>
                                                        <td><?php echo $row['start']; ?></td>
                                                        <td><?php echo $row['end']; ?></td>
                                                        <td><?php echo $row['medium']; ?></td>
                                                        <td><?php echo $row['uni']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-title">
                                        Other Detail
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        IELTS/TOFEL/PTE Score
                                                    </th>
                                                    <td>
                                                        <?php echo $dataq['course_score']; ?>
                                                        (S:<?php echo $dataq['ss']; ?>, R:<?php echo $dataq['rr']; ?>, L:<?php echo $dataq['ll']; ?>, W:<?php echo $dataq['ww']; ?>)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        GRE/GMAT Score
                                                    </th>
                                                    <td><?php echo $dataq['gre_score']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Gap Between Education (if Any)
                                                    </th>
                                                    <td><?php echo $dataq['gap']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Reason for Gap
                                                    </th>
                                                    <td><?php echo $dataq['greason']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Visa History
                                                    </th>
                                                    <td><?php echo $dataq['visa_hist']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Work Experience
                                                    </th>
                                                    <td><?php echo $dataq['work_exp']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Marital Status
                                                    </th>
                                                    <td><?php echo $dataq['marital']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        How did you know about us
                                                    </th>
                                                    <td><?php echo $dataq['about_us']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">
                                                        Remark
                                                    </th>
                                                    <td><?php echo $dataq['remark']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <br><br><br>
                                                    <b>Counsellor/Manager's Sign</b>
                                                </td>
                                                <td>
                                                    <br><br><br>
                                                    <b>Director's Sign</b>
                                                </td>
                                                <td>
                                                    <br><br><br>
                                                    <b>Applicant's Sign</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <center>
                                    <button class="btn btn-primary submit-btn" onclick="printDiv('printableArea')">Print</button>
                                    <br><br>
                                </center>
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
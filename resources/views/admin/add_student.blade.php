<?php
include 'header.php';
?>

<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Add Students</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Add Students</a></li>
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
                                        <h5>Add new Students</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <?php
                                        if (isset($_POST["btnsave"])) {

                                            $reg_no = mysqli_real_escape_string($link, $_REQUEST['reg_no']);
                                            $full_name = mysqli_real_escape_string($link, $_REQUEST['full_name']);
                                            $father_name = mysqli_real_escape_string($link, $_REQUEST['father_name']);
                                            $refrence = mysqli_real_escape_string($link, $_REQUEST['refrence']);
                                            $mother_name = mysqli_real_escape_string($link, $_REQUEST['mother_name']);
                                            $phone1 = mysqli_real_escape_string($link, $_REQUEST['phone1']);
                                            $phone2 = mysqli_real_escape_string($link, $_REQUEST['phone2']);
                                            $email = mysqli_real_escape_string($link, $_REQUEST['email']);
                                            $school_name = mysqli_real_escape_string($link, $_REQUEST['school_name']);
                                            $address = mysqli_real_escape_string($link, $_REQUEST['address']);
                                            $course = mysqli_real_escape_string($link, $_REQUEST['course']);
                                            $dob = mysqli_real_escape_string($link, $_REQUEST['dob']);

                                            $father_ocu = mysqli_real_escape_string($link, $_REQUEST['father_ocu']);
                                            $income = mysqli_real_escape_string($link, $_REQUEST['income']);
                                            $sublings = mysqli_real_escape_string($link, $_REQUEST['sublings']);
                                            // $house = mysqli_real_escape_string($link, $_REQUEST['house']);
                                            $passport = mysqli_real_escape_string($link, $_REQUEST['passport']);
                                            $contry_inst = mysqli_real_escape_string($link, $_REQUEST['contry_inst']);
                                            $contry_inst2 = mysqli_real_escape_string($link, $_REQUEST['contry_inst2']);
                                            $course_inst = mysqli_real_escape_string($link, $_REQUEST['course_inst']);
                                            // $location_inst = mysqli_real_escape_string($link, $_REQUEST['location_inst']);
                                            // $intake = mysqli_real_escape_string($link, $_REQUEST['intake']);

                                            $course_score = mysqli_real_escape_string($link, $_REQUEST['course_score']);
                                            $ss = mysqli_real_escape_string($link, $_REQUEST['ss']);
                                            $rr = mysqli_real_escape_string($link, $_REQUEST['rr']);
                                            $ll = mysqli_real_escape_string($link, $_REQUEST['ll']);
                                            $ww = mysqli_real_escape_string($link, $_REQUEST['ww']);
                                            $gre_score = mysqli_real_escape_string($link, $_REQUEST['gre_score']);
                                            $gap = mysqli_real_escape_string($link, $_REQUEST['gap']);
                                            $greason = mysqli_real_escape_string($link, $_REQUEST['greason']);
                                            $visa_hist = mysqli_real_escape_string($link, $_REQUEST['visa_hist']);
                                            $work_exp = mysqli_real_escape_string($link, $_REQUEST['work_exp']);
                                            $marital = mysqli_real_escape_string($link, $_REQUEST['marital']);
                                            $about_us = mysqli_real_escape_string($link, $_REQUEST['about_us']);
                                            $remark = mysqli_real_escape_string($link, $_REQUEST['remark']);

                                            $course = mysqli_real_escape_string($link, $_REQUEST['course']);
                                            $batch_id = mysqli_real_escape_string($link, $_REQUEST['batch_id']);
                                            $amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
                                            $installment = mysqli_real_escape_string($link, $_REQUEST['installment']);


                                            if (empty($_FILES['service_file1']['tmp_name']) || !is_uploaded_file($_FILES['service_file1']['tmp_name'])) {
                                                $service_file1 = null;
                                            } else {
                                                $imagno = $_FILES['service_file1']['name'];
                                                $ran = rand(9999999, 99999999999);
                                                $imagename = $ran . $imagno;
                                                $source = $_FILES['service_file1']['tmp_name'];
                                                $target = "uploads/" . $imagename;
                                                move_uploaded_file($source, $target);

                                                $service_file1 = $imagename;
                                                $save = "uploads/" . $service_file1; //This is the new file you saving
                                                $file = "uploads/" . $service_file1; //This is the original file
                                                $service_file1 = "uploads/" . $service_file1;
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

                                            $today = date('Y-m-d');
                                            $queryy = "insert into tbl_student (reg_no, full_name, file, father_name, refrence, mother_name, phone1, phone2, email, school_name, 
                                            address, course, dob, father_ocu, income, passport, contry_inst, contry_inst2, course_inst,
                                            course_score, ss, rr, ll, ww, gre_score, gap, greason, visa_hist, work_exp, marital, about_us, remark, jdate, status) 
                                            values('$reg_no', '$full_name','$service_file1','$father_name','$refrence','$mother_name','$phone1','$phone2','$email','$school_name',
                                            '$address','$course','$dob','$father_ocu','$income','$passport','$contry_inst','$contry_inst2','$course_inst',
                                            '$course_score','$ss','$rr','$ll','$ww','$gre_score','$gap','$greason','$visa_hist','$work_exp','$marital','$about_us','$remark', '$today', '1')";
                                            // echo $queryy;
                                            $result = mysqli_query($link, $queryy);
                                            $last_id = mysqli_insert_id($link);
                                            if (mysqli_affected_rows($link)) {

                                                $mydate = date("Y-m-d");
                                                $queryyss = "insert into tbl_subscription (student_id, amount, course_id, installment, date) values('$last_id','$amount','$course','$installment', '$mydate')";
                                                // echo $queryyss;
                                                $resuddlt = mysqli_query($link, $queryyss);

                                                $count = count($_POST['quali']);
                                                for ($i = 0; $i < $count; $i++) {
                                                    $queryss = "INSERT INTO `tbl_edudetail` (`sid`,`quali`,`subject`,`pers`,`backlog`,`start`,`end`,`medium`,`uni`) 
						                            VALUES('$last_id','{$_POST['quali'][$i]}','{$_POST['subject'][$i]}','{$_POST['pers'][$i]}','{$_POST['backlog'][$i]}','{$_POST['start'][$i]}','{$_POST['end'][$i]}','{$_POST['medium'][$i]}','{$_POST['uni'][$i]}')";
                                                    $resultt = mysqli_query($link, $queryss);
                                                }

                                        ?>
                                                <div class="alert alert-success bg-success text-white" role="alert">Student added successfully.</div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Try again.</div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <?php
                                                    $selss = mysqli_query($link, "SELECT * FROM tbl_student order by id desc limit 1");
                                                    $dataq = mysqli_fetch_array($selss);
                                                    $vdgfdg = $dataq['id'];
                                                    $uuuu = $vdgfdg + 1;
                                                    $datey = date("Y");
                                                    $datem = date("m");
                                                    $dddcds = $datey . $datem;
                                                    $REGISTRATION = "AM" . $dddcds . $uuuu;
                                                    ?>
                                                    <label>Registration No.</label>
                                                    <input class="form-control" type="text" name="reg_no" readonly value="<?= $REGISTRATION; ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Full Name</label>
                                                    <input class="form-control" type="text" name="full_name" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Photo</label>
                                                    <input class="form-control" type="file" name="service_file1">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Father's Name</label>
                                                    <input class="form-control" type="text" name="father_name" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Mother's Name</label>
                                                    <input class="form-control" type="text" name="mother_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Father Ocupations</label>
                                                    <select class="form-control" name="father_ocu" id="" required="">
                                                        <option value="Private Job">Private Job</option>
                                                        <option value="Government Job">Government Job</option>
                                                        <option value="Businessman">Businessman</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Annual Income</label>
                                                    <select class="form-control" name="income">
                                                        <option value="2 - 5 Lacs">2 - 5 Lacs</option>
                                                        <option value="5 - 10 Lacs">5 - 10 Lacs</option>
                                                        <option value="10 Lac and Above">10 Lac and Above</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>No. of Sublings</label>
                                                    <select class="form-control" name="sublings">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="More">More</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Full Address</label>
                                                    <input class="form-control" type="text" name="address" placeholder="Address">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Passport</label>
                                                    <select class="form-control" name="passport">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Contact No. 1</label>
                                                    <input class="form-control" type="text" name="phone1" required="" maxlength="10">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Contact No. 2</label>
                                                    <input class="form-control" type="text" name="phone2" maxlength="10">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Email Id</label>
                                                    <input class="form-control" type="text" name="email" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Course Intersted</label>
                                                    <select name="course_inst" class="form-control">
                                                        <option value="Diploma">Diploma</option>
                                                        <option value="Bachelor">Bachelor</option>
                                                        <option value="Master">Master</option>
                                                        <option value="Phd">Phd</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Course</label>
                                                    <select name="course" class="form-control" required="">
                                                        <option value="0">Select course</option>
                                                        <?php
                                                        $q = mysqli_query($link, "select * from tbl_course where status='0' order by id desc");
                                                        while ($datac = mysqli_fetch_array($q)) {
                                                        ?>
                                                            <option value="<?= $datac['id']; ?>"><?= $datac['course_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>School Name</label>
                                                    <input class="form-control" type="text" name="school_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Country Intersted</label>
                                                    <select name="contry_inst" class="form-control">
                                                        <option value="Australia">Australia</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States of America">United States of America</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Country (2nd preference)</label>
                                                    <input class="form-control" type="text" name="contry_inst2">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Date of Birth</label>
                                                    <input class="form-control" type="date" name="dob" required="">
                                                </div>
                                                <div class="col-lg-12">
                                                    <table class="table table-striped" id="tbl_posts">
                                                        <thead>
                                                            <tr class="center-row-th" style="border: 1px solid #ccc; background-color: #f5f5f5;">
                                                                <th>Qualification</th>
                                                                <th>Subject/<br>Stream</th>
                                                                <th>%</th>
                                                                <th>No. of <br>Backlogs</th>
                                                                <th>Start Date<br>Month/Year</th>
                                                                <th>End Date<br>Month/Year</th>
                                                                <th>Medium of<br>Instruction</th>
                                                                <th>University<br>Board</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbl_posts_body">
                                                            <tr id="rec-1" class="row-td">
                                                                <td>
                                                                    <select name="quali[]" class="form-control sort-form">
                                                                        <option value="10th">10th</option>
                                                                        <option value="12th">12th</option>
                                                                        <option value="Graduation">Graduation</option>
                                                                        <option value="Post Graduation">Post Graduation</option>
                                                                        <option value="Graduate">Graduate</option>
                                                                        <option value="Additional Course">Additional Course</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control sort-form" type="text" name="subject[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control sort-form" type="text" name="pers[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control sort-form" type="text" name="backlog[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control sort-form" type="text" name="start[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control sort-form" type="text" name="end[]">
                                                                </td>
                                                                <td>
                                                                    <select name="medium[]" class="form-control sort-form">
                                                                        <option value="English">English</option>
                                                                        <option value="Hindi">Hindi</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select name="uni[]" class="form-control sort-form">
                                                                        <option value="CBSE">CBSE</option>
                                                                        <option value="HBSE">HBSE</option>
                                                                        <option value="University">University</option>
                                                                        <option value="College">College</option>
                                                                        <option value="Other">Other</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-danger btn-xs delete-record btn-radius" data-id="0">
                                                                        X
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <a class="btn btn-primary btn-sm add-record" data-added="0">
                                                        Add New
                                                    </a>
                                                    <br>
                                                    <br>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>IELTS/TOFEL/PTE Score</label>
                                                    <input class="form-control" type="text" name="course_score">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>S</label>
                                                    <input class="form-control" type="text" name="ss">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>R</label>
                                                    <input class="form-control" type="text" name="rr">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>L</label>
                                                    <input class="form-control" type="text" name="ll">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>W</label>
                                                    <input class="form-control" type="text" name="ww">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>GRE/GMAT Score</label>
                                                    <input class="form-control" type="text" name="gre_score">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Gap Between Education (if Any)</label>
                                                    <input class="form-control" type="text" name="gap">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Reason for Gap</label>
                                                    <input class="form-control" type="text" name="greason">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Visa History</label>
                                                    <select class="form-control" name="visa_hist">
                                                        <option value="Acceptance">Acceptance</option>
                                                        <option value="Refursal">Refursal</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Work Experience</label>
                                                    <input class="form-control" type="text" name="work_exp">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Marital Status</label>
                                                    <select class="form-control" name="marital">
                                                        <option value="Married">Married</option>
                                                        <option value="Unmarried">Unmarried</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>How did you know about us</label>
                                                    <select class="form-control" name="about_us">
                                                        <option value="Relative or friend">Relative or friend</option>
                                                        <option value="Advertisement in Newspaper">Advertisement in Newspaper</option>
                                                        <option value="Xpozer Student">Xpozer Student</option>
                                                        <option value="Pamphlet">Pamphlet</option>
                                                        <option value="Cable">Cable</option>
                                                        <option value="Any Other">Any Other</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Reference</label>
                                                    <input class="form-control" type="text" name="refrence">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Remark</label>
                                                    <input class="form-control" type="text" name="remark">
                                                </div>
                                                <div class="col-md-12">
                                                    <h5 style="margin: 0;">Course Subscription Details</h5>
                                                    <hr style="border-bottom: 2px solid #ccc;">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Course</label>
                                                    <select class="form-control" name="course" id="" required="">
                                                        <?php
                                                        $q = mysqli_query($link, "select * from tbl_course ");
                                                        while ($datac = mysqli_fetch_array($q)) {
                                                        ?>
                                                            <option value="<?= $datac['id']; ?>"><?= $datac['course_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Batch</label>
                                                    <select class="form-control" name="batch_id" id="" required="">
                                                        <?php
                                                        $q = mysqli_query($link, "select * from tbl_batch ");
                                                        while ($datac = mysqli_fetch_array($q)) {
                                                        ?>
                                                            <option value="<?= $datac['id']; ?>"><?= $datac['batch_title']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Total Fees</label>
                                                    <input class="form-control" type="number" name="amount" required="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Installment</label>
                                                    <select class="form-control" name="installment" id="" required="">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <input type="radio" required="" class="form-control" style="height: 20px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label> I agree <a href="terms.php">Terms & Conditions</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                        <button class="btn btn-primary btn-lg" type="submit" name="btnsave">Submit</button>
                                                </div>
                                            </div>
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
<div style="display:none;">
    <table id="sample_table">
        <tr class="row-td">
            <td>
                <select name="quali[]" class="form-control sort-form">
                    <option value="10th">10th</option>
                    <option value="12th">12th</option>
                    <option value="Graduation">Graduation</option>
                    <option value="Post Graduation">Post Graduation</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Additional Course">Additional Course</option>
                </select>
            </td>
            <td>
                <input class="form-control sort-form" type="text" name="subject[]">
            </td>
            <td>
                <input class="form-control sort-form" type="text" name="pers[]">
            </td>
            <td>
                <input class="form-control sort-form" type="text" name="backlog[]">
            </td>
            <td>
                <input class="form-control sort-form" type="text" name="start[]">
            </td>
            <td>
                <input class="form-control sort-form" type="text" name="end[]">
            </td>
            <td>
                <select name="medium[]" class="form-control sort-form">
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                </select>
            </td>
            <td>
                <select name="uni[]" class="form-control sort-form">
                    <option value="CBSE">CBSE</option>
                    <option value="HBSE">HBSE</option>
                    <option value="University">University</option>
                    <option value="College">College</option>
                    <option value="Other">Other</option>
                </select>
            </td>
            <td>
                <a class="btn btn-danger btn-radius btn-xs delete-record" data-id="0">
                    x
                </a>
            </td>
        </tr>
    </table>
</div>
<?php
include 'footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();

        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'rec-' + size);

        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);
        multInputs();
    });

    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        var didConfirm = 1;
        if (1 == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();

            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
                //alert(index);

                $(this).find('span.sn').html(index + 1);
            });
            multInputs();
            return true;
        } else {
            return false;
        }
    });
</script>

<?php
include 'header.php';
$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM tbl_admin WHERE id='$id'");
$datas = mysqli_fetch_array($sel);
error_reporting(E_ERROR | E_PARSE);
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
                                    <h5 class="m-b-10">Assign products to franchise</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Add products to franchise</a></li>
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
                                        <h5>Assign products to franchise</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST["btnsave"])) {

                                            $course = mysqli_real_escape_string($link, $_REQUEST['course']);
                                            $amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
                                            $installment = mysqli_real_escape_string($link, $_REQUEST['installment']);
                                            $end_date = mysqli_real_escape_string($link, $_REQUEST['end_date']);

                                            $mydate = date("Y-m-d");
                                            $queryyss = "insert into tbl_subscription (student_id, amount, course_id, installment, date, end_date) values('$id','$amount','$course','$installment', '$mydate', '$end_date')";
                                            // echo $queryyss;
                                            $resuddlt = mysqli_query($link, $queryyss);
                                            if (mysqli_affected_rows($link)) {

                                        ?>
                                                <div class="alert alert-success bg-success text-white" role="alert">Course assigned successfully.</div>
                                            <?php
                                                header("refresh: 1; url = add_subscription.php");
                                            } else {
                                            ?>
                                                <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Try again.</div>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <?php
                                        if (isset($_POST["update_subs"])) {

                                            $amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
                                            $installment = mysqli_real_escape_string($link, $_REQUEST['installment']);
                                            $end_date = mysqli_real_escape_string($link, $_REQUEST['end_date']);
                                            $sdate = mysqli_real_escape_string($link, $_REQUEST['sdate']);

                                            $bill = $_POST['id'];
                                            $result = mysqli_query($link, "update tbl_subscription set amount='$amount', installment='$installment', date='$sdate', end_date='$end_date' where id='$bill' ");
                                            // $last_id = mysqli_insert_id($link);
                                            if ($result) {
                                        ?>
                                                <div class="alert alert-success bg-success text-white" role="alert">Course assigned Updated successfully.</div>
                                            <?php
                                                header("refresh: 1; url = add_subscription.php");
                                            } else {
                                            ?>
                                                <div class="alert alert-danger bg-danger text-white mb-0" role="alert">Try again.</div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Select franchise</label>
                                                <select class="form-control select js-example-basic-single" name="patient" onchange="golink(this.value)">
                                                    <option value="">Select franchise</option>
                                                    <?php
                                                    $qssssssds = mysqli_query($link, "select * from tbl_admin where type='frei' order by id desc");
                                                    while ($datacfff = mysqli_fetch_array($qssssssds)) {
                                                    ?>
                                                        <option value="<?= $datacfff['id']; ?>" <?php if ($id == $datacfff['id']) echo "selected" ?>><?= $datacfff['name']; ?> (<?= $datacfff['city']; ?>)</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <script>
                                                    function golink(id) {
                                                        window.location.href = "assign_products.php?id=" + id;
                                                    }
                                                </script>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>Name: </th>
                                                        <th>City:</th>
                                                        <th>Phone:</th>
                                                        <th>Address:</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $datas['name']; ?></td>
                                                        <td><?= $datas['city']; ?></td>
                                                        <td><?= $datas['phone']; ?></td>
                                                        <td><?= $datas['address']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>List of Assigned products</h5>
                                        <button class="btn btn-success" id="assign_save">Assign save</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th colspan="2">Assign</th>
                                                        <th>Photo</th>
                                                        <th>Category</th>
                                                        <th>Product Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    //SELECT `id`, `category`, `pro_name`, `file`, `description`, `addon`, `status` FROM `tbl_product` WHERE 1
                                                    //SELECT `id`, `frei_id`, `pro_id`, `price`, `addon`, `status` FROM `tbl_assign_products` WHERE 1
                                                    //SELECT `id`, `cat_name`, `file`, `description`, `addon`, `status` FROM `tbl_category` WHERE 1

                                                     $sql = "SELECT p.id as product_id,ap.id as assing_id , cat_name,pro_name,p.file,ap.price,ifnull(ap.status,0) as assign_status,default_price  FROM `tbl_product`  as p 
                                                                            inner join tbl_category as c on c.id=p.category
                                                                            LEFT join tbl_assign_products as ap on ap.pro_id=p.id and ap.frei_id=$id";
                                                    $result = mysqli_query($link, $sql);
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><input type="checkbox" id="<?= $i ?>" class="assign_check" product_id="<?= $row['product_id']  ?>" assign_id="<?= $row['assign_id']  ?>" <?= ($row['assign_status']) ? 'checked' : '' ?> /></td>
                                                            <td><input type="number" id="num<?= $i ?>" default_price="<?= $row["default_price"] ?>" <?= ($row['assign_status']) ? 'checked' : 'disabled' ?>  value="<?= ($row['assign_status']) ? $row['price'] : '' ?>" style="width: 50px;"></td>
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

                                                                echo $row['cat_name'];
                                                                ?>
                                                            </td>
                                                            <td><?php echo $row['pro_name']; ?></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(".assign_check").change(function() {
        const checked = $(this).is(":checked");
        let id = $(this).attr("id");
        if (!checked) {
            console.log("Run");
            $(`#num${id}`).attr("disabled", "disabled");
            $(`#num${id}`).val("");
            if ($(`#num${id}`).hasClass("error")) {
                $(`#num${id}`).removeClass("error");
            }
        } else {
            $(`#num${id}`).removeAttr("disabled");
            $(`#num${id}`).val($(`#num${id}`).attr("default_price"));
        }
    });


    $("#assign_save").click(function() {
        let len = $(".assign_check").length;
        json_data = [];
        flag = true;
        for (let i = 0; i < len; i++) {
            const checked = $(`.assign_check:eq(${i})`).is(":checked");
            let id = $(`.assign_check:eq(${i})`).attr("id");
            let num = $(`#num${id}`).val();

            if (checked) {
                console.log("in Checked " + i);
                if (num == "" || num.len <= 0) {
                    console.log("in Checked with Num length 0 " + i);
                    $(`#num${id}`).addClass("error");
                    flag = false;
                }

            }
            let d = {};
            d.product_id = $(`.assign_check:eq(${i})`).attr("product_id");
            d.assign_id = $(`.assign_check:eq(${i})`).attr("assign_id");
            d.status = checked;
            d.price = num;
            d.frei_id = <?= $id ?>;


            json_data.push(d);
        }

        console.log("json_data>>>", json_data);

        $.post('query.php', {
            save_assign: "yes",
            json_data
        }, function(data) {
            console.log(data);
            data = JSON.parse(data);
            if (data.status) {
                alert("Saved")

            } else {
                alert(data.statusl̥l̥)
            }
        });

    });
</script>
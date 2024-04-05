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
                                    <h5 class="m-b-10">All Students</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Students</a></li>
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
                                        <h5>List of Students</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Photo</th>
                                                        <th>Reg No.</th>
                                                        <th>Name</th>
                                                        <th>F. Name</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from tbl_student where status='1' and visitor='0' order by id desc");
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
                                                                        <img src="<?php echo $row['file']; ?>" style="height: 50px; width: 50px;">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $row['reg_no']; ?></td>
                                                            <td><?php echo $row['full_name']; ?></td>
                                                            <td><?php echo $row['father_name']; ?></td>
                                                            <td><?php echo $row['phone1']; ?></td>
                                                            <td>
                                                                <div><label class="badge bg-success">Active</label></div>
                                                            </td>
                                                            <td>
                                                                <a href="edit_student.php?stuid=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-info mr-1">
                                                                    Update Details
                                                                </a>
                                                                <a href="id_card.php?stuid=<?= $row['id']; ?>" class="btn btn-icon btn-sm btn-warning mr-1">
                                                                    Id Card
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
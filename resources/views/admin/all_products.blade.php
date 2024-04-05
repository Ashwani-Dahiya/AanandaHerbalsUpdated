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
                                    <h5 class="m-b-10">All Products</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">All Products</a></li>
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
                                        <h5>List of Products</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Photo</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($link, "select * from products order by id desc");
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?php echo $row['cat_name']; ?></td>
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
                                                            <td><?php echo $row['description']; ?></td>
                                                            <td>
                                                                <div><label class="badge bg-success">Active</label></div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#gridSystemModal<?= $row['id']; ?>">Update</button>
                                                                <div id="gridSystemModal<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="gridModalLabel"><?php echo $row['cat_name']; ?></h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" enctype="multipart/form-data">
                                                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Category Name</label>
                                                                                                <input type="text" class="form-control" name="cat_name" value="<?php echo $row['cat_name']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-8 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Photo</label>
                                                                                                <input class="form-control" type="file" name="thumb">
                                                                                                <input class="form-control" type="hidden" name="old_thumb" value="<?= $dataq['file']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <img src="<?= $dataq['file']; ?>" style="width: 100px; height: 100px;">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <label for="input1" class="form-label">Description</label>
                                                                                                <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>">
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
                                                                <form method="post" enctype="multipart/form-data">
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
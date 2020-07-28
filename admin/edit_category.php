<?php
require_once("check_login.php");
require_once('database/database_connection.php');
$msg = '';
if(isset($_POST['update-cat']))
{
    if(isset($_FILES)){
        $img_name = @$_FILES['category_img']['name'];
        $img_tmp = @$_FILES['category_img']['tmp_name'];
        $img_name_array = explode(".", $img_name);
        $ext = end($img_name_array);
        $img_name = time() . '.' . $ext;
        $msg = updateCategory($_POST['category'], $_POST['id'],$img_name,$img_tmp,$_POST['description'], $_POST['status'], $_POST['csrf_token']);
    }else{
        $msg = updateCategory($_POST['category'], $_POST['id'],$_POST['description'],$_POST['status'], $_POST['csrf_token']);
    }
    echo "<script>window.location.href='view-category.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <!-- fontawesome link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        
        <!-- custom stylesheet -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <!-- sidebar -->
        <?php include("include/sidebar.php");?>
        <!-- end sidebar -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- header -->
           <?php include_once('include/header.php'); ?>
           <!-- header end -->
           <div class="msg"><?= $msg; ?></div>
           <!-- breadcrumb -->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Category</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="dashboard.php">Dashboard</a></li>
                                        <li><a>Manage Categroy</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->

            <!-- ############################### Content ######################################-->
    
            <div class="content" style="height:auto !important;">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- content code here -->
                    <div class="row"><!--row-->
                        <div class="col-lg-12"><!--col-lg -->
                            <div class="card responsive-tab"><!--card-->
                                <div class="card-header"><!--card-header-->
                                    <strong>Update Category</strong>
                                </div><!--card-header end-->
                                <div class="card-body card-block"><!--card-body-->
                                    <!--form-->
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                        <div class="form-group">
                                            <div class="col"><label for="cat-input" class=" form-control-label">Category Name:</label></div>
                                            <div class="col-12 col-md-12"><input  type="text" class="form-control" id="cat-input" value="<?= viewCategoryById($_GET['id'])->fetch_assoc()['catname'] ?>" placeholder="Enter Category" name="category"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="cat-input" class=" form-control-label">Category Image:</label></div>
                                            <div class="col-12 col-md-12"><input  type="file" class="form-control" id="cat-img-input" name="category_img" ></div><br>
                                            <img src="images/<?= viewCategoryById($_GET['id'])->fetch_assoc()['catimage'] ?>" class="img-fluid" style="max-width:300px; max-height:300px;">
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="cat-status-input" class=" form-control-label">Status:</label></div>
                                            <div class="col-12 col-md-12">
                                                <select  type="text" class="form-control" id="cat-status-input" name="status" required>
                                                    <?php

                                                    if(viewCategoryById($_GET['id'])->fetch_assoc()['status'] === 'published'){
                                                    echo '<option value="published">Published</option>
                                                        <option value="upcoming">Upcoming</option>';
                                                    }
                                                    else{
                                                    echo '
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="published">Published</option>';
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="cat-desc-input" class=" form-control-label">Short Description:</label></div>
                                            <div class="col-12 col-md-12"><textarea  type="text" class="form-control" id="cat-desc-input" placeholder="write something here..." name="description" required><?= viewCategoryById($_GET['id'])->fetch_assoc()['description'] ?></textarea></div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" name="update-cat"value="Update" >
                                        </div>
                                    </form>
                                    <!--form end-->
                                </div><!--card-body end-->
                            </div><!--card-->
                        </div><!--col-lg end-->
                    </div><!--row end-->
                    <div class="clearfix"></div>
                </div> <!-- animated end-->
            </div>
            <!--############################# content end ######################################-->

            <div class="clearfix"></div>

            <!-- Footer -->
            <?php include("include/footer.php");?>
            <!-- site-footer end-->
        </div> <!-- right-panel end -->


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <!-- main script -->
        <script src="assets/js/main.js"></script>
        <script type="text/javascript">
            window.onload = document.getElementById('cat-input').focus();
            jQuery(document).ready(function($){
                $(".side_menu").removeClass("active");
                $("#mcat").addClass("active");
            });
        </script>
    </body>
</html>
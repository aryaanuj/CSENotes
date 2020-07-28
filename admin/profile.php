<?php
require_once("check_login.php");
require_once("database/database_connection.php");
$msg = '';
if(isset($_POST['update-pic'])){
    $imgname = $_FILES['profile_pic']['name'];
    $tmp = $_FILES['profile_pic']['tmp_name'];
    $msg = updateAdminProfile($imgname,$tmp);
}
if(isset($_POST['update-pass'])){
    $msg = updateAdminPass($_POST['password'], $_POST['confirmpass'], $_POST['csrf']);
}
$row = getAdminDetail()->fetch_assoc();
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
        <!-- end sidebar panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- header -->
           <?php include_once('include/header.php'); ?>
           <!-- header end -->
           
            <!-- ######################## Content ##########################-->

            <div class="content" style="height:auto !important;">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="msg"><?= $msg ?></div>
                    <div class="row"> <!--row -->
                        <div class="col-lg-6 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                    <center>
                                        <img src="<?= $row['profile'] ?>" class="img-fluid" style="width:150px;height: 150px;">
                                    </center>
                                   <br>
                                    <table class="table">
                                        <tr>
                                            <th>Username</th>
                                            <td><?= $row['username'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td>********************</td>
                                        </tr>
                                    </table>
                                </div> <!--card body end-->
                            </div><!--card end -->
                        </div> <!--row inner col  end-->
                        <div class="col-lg-6 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                  <div class="bg-info p-4"><h4 class="text-center text-white">Update display picture</h4></div><br>
                                  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <input type="file" name="profile_pic" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <input type="submit" name="update-pic" value="Update Picture" class="btn btn-warning btn-sm">
                                      </div>
                                  </form>
                                  <div class="bg-info p-4"><h4 class="text-center text-white">
                                  Update Password</h4></div><br>
                                  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                    <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
                                      <div class="form-group">
                                          <input type="text" name="password" placeholder="Password" class="form-control">
                                      </div>
                                      <div class="form-group">
                                          <input type="text" name="confirmpass" placeholder="Confirm Password" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <div class="row ml-2">
                                          <input type="submit" name="update-pass" value="Update Password" class="btn btn-warning btn-sm">
                                      </div>
                                      </div>
                                  </form>
                                </div> <!--card body end-->
                            </div><!--card end -->
                        </div> <!--row inner col  end-->
                        
                    </div><!--row end -->
                    
                    <div class="clearfix"></div>
                    
                </div> <!-- animated end-->
            </div>
            <!--############################# content end ######################################-->

            <div class="clearfix"></div>

            <!-- Footer -->
            <?php include_once("include/footer.php");?>
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
            jQuery(document).ready( function ($) {
                $(".side_menu").removeClass("active");
                $("#dashboard").addClass("active");
            });
        </script>
    </body>
</html>
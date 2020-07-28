<?php
require_once("check_login.php");
require_once('database/database_connection.php');
$msg = '';
if(isset($_POST['update-post']))
{
    $msg = updatePost($_POST['category'],$_POST['topic'],$_POST['subtopic'],$_POST['content'], $_POST['csrf_token'], $_POST['id']);
    echo "<script>window.location.href='view-posts.php';</script>";
    exit;
}
$result = viewPostById($_GET['id']);
if(!empty($result)){
    $row = $result->fetch_assoc();
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
                                    <h1>Add Post</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="dashboard.php">Dashboard</a></li>
                                        <li><a>Manage Posts</a></li>
                                        <li class="active text-primary">Add Post</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb end -->

            <!-- ############################### Content ######################################-->
    
            <div class="content" style="height:150vh !important;">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- content code here -->
                    <div class="row"><!--row-->
                        <div class="col-lg-12"><!--col-lg -->
                            <div class="card"><!--card-->
                                <div class="card-header"><!--card-header-->
                                    <strong>Add Post</strong>
                                </div><!--card-header end-->
                                <div class="card-body card-block"><!--card-body-->
                                    <!--form-->
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                                        <div class="form-group">
                                            <div class="col"><label for="cat-select-input" class=" form-control-label">Category:</label></div>
                                            <div class="col-12 col-md-12">
                                            	<select class="form-control" id="cat-select-input" name="category">
                                                <?php
                                                    echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
                                                
                                                    $result = viewAllCategory($row['category']);
                                                    if(!empty($result)){
                                                        while($rows = $result->fetch_assoc()){
                                                            echo '<option value="'.$rows['catname'].'">'.$rows['catname'].'</option>';
                                                          }
                                                        }
                                                ?>
                                            	</select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="topic-input" class=" form-control-label">Topic:</label></div>
                                            <div class="col-12 col-md-12"><input type="text" class="form-control" id="topic-input" value="<?= $row['topic'] ?>" placeholder="Topic" name="topic"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="subtopic-input" class=" form-control-label">Sub Topic: <span class="text-danger">(Optional)</span></label></div>
                                            <div class="col-12 col-md-12"><input type="text" class="form-control" id="subtopic-input"  value="<?= $row['sub_topic'] ?>" placeholder="Sub Topic" name="subtopic"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col"><label for="content" class=" form-control-label">Content:</label></div>
                                            <div class="col-12 col-md-12">
                                            	<textarea  id="content" name="content" class="form-control ckeditor" required autocomplete="off"> <?= $row['content'] ?>
                                                </textarea>
                                            </div>
                                        </div><br><br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="update-post"><i class="fa fa-check"></i> Update Post</button>
                                            <button type="reset" class="btn btn-warning" ><i class="fa fa-times"></i> Reset</button>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>\
        <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
       
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <!-- main script -->
        <script src="assets/js/main.js"></script>
        <script>
			CKEDITOR.replace( 'content', {
			    height: 300,
			    filebrowserUploadUrl: "upload_post_images.php"
			});
            jQuery(document).ready( function ($) {
                $(".side_menu").removeClass("active");
                $("#mpost").addClass("active");    
              });
		</script>
    </body>
</html>
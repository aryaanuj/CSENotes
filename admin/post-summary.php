<?php
require_once("check_login.php");
require_once('database/database_connection.php');
if(!isset($_GET['id']) || empty($_GET['id']))
{
  echo "<script>window.location.href='view-posts.php';</script>";
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
  <!-- datatable link -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- custom stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <style type="text/css">
      ul {
      display: block;
      list-style-type: disc;
      margin-block-start: 1em;
      margin-block-end: 1em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      padding-inline-start: 40px;
    }
    ol {
      display: block;
      list-style-type: decimal;
      margin-block-start: 1em;
      margin-block-end: 1em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      padding-inline-start: 40px;
    }
   
    </style>
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
      <!-- breadcrumb -->
      <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
          <div class="row m-0">
            <div class="col-sm-4">
              <div class="page-header float-left">
                <div class="page-title">
                  <h1>Post Summary</h1>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="page-header float-right">
                <div class="page-title">
                  <ol class="breadcrumb text-right">
                    <li><a>Dashboard</a></li>
                    <li><a>Manage Posts</a></li>
                    <li class="active">Post Summary</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- breadcrumb end -->
      <!-- ######################## Content ##########################-->
      <div class="content" style="height:auto !important;font-size:14px;">
        <!-- Animated -->
        <div class="animated fadeIn">
          <div class="card responsive-tab">
            <div class="card-body">
              <div class="ml-2">
                <article class="main-content col-md-12 pl-lg-4" style="text-align:justify !important;">
                  <?php
                  $result = viewPostById($_GET['id']);
                  if(!empty($result)){
                    while($row = $result->fetch_assoc()){
                      echo "<h1 class='mt-3'>".$row['topic']."</h1><br>";
                      echo "<span style='font-size:14px;position:relative;bottom:10px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
                      echo "<span class='my-2'>".$row['content']."</span><br>";
                    }
                  }
                  ?>
                </article>
              </div>
            </div>
          </div>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <!-- main script -->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
      jQuery(document).ready( function ($) {
        $('#cat_table').DataTable();
        $(".side_menu").removeClass("active");
        $("#mpost").addClass("active");
      });
    </script>
  </body>
  </html>
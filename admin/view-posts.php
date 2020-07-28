<?php
require_once("check_login.php");
require_once('database/database_connection.php');
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
                <h1>View Posts</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a>Dashboard</a></li>
                  <li><a>Manage Posts</a></li>
                  <li class="active">View Posts</li>
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
          <div class="card-header"><strong>View Posts</strong></div>
          <div class="card-body">
            <table class="table table-striped" id="cat_table" >
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Category</th>
                  <th>Topic</th>
                  <th>Sub-Topic</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = viewAllPosts();
                $output = '';
                if(!empty($result)){
                  $counter=0;
                  while($row = $result->fetch_assoc()){
                    $output .= '<tr>
                    <td>'.++$counter.'</td>
                    <td>'.$row['category'].'</td>
                    <td><a href="post-summary.php?id='.$row['id'].'" style="color:#03a9f3;">'.$row['topic'].'</a></td>
                    <td>'.$row['sub_topic'].'</td>
                    <td>'.ucfirst($row['status']).'</td>
                    <td>'.$row['post_date'].'</td>
                    <td>
                    <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="edit_post.php?id='.$row['id'].'" style="line-height:2;" class="pl-3 text-primary"><i class="fa fa-edit"></i> Edit</a></li>
                    <li><a style="line-height:2;" onclick="return confirm(\'Are you sure you want to delete this item?\')"
                    type="button" href="delete_post.php?id='.$row['id'].'"  class="pl-3 text-primary"><i class="fa fa-trash"></i> Delete</a></li>
                    <li>';
                    if($row['status']==="published"){
                      $output .='<a href="ChangePublishStatus.php?status=unpublished&id='.$row['id'].'" style="line-height:2;" class="pl-3 text-primary"><i class="fa fa-sign-out"></i> Unpublished</a>';
                    }
                    else{
                      $output .='<a href="ChangePublishStatus.php?status=published&id='.$row['id'].'" style="line-height:2;" class="pl-3 text-primary"><i class="fa fa-sign-in"></i> Published</a>';
                    }
                    $output .='
                    </li>
                    </ul>
                    </div></td>
                    </tr>';
                  }
                  echo $output;
                }
                ?>
              </tbody>
            </table>
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
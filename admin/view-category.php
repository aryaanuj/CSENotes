<?php
require_once("check_login.php");
require_once('database/database_connection.php');
$msg = '';
if(isset($_GET['available'])){
  if($_GET['available']==1){
    $msg ='<p class="alert alert-danger" style="border-left:10px solid red;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><i class="fa fa-times text-danger"></i> </strong>Posts exist related to this category, if you want to delete this category, you have to delete all posts related to this category first.</p>';
  }
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
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
  <div class="msg"><?= $msg ?></div>
    <!-- breadcrumb -->
    <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
        <div class="row m-0">
          <div class="col-sm-4">
            <div class="page-header float-left">
              <div class="page-title">
                <h1>View Category</h1>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="page-header float-right">
              <div class="page-title">
                <ol class="breadcrumb text-right">
                  <li><a>Dashboard</a></li>
                  <li><a>Manage Category</a></li>
                  <li class="active">View Category</li>
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
          <div class="card-header"><strong>View Category</strong></div>
          <div class="card-body">
            <table class="table table-striped" id="cat_table">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Category Name</th>
                  <th>Cat Image</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = viewAllCategory();
                if(!empty($result)){
                  $counter=0;
                  while($row = $result->fetch_assoc()){
                    echo '<tr>
                    <td>'.++$counter.'</td>
                    <td>'.$row['catname'].'</td>';
                    if(!empty($row['catimage'])){
                      echo '<td><img src="images/'.$row['catimage'].'" class="img-fluid" style="width:120px;height:60px;"></td>';
                    }
                    else{
                      echo '<td>No Image</td>';
                    }
                    echo '
                    <td>'.substr($row['description'], 0, 200).'</td>
                    <td>'.$row['create_date'].'</td>
                    <td>'.$row['status'].'</td>
                    <td><a href="edit_category.php?id='.$row['id'].'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> EDIT</a></td>
                    <td><a onclick="return confirm(\'Are you sure you want to delete this item?\')"
                          type="button" href="delete_category.php?id='.$row['id'].'"
                        class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> Delete</a></td>
                    </tr>';
                  }
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
  </div> <!-- right-panel end -->
  <!-- Footer -->
  <?php include("include/footer.php");?>
    <!-- site-footer end-->
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <!-- main script -->
  <script src="assets/js/main.js"></script>
</body>
</html>
<script type="text/javascript">
  jQuery(document).ready( function ($) {
    $('#cat_table').DataTable();
    $(".side_menu").removeClass("active");
    $("#mcat").addClass("active");
        
  });
</script>
<?php
require_once("check_login.php");
require_once("database/database_connection.php");
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

            <div class="content" style="height:90vh !important;">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row"> <!--row -->
                        <div class="col-lg-3 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                    <div class="stat-widget-five">  <!--card-inner -->
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <div class="stat-content">  <!--stat-content -->
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count"><?= getCategoryCount() ?></span></div>
                                                <div class="stat-heading">Total Category</div>
                                            </div>
                                        </div><!--stat content end -->
                                    </div> <!--card inner end-->
                                </div> <!--card body end-->
                            </div><!--card end -->
                        </div> <!--row inner col  end-->
                        <div class="col-lg-3 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                    <div class="stat-widget-five">  <!--card-inner -->
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="fa fa-sticky-note-o"></i>
                                        </div>
                                        <div class="stat-content">  <!--stat-content -->
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count"><?= getPostsCount() ?></span></div>
                                                <div class="stat-heading">Total <br>Posts</div>
                                            </div>
                                        </div><!--stat content end -->
                                    </div> <!--card inner end-->
                                </div> <!--card body end-->
                            </div><!--card end -->
                        </div> <!--row inner col  end-->
                        <div class="col-lg-3 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                    <div class="stat-widget-five">  <!--card-inner -->
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="fa fa-upload"></i>
                                        </div>
                                        <div class="stat-content">  <!--stat-content -->
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count1"><?= getPostsCountByStatus() ?></span></div>
                                                <div class="stat-heading">Published Posts</div>
                                            </div>
                                        </div><!--stat content end -->
                                    </div> <!--card inner end-->
                                </div> <!--card body end-->
                            </div><!--card end -->
                        </div> <!--row inner col  end-->
                        <div class="col-lg-3 col-md-6"> <!--row inner col -->
                            <div class="card"> <!--card -->
                                <div class="card-body"> <!--card body-->
                                    <div class="stat-widget-five">  <!--card-inner -->
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="fa fa-download"></i>
                                        </div>
                                        <div class="stat-content">  <!--stat-content -->
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count"><?= getPostsCountByStatus('unpublished') ?></span></div>
                                                <div class="stat-heading">Unpublished Posts</div>
                                            </div>
                                        </div><!--stat content end -->
                                    </div> <!--card inner end-->
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
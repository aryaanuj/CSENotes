<?php
require_once('admin/database/database_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CSENotes | Computer Science Notes</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon"> -->
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="css/styles.css" rel="stylesheet">
  <style type="text/css">
    .search-menu{
      border-radius:15px;
      height: 50px;
    }
  </style>
</head>
<body>
    <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container-fluid">
        <div id="logo" class="pull-left">
          <h1><a href="index.php" class="scrollto">CSENotes</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#about">Latest Course</a></li>
            <li class="menu-active" ><a href="">Library</a></li>
            <li><a href="index.php#contact">Contact</a></li>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->
        <!--==========================
        Intro Section
        ============================-->
        <section id="intro" style="height: 300px !important">
          <div class="intro-container">
            <div style="background-color:#5bc0de !important; width:100% !important;height: 300px!important;">
              <header class="section-header" style="position:relative;top:50%">
                <h3 class="section-title text-white">Library</h3>
              </header>
            </div>
          </div>
        </section><!-- #intro -->
        <main id="main">
          <!--==========================
          Portfolio Section
          ============================-->
          <section id="portfolio"  class="section-bg" >
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="shadow p-3 mb-5">
                    <input type="text" class="form-control search-menu" placeholder="Search..." id="search">
                  </div>
                  <br><br>
                </div>
              </div>
              <div class="row portfolio-container">
                <?php
                $result = viewAllCategory();
                while($row = $result->fetch_assoc()){
                  echo '<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                  <div class="portfolio-wrap">
                  <figure>
                  <img src="admin/images/'.$row['catimage'].'" class="img-fluid" style="width:100%;height:240px;" alt="">
                  <a href="admin/images/'.$row['catimage'].'" data-lightbox="portfolio" data-title="'.$row['catname'].'" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>';
                  if($row['status']==='published'){
                    echo ' <a href="explore_cat.php?cat='.$row['catname'].'" class="link-details" title="Learn More"><i class="ion ion-android-open"></i></a>
                    </figure>
                    <div class="portfolio-info">
                    <h4><a href="explore_cat.php?cat='.$row['catname'].'">'.$row['catname'].'</a></h4>';
                  }else{
                    echo ' <a href="#portfolio" class="link-details" title="Learn More"><i class="ion ion-android-open"></i></a>
                    </figure>
                    <div class="portfolio-info">
                    <h4><a href="#portfolio">'.$row['catname'].'</a></h4>
                    <p class="text-success">Upcoming Soon</p>';
                  }
                  echo '
                  </div>
                  </div>
                  </div>';
                }
                ?>
              </div>
            </div>
          </section><!-- #portfolio -->
        </main>
          <!--==========================
          Footer
          ============================-->
          <footer id="footer">
            <div class="container">
              <div class="copyright">
                &copy; Copyright <strong>CSENotes</strong>. All Rights Reserved
              </div>
              <div class="credits">
                Developed by <a href="https://www.linkedin.com/in/anuj-arya-b2b0a8170/">Anuj Arya</a>
              </div>
            </div>
          </footer><!-- #footer -->
          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
          <div id="preloader"></div>
          <!-- JavaScript Libraries -->
          <script src="lib/jquery/jquery.min.js"></script>
          <script src="lib/jquery/jquery-migrate.min.js"></script>
          <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="lib/easing/easing.min.js"></script>
          <script src="lib/superfish/hoverIntent.js"></script>
          <script src="lib/superfish/superfish.min.js"></script>
          <script src="lib/wow/wow.min.js"></script>
          <script src="lib/waypoints/waypoints.min.js"></script>
          <script src="lib/counterup/counterup.min.js"></script>
          <script src="lib/owlcarousel/owl.carousel.min.js"></script>
          <script src="lib/isotope/isotope.pkgd.min.js"></script>
          <script src="lib/lightbox/js/lightbox.min.js"></script>
          <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
          <!-- Template Main Javascript File -->
          <script src="js/main.js"></script>
          <script type="text/javascript">
            // live search
            jQuery(document).ready(function($){
              $('#search').keyup(function(){
                search_table($(this).val());
              });
              function search_table(value){
                $.ajax({
                  url:"library_search.php",
                  method:"post",
                  data:{txt:value},
                  success:function(data){
                    $(".portfolio-container").html(data);
                  }
                })
              }
            });
          </script>
        </body>
        </html>
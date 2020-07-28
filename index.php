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
</head>
<body>
    <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container-fluid">
        <div id="logo" class="pull-left">
          <h1><a href="#intro" class="scrollto">CSENotes</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="#intro">Home</a></li>
            <li><a href="#about">Latest Course</a></li>
            <li><a href="#clients">Library</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->
        <!--==========================
        Intro Section
        ============================-->
        <section id="intro">
          <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
              <ol class="carousel-indicators"></ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="carousel-background"><img src="img/intro-carousel/2.jpg" alt=""></div>
                  <div class="carousel-container">
                    <div class="carousel-content">
                      <h2>Welcom To CSENotes</h2>
                      <p>The Best Portal To Learn Technologies</p>
                      <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-background"><img src="img/intro-carousel/4.jpg" alt=""></div>
                  <div class="carousel-container">
                    <div class="carousel-content">
                      <h2>Welcom To CSENotes</h2>
                      <p>The Best Portal To Learn Technologies</p>
                      <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </section><!-- #intro -->
        <main id="main">
          <!--==========================
          Category  Section
          ============================-->
          <section id="about">
            <div class="container">
              <header class="section-header">
                <h3>Latest Course</h3>
                <br>
              </header>
              
              <div class="row about-cols">
                <?php
                $result = viewAllCategory();
                $counter = 0;
                while($row = $result->fetch_assoc()){
                  $counter++;
                  if($counter <= 3){
                    ?>
                    <div class="col-md-4 wow fadeInUp">
                      <div class="about-col">
                        <div class="img">
                          <img src="admin/images/<?= $row['catimage'] ?>" alt="" class="img-fluid" style="width:100vw; height:200px;">
                          <div class="icon"><i class="ion-ios-list-outline"></i></div>
                        </div>
                        <?php if($row['status']==='published'){ ?>
                          <h2 class="title"><a href="explore_cat.php?cat=<?= $row['catname'] ?>"><?= ucwords($row['catname']) ?></a></h2>
                          <p class="text-justify">
                            <?= substr($row['description'],0,300) ?>....
                          </p>
                          <p class="text-center" style="font-size:18px;"><a href="explore_cat.php?cat=<?= $row['catname'] ?>">Learn More&nbsp;&nbsp;<i style="font-size:17px;" class="ion-ios-arrow-right text-success"></i></a></p>
                        <?php }else{ ?>
                          <h2 class="title"><a href="#about"><?= ucwords($row['catname']) ?></a></h2>
                          <p class="text-justify">
                            <?= substr($row['description'],0,300) ?>....
                          </p>
                          <p class="text-center" style="font-size:18px;"><a href="#about">Upcoming Soon</a></p>
                        <?php } ?>
                      </div>
                    </div>
                  <?php }} ?>
                </div>
              </div>
            </section><!-- popular categories end -->
            
            <!--==========================
            Clients Section
            ============================-->
            <section id="clients" class="wow fadeInUp">
              <div class="container">
                <header class="section-header">
                  <h3>Library</h3>
                </header>
                <div class="owl-carousel clients-carousel">
                  <?php
                  $result = viewAllCategory();
                  $counter = 0;
                  while($row = $result->fetch_assoc()){
                    $counter++;
                    if($counter < 10){
                    ?>
                    <a href="explore_cat.php?cat=<?= $row['catname'] ?>"><img src="admin/images/<?= $row['catimage'] ?>" alt="" class="img-fluid p-2" style="width:350px;height: 200px;"></a>
                  <?php }} ?>
                </div><br>
                <center><a href="library.php" class="btn btn-info">Explore Library <i class="fa fa-external-link"></i> </a></center>
              </div>
            </section><!-- #clients -->


              <!--==========================
              Contact Section
              ============================-->
              <section id="contact" class="section-bg wow fadeInUp">
                <div class="container">
                  <div class="section-header">
                    <h3>Contact Us</h3>
                   <br>
                  </div>
                  <div class="row contact-info">
                    <div class="col-md-4">
                      <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address></address>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href=""></a></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">info@csenotes.in</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="form">
                    <div id="sendmessage"></div>
                    <div id="errormessage"></div>
                    <form  method="post" role="form" class="contactForm">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                          <div class="validation"></div>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                          <div class="validation"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validation"></div>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validation"></div>
                      </div>
                      <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
                    </form>
                  </div>
                </div>
              </section><!-- #contact -->
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
            <!-- Contact Form JavaScript File -->
            <script src="contactform/contactform.js"></script>
            <!-- Template Main Javascript File -->
            <script src="js/main.js"></script>
            <script type="text/javascript">
              $(document).ready(function(){

                $(".contactForm").submit(function(e){
                    e.preventDefault();
                    var formdata = $(this);
                    $.ajax({
                        url:"mailer.php",
                        method:"POST",
                        data: formdata.serialize(),
                        success:function(data){
                          if(data === "Thank You! Your message has been sent."){
                              $("#sendmessage").html(data);
                              $("#sendmessage").show();
                          }else{
                              $("#errormessage").html(data);
                              $("#errormessage").show();
                          }
                        }
                    });

                });
              });
            </script>
          </body>
          </html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>CSENotes</title>
        <!-- using online links -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- using local links -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/sidebar-themes.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
        <style type="text/css">
            .container-fluid{
                padding-right: 0px !important;
                    padding-left: 0px !important;
            }
        a{
        text-decoration: none !important;
        list-style: none;
        }
        .topics-list
        {
        position:relative;right:16px;
        color:gray;
        }
        #home-txt
        {
        position:absolute;top:30%;left:5%;
        }
        #home-img
        {
        float:right;width:500px;height: auto;margin-right:100px;
        }
        @media (max-width: 648px) {
        #home-img{
        float:right;width:300px;height: auto;margin-right:20px;margin-top:0px;
        }
        #home-txt
        {
        position:relative;top:0px;
        }
        }
        </style>
    </head>
    <body>
        <div class="page-wrapper light-theme">
            
            <!-- page-content  -->
            <main class="page-content">
                <div id="overlay" class="overlay"></div>
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <a class="navbar-brand font-weight-bold" href="#">CSENotes</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ABOUT US</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    STUDY MATERIAL
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CONTACT US</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                
                <div class="landing-page container-fluid bg-primary" style="width:100%;height:400px;margin:0;padding:0">
                    <div class="pt-5">
                        <div id="home-txt">
                            <h1 class="text-white">Welcome to CSENotes</h1>
                            <p class="text-white">The Best Portal to Learn Technologies</p>
                            <button class="btn btn-warning btn-lg" style="border-radius:40px;">Get Started</button>
                        </div>
                        <img src="img/4.png" id="home-img">
                    </div>
                </div>
                
                <div class="row p-lg-4">
                    <article class="main-content col-md-9 pr-lg-5">
                        <h4>All Categories</h4><hr>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn" style="border:1px solid red; height:200px;">
                                <div class="card-body">
                                    <center>
                                    <img src="img/html.png" class="img-fluid">
                                    </center>
                                </div>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn" style="border:1px solid yellow; height:200px;">
                                <div class="card-body">
                                    <center>
                                    <img src="img/javascript.jpg" class="img-fluid">
                                    
                                    </center>
                                </div>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn" style="border:1px solid violet; height:200px;">
                                <div class="card-body">
                                    <center>
                                    <img src="img/bootstrap.jpg" class="img-fluid">
                                    <hr>
                                    <h5>Bootstrap</h5>
                                    </center>
                                </div>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn" style="border:1px solid blue;height:200px;">
                                <div class="card-body">
                                    <center>
                                    <img src="img/jquery.jpg" class="img-fluid">
                                    </center>
                                </div>
                                </button>
                            </div>
                        </div>
                        <br>
                        <h4>Topics</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-check-circle fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5><a href="" class="text-dark">Penetration Testing</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>What is Penetration Testing?</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-code fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5 ><a href="" class="text-dark">System Desgin</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>What is System Design?</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-list fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5><a href="" class="text-dark">Dummy</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>Dummy Text</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-list fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5 ><a href="" class="text-dark">Dummy</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>Dummy Text</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-list-alt fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5><a href="" class="text-dark">Loream Ipsum</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>What is Loream Ipsum?</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-book fa-2x text-primary"></i></div>
                                    <div class="col-md-9">
                                        <h5><a href="" class="text-dark">Dummy</a></h5>
                                        <!-- <span style="font-size:15px;" class="text-gray">The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum </span> -->
                                        <ul class="topics-list">
                                            <li>Dummy Text</li>
                                            <li>Loream Ipsum</li>
                                            <li>Dummy Text</li>
                                            <li style="list-style: none;"><a href="">Read More....</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <aside class="col-md-3 d-none d-md-block border-left">
                        <div class="widget widget-support-forum p-md-3 p-sm-2"> <span class="icon icon-forum"></span>
                        <h4>Looking for help? Join Community</h4>
                        <p>Couldn’t find what your are looking for ? Why not join out support forums and let us help you.</p> <a href="#" class="btn btn-light">Support Forum</a> </div>
                        <hr class="my-5">
                        <ul class="aside-nav nav flex-column">
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-1">Typography</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-2">Colors</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-3">File Tree</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-4">Table</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-5">Accordion</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-6">Video</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-7">Code</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-8">Alert</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-9">List</a> </li>
                            <li class="nav-item"> <a data-scroll="" class="nav-link text-dark" href="#section-10">Carousel</a> </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <!-- using online scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/prism.min.js"></script>
    <!-- using local scripts -->
    <script src="js/main.js"></script>
</body>
</html>
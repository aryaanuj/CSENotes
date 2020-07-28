<?php
require_once("admin/database/database_connection.php");
?>
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
</head>
<body>
    <div class="page-wrapper toggled light-theme">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand text-white font-weight-bold">CSENotes</div>
                <!-- sidebar-header  -->
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append"> <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span> </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu"> <span>TOC</span> </li>
                        <li class="sidebar-dropdown">
                            <a href="#"> <i class="fa fa-shopping-cart"></i> <span class="menu-text">Getting Started</span> <span class="badge badge-pill badge-primary">4</span> </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li> <a href="#">Setup home page layout
                                    </a> </li>
                                    <li> <a href="#">How do i add knowledgebase post</a> </li>
                                    <li> <a href="#">How do i change header navigation style globally</a> </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-book"></i> <span class="menu-text">Basic Usage</span> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-calendar"></i> <span class="menu-text">Customizing</span> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-folder"></i> <span class="menu-text">Troubleshooting</span> </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            </nav>
            <!-- page-content  -->
            <main class="page-content">
                <div id="overlay" class="overlay"></div>
                <div class="container-fluid">
                    <div class="row d-flex align-items-center p-3 border-bottom">
                        <div class="col-md-1">
                            <a id="toggle-sidebar" class="btn rounded-0 p-3" href="#"> <i class="fas fa-bars"></i> </a>
                        </div>
                        <div class="col-md-8">
                            <nav aria-label="breadcrumb" class="align-items-center">
                                <a href="index.html" class="breadcrumb-back" title="Back"></a>
                                <ol class="breadcrumb d-none d-lg-inline-flex m-0">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Layout 2</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-3 text-left"> <a href="https://sharebootstrap.com/docu-free-bootstrap-4-documentation-theme/" class="btn btn-sm btn-primary btn-rounded">Free Download</a> </div>
                    </div>
                    <div class="row p-lg-4">
                        <article class="main-content col-md-9 pr-lg-5">
                            <?php
                            $result = viewAllPosts("published");
                            if(!empty($result)){
                                while($row = $result->fetch_assoc()){
                                    echo "<h1 class='mt-3'>".$row['topic']."</h1><br>";
                                    echo "<span style='font-size:14px;position:relative;bottom:20px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
                                    echo "<span class='my-2'>".$row['content']."</span><br>";
                                }
                            }
                            ?>

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
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    console.log("done");
                    $('img').each(function(){
                        var imgsrc = $(this).attr('src');
                        $(this).attr('src','admin/'+imgsrc);
                        $(this).attr('class','img-fluid');
                        // console.log(imgsrc);
                    });
                });
            </script>
        </body>
    </html>


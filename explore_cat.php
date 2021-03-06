<?php
require_once("admin/database/database_connection.php");
if(!isset($_GET['cat']) || empty($_GET['cat']))
{
    echo "<script>window.location.href='index.php';</script>";
}
$category = $_GET['cat'];
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
    <link rel="stylesheet" type="text/css" href="css/main_style.css">
    <link rel="stylesheet" href="css/sidebar-themes.css">
    <!-- <link rel="shortcut icon" type="image/png" href="img/favicon.png" /> -->
</head>
<body>
    <div class="page-wrapper toggled light-theme">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand text-white font-weight-bold"><a href="index.php" >CSENotes</a></div>
                <!-- sidebar-header  -->
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search..." id="search">
                            <div class="input-group-append"> <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span> </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu"> <span><?= $category ?></span> </li>
                        <?php
                        $result = getAllTopicsByCategory($category,"published");
                        $counter = 0;
                        if(!empty($result)){
                            while($row = $result->fetch_assoc()){
                                $res = getSubTopics($row['topic']);
                                $flag = false;
                                $output = '';
                                $active = '';
                                $style = 'display:none';
                                if($counter==0){$active = 'active';$style="display:block";}
                                $counter++;
                                if(!empty($res)){
                                    while($rows = $res->fetch_assoc()){
                                        if($rows['sub_topic']!=='NO'){
                                            $output .= '<li class="topics" id="sub-'.$rows['sub_topic'].'"  data-cat="'.$category.'" data-topic="'.$row['topic'].'" data-subtopic="'.$rows['sub_topic'].'"> <a  >'.$rows['sub_topic'].'</a> </li>';
                                            $flag = true;
                                        }
                                    }
                                }
                                if($flag===false){
                                    echo ' <li class="topics '.$active.'"  id="'.$row['topic'].'"  data-cat="'.$category.'" data-topic="'.$row['topic'].'" data-subtopic="">
                                    <a href="#" > <i class="fa fa-list"></i> <span class="menu-text">'.$row['topic'].'</span> </a>
                                    <div class="sidebar-submenu">
                                    <ul>';
                                }
                                else{
                                    echo ' <li class="sidebar-dropdown '.$active.'" id="'.$row['topic'].'" >
                                    <a href="#"> <i class="fa fa-list"></i> <span class="menu-text">'.$row['topic'].'</span> </a>
                                    <div class="sidebar-submenu" style="'.$style.'">
                                    <ul>';
                                }
                                echo $output;
                                echo '</ul></div></li>';
                            }
                        }
                        ?>
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
                                <li class="breadcrumb-item"><a href="explore_cat.php?cat=<?= $category ?>">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-3 text-left"> 
                        <a href="index.php#about" class="btn btn-sm btn-primary btn-rounded">Popular Categories</a>
                        <a href="library.php" class="btn btn-sm btn-primary btn-rounded">Library</a> 
                    </div>
                </div>
                <div class="row p-lg-4">
                    <article class="main-content col-md-12 pr-lg-5 text-justify" id="article">
                        <?php
                        $result = getCurrentPost($category);
                        $counter = 0;
                        if(!empty($result)){
                            while($row = $result->fetch_assoc()){
                                $counter++;
                                if($row['sub_topic']==='NO'){
                                    echo "<h1 class='mt-3'>".$row['topic']."</h1><br>";
                                    echo "<span style='font-size:14px;position:relative;bottom:20px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
                                    echo "<span class='my-2'>".$row['content']."</span><br>";
                                }else{
                                    echo "<h1 class='mt-3'>".$row['sub_topic']."</h1><br>";
                                    echo "<span style='font-size:14px;position:relative;bottom:20px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
                                    echo "<span class='my-2'>".$row['content']."</span><br>";
                                }
                            }
                        }
                        if($counter===0){
                            echo "<h3 class='my-2 text-center'>Result Not Found!!</h3><br>";
                        }
                        ?>
                    </article>
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
        <script src="js/main2.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('img').each(function(){
                    var imgsrc = $(this).attr('src');
                    $(this).attr('src','admin/'+imgsrc);
                    $(this).attr('class','img-fluid');
                });
            });
            jQuery('.topics').click(function(){
                var cat=jQuery(this).data('cat');
                var id = jQuery(this).attr('id');
                var topic=jQuery(this).data('topic');
                var subtopic = jQuery(this).data('subtopic');
                jQuery.ajax({
                    url:'fetch_article.php',
                    method:'get',
                    data:{cat:cat, topic:topic, subtopic:subtopic},
                    success:function(data){
                        $("#article").html(data);
                        $('li').each(function(){
                            $(this).removeClass('active');
                            if(id.indexOf("sub-") == -1){
                                $(".sidebar-submenu").removeAttr('style');
                            }
                        });
                        $("#"+id).addClass('active');
                        $('img').each(function(){
                            var imgsrc = $(this).attr('src');
                            $(this).attr('src','admin/'+imgsrc);
                            $(this).attr('class','img-fluid');
                        });
                    }
                });
            });

            // live search
            jQuery(document).ready(function($){
                $('#search').keyup(function(){
                    search_table($(this).val());
                });
                function search_table(value){
                    $('ul li').each(function(){
                        var found = 'false';
                        $(this).each(function(){
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                            {
                                found = 'true';
                            }
                        });
                        if(found == 'true')
                        {
                            $(this).show();
                        }
                        else
                        {
                            $(this).hide();
                        }
                    });
                }
            });
        </script>
    </body>
    </html>
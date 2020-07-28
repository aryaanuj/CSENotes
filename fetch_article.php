<?php
require_once('admin/database/database_connection.php');
if(!isset($_GET['cat'])){
    echo "<script>window.location.href='index.php';</script>";
}
$category = $_GET['cat'];
$topic = isset($_GET['topic']) ? $_GET['topic'] : "";
$subtopic = isset($_GET['subtopic']) ? $_GET['subtopic'] : "";
$result = getLatestPost($category, $topic, $subtopic);
$output='';
if(!empty($result)){
    while($row = $result->fetch_assoc()){
        if($row['sub_topic']==='NO'){
            $output .="<h1 class='mt-3'>".$row['topic']."</h1><br>";
            $output .= "<span style='font-size:14px;position:relative;bottom:20px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
            $output .= "<span class='my-2'>".$row['content']."</span><br>";
        }else{
           $output .= "<h1 class='mt-3'>".$row['sub_topic']."</h1><br>";
            $output .= "<span style='font-size:14px;position:relative;bottom:20px;' class='text-muted'>Posted Date: ".$row['post_date']."</span><br>";
            $output .= "<span class='my-2'>".$row['content']."</span><br>";
        }
    }
}
echo $output;
?>
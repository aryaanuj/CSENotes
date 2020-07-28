<?php
require_once("check_login.php");
require_once("database/database_connection.php");
if(isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['id']) && !empty($_GET['id'])){
	$status = clean_data($_GET['status']);
	$id = clean_data($_GET['id']);
	$post_date = date('Y-m-d H:i:s');
	$query = $con->prepare("UPDATE tbl_posts SET status=?, post_date=? WHERE id=?");
	$query->bind_param('sss', $status, $post_date, $id);
	$query->execute();
}
echo "<script>window.location.href='view-posts.php';</script>";
?>
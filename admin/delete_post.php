<?php
require_once('database/database_connection.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
	// delete category
	$id = clean_data($_GET['id']);
	$query = $con->prepare('DELETE FROM tbl_posts WHERE id=?');
	$query->bind_param('i',$id);
	$query->execute();
}

echo "<script>window.location.href='view-posts.php';</script>";

?>
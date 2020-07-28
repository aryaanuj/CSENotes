<?php
require_once("check_login.php");
require_once('database/database_connection.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
	// delete category
	$id = clean_data($_GET['id']);
	$img = viewCategoryById($id)->fetch_assoc()['catimage'];
	$query = $con->prepare('DELETE FROM tbl_category WHERE id=?');
	$query->bind_param('i',$id);
	$query->execute();
	unlink("images/".$img);
}

echo "<script>window.location.href='view-category.php';</script>";

?>
<?php
require_once("check_login.php");
require_once('database/database_connection.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
	// delete category
	$id = clean_data($_GET['id']);
	$img = viewCategoryById($id)->fetch_assoc()['catimage'];
	$catname = viewCategoryById($id)->fetch_assoc()['catname'];
	while($row = viewAllPosts()->fetch_assoc()){
		if($row['category']===$catname){
			echo "<script>window.location.href='view-category.php?available=1';</script>";
			exit;
		}
	}
	$query = $con->prepare('DELETE FROM tbl_category WHERE id=?');
	$query->bind_param('i',$id);
	$query->execute();
	unlink("images/".$img);
}

echo "<script>window.location.href='view-category.php';</script>";

?>
<?php
@session_start();
if(!isset($_SESSION['admin']) || !isset($_SESSION['logged_in'])){
	echo "<script>window.location.href='index.php';</script>";
}	
?>
<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['logged_in']);
echo "<script>window.location.href='index.php';</script>";
?>
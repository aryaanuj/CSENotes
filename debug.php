<?php

require_once("admin/database/database_connection.php");
$result = mysqli_query($con, "SELECT * FROM tbl_posts");
while($row = mysqli_fetch_array($result)){
	echo "<pre>".$row['content']."<pre><br>";
}


?>
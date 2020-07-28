<?php
@session_start();
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
try
{
	$SERVER = 'localhost';
	$USER 	= 'root';
	$PASS 	= '';
	$DB 	= 'db_csenotes';

	// database connection stablish
	$con = mysqli_connect($SERVER, $USER, $PASS, $DB);

	if(!$con){
		echo "Connection Failed";
		exit;
	}

	// sanitize data
	function clean_data($string)
	{
		global $con;
		$string = strip_tags(trim($string));
		$string = addslashes($string);
		$string = htmlspecialchars($string);
		$string = mysqli_real_escape_string($con, $string);
		return $string;
	}

	
	#######################################################################
	#																	  #
	#						ADMIN SECTION							  	  #	
	#																      #
	#######################################################################

	//SIGN IN
	function authenticate($username, $password, $token){
		global $con;
		if($token !== $_SESSION['csrf_token']){
			return showErrorMsg("CSRF token not matched!!!");
		}
		$uesrname = clean_data($username);
		$password = md5(clean_data($password));
		if(!empty($username) && !empty($password)){
			$query = $con->prepare("SELECT * FROM tbl_admin WHERE username=? AND password=?");
			$query->bind_param('ss', $username,$password);
			$query->execute();
			$result = $query->get_result();
			$count = 0;
			while($row = $result->fetch_assoc()){
				$count++;
			}
			$query->close();
			if($count===0){
				return showErrorMsg("Invalid Username and Password!!");
			}else{
				$_SESSION['logged_in'] = true;
				$_SESSION['admin'] = $username;
				session_regenerate_id(true);
				return "success";
			}
		}
		else{
			return showErrorMsg("All Fields are required");
		}
	}
	//GET ALL DETAIL OF ADMIN
	function getAdminDetail(){
		global $con;
		$username = clean_data($_SESSION['admin']);
		$query = $con->prepare("SELECT * FROM tbl_admin WHERE username=? ");
			$query->bind_param('s', $username);
			$query->execute();
			$result = $query->get_result();
			return $result;
	}

	//UPDATE PROFILE PIC
	function updateAdminProfile($imgname, $destination){
		global $con;
		$img_name_array = explode(".", $imgname);
		$username = clean_data($_SESSION['admin']);
		$ext = end($img_name_array);
		$imgname = time().'.'.$ext;
		$img = 'images/'.$imgname;
		$allowed_extension = array("jpg", "gif", "png");
		if(in_array($ext, $allowed_extension))
		{
			move_uploaded_file($destination, 'images/' . $imgname);
			$sql = $con->prepare("UPDATE tbl_admin SET profile = ? WHERE username = ?");
			$sql->bind_param('ss', $img, $username);
			if($sql->execute())
			{
				return showSuccessMsg("Profile Picture has been updated successfully!!");
			}
			else{
				return showErrorMsg("Something Went Wrong!!"); 
			}	
		}
		else
		{
			return showErrorMsg("Invalid Image Type!!");
		}
	}

	//UPDATE PASSWORD
	function updateAdminPass($password, $cnfpass, $token){
		global $con;
		if(($token !== $_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])){
			return showErrorMsg("CSRF Token Not Matched!!");
			exit;
		}
		$password = md5(clean_data($password));
		$cnfpass = md5(clean_data($cnfpass));
		$username = clean_data($_SESSION['admin']);
		if($password === $cnfpass){
			$sql = $con->prepare("UPDATE tbl_admin SET password = ? WHERE username = ?");
			$sql->bind_param('ss', $password, $username);
			if($sql->execute())
			{
				return showSuccessMsg("Password has been updated successfully!!");
			}
			else{
				return showErrorMsg("Something Went Wrong!!"); 
			}	
		}
		else{
			return showErrorMsg("Password Not Matched!!");
		}
	}

	#######################################################################
	#																	  #
	#						CATEGORY SECTION							  #	
	#																      #
	#######################################################################

	// insert category
	function insertCategory($catname,$imgname,$destination,$status,$description, $token)
	{
		global $con;
		if(($token !== $_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])){
			return showErrorMsg("CSRF Token Not Matched!!");
			exit;
		}
		$catname = clean_data($catname);
		$description = clean_data($description);
		$status = clean_data($status);
		$img_name_array = explode(".", $imgname);
		$ext = end($img_name_array);
		$allowed_extension = array("jpg", "gif", "png");
		if(checkCategoryExist($catname)){
			return showErrorMsg("Category Alreay Exist!!");
			exit;
		}
		$create_date = date('Y-m-d H:i:s');
		if(in_array($ext, $allowed_extension))
		{
			move_uploaded_file($destination, 'images/' . $imgname);
			$sql = $con->prepare("INSERT INTO tbl_category (catname,catimage,description,create_date,status) VALUES (?, ?, ?, ?, ?)");
			$sql->bind_param('sssss', $catname, $imgname, $description,$create_date,$status);
			if($sql->execute())
			{
				return showSuccessMsg("Category inserted!!");
			}
			else{
				return showErrorMsg("Something Went Wrong!!");
			}
			$sql->close();
		}
		else{
			return showErrorMsg("Invalid Image Type!!");
		}
	}

	//check category alreay exist or not
	function checkCategoryExist($catname)
	{
		global $con;
		$query = $con->prepare("SELECT * FROM tbl_category WHERE catname = ?");
		$query->bind_param('s',$catname);
		$query->execute();
		$query->store_result();
		return $query->num_rows > 0 ? true : false;
	}


	// view all categories
	function viewAllCategory($e=''){
		global $con;
		if(empty($e)){
			$query = $con->prepare("SELECT * FROM tbl_category ORDER BY create_date DESC");
		}
		else{
			$query = $con->prepare("SELECT * FROM tbl_category WHERE catname != ? ORDER BY create_date DESC");
			$query->bind_param('s',$e);
		}
		$query->execute();
		$result = $query->get_result();
		return $result;
	}

	// view category by id
	function viewCategoryById($id){
		global $con;
		$id = clean_data($id);
		$query = $con->prepare("SELECT * FROM tbl_category WHERE id=?");
		$query->bind_param('i', $id);
		$query->execute();
		$result = $query->get_result();
		return $result;
	}

	// update category
	function updateCategory($catname, $id, $imgname='', $destination='', $description, $status,$token){
		global $con;
		if(($token !== $_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])){
			return showErrorMsg("CSRF Token Not Matched!!");
			exit;
		}
		$catname = clean_data($catname);
		$id 	 = clean_data($id);
		$description = clean_data($description);
		$create_date = date('Y-m-d H:i:s');
		if(empty($imgname) || empty($destination)){
			$sql=$con->prepare("UPDATE tbl_category SET catname = ?,description = ?,status=?, create_date = ? WHERE id = ?");
			$sql->bind_param('ssssi', $catname, $description, $status, $create_date, $id);
		}
		else{
			$img_name_array = explode(".", $imgname);
			$ext = end($img_name_array);
			$allowed_extension = array("jpg", "gif", "png");
			if(in_array($ext, $allowed_extension))
			{
				move_uploaded_file($destination, 'images/' . $imgname);
				$sql=$con->prepare("UPDATE tbl_category SET catname = ?, catimage = ?, description = ?, status=?, create_date = ? WHERE id = ?");
				$sql->bind_param('sssssi', $catname, $imgname, $description, $status, $create_date, $id);
			}
			else{
				return showErrorMsg("Invalid Image Type!!");
			}
		}
		
		if($sql->execute())
		{
			return showSuccessMsg("Category updated!!");
		}
		else{
			return showErrorMsg("Something Went Wrong!!");
		}
		$sql->close();
	}

	#######################################################################
	#																	  #
	#						POST SECTION							      #	
	#																      #
	#######################################################################

	// insert Post
	function insertPost($catname,$topic,$subtopic,$status,$content, $token)
	{
		global $con;
		if(($token !== $_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])){
			return showErrorMsg("CSRF Token Not Matched!!");
			exit;
		}
		$catname = clean_data($catname);
		$topic = clean_data($topic);
		$status = clean_data($status);
		$subtopic = clean_data($subtopic);
		if(empty($subtopic)){
			$subtopic = "NO";
		}
		if(checkTopicCatExist($topic, $catname, $subtopic)){
			return showErrorMsg("Topic Alreay Exist!!");
			exit;
		}
		$post_date = date('Y-m-d H:i:s');
		$sql = $con->prepare("INSERT INTO tbl_posts (category, topic, sub_topic, status, content, post_date) VALUES (?, ?, ?, ?, ?, ?)");
		$sql->bind_param('ssssss', $catname,$topic,$subtopic,$status,$content,$post_date);
		if($sql->execute())
		{
			return showSuccessMsg("Post inserted!!");
		}
		else{
			return showErrorMsg("Something Went Wrong!!");
		}
		$sql->close();
	}

	//get sub topic
	function getSubTopics($topic){
		global $con;
		$topic = clean_data($topic);
		$query = $con->prepare("SELECT DISTINCT sub_topic FROM tbl_posts WHERE topic = ? ORDER BY post_date ASC");
		$query->bind_param('s',$topic);
		$query->execute();
		$result = $query->get_result();
		return $result;
	}
	//check Topic alreay exist or not
	function checkTopicCatExist($topic, $catname, $subtopic)
	{
		global $con;
		$query = $con->prepare("SELECT * FROM tbl_posts WHERE topic = ? AND category = ? AND sub_topic=?");
		$query->bind_param('sss',$topic, $catname, $subtopic);
		$query->execute();
		$query->store_result();
		return $query->num_rows > 0 ? true : false;
	}


	// view all posts
	function viewAllPosts($status = ''){
		global $con;
		if(empty($status)){
			$query = $con->prepare("SELECT * FROM tbl_posts ORDER BY post_date DESC");
		}else{
			$query = $con->prepare("SELECT DISTINCT * FROM tbl_posts WHERE status = ? ORDER BY post_date DESC");
			$query->bind_param('s',$status);
		}
		$query->execute();
		$result = $query->get_result();
		return $result;
	}

	// view posts by id
	function viewPostById($id){
		global $con;
		$id = clean_data($id);
		$query = $con->prepare("SELECT * FROM tbl_posts WHERE id=?");
		$query->bind_param('i', $id);
		$query->execute();
		$result = $query->get_result();
		return $result;
	}
	//get current post
	function getCurrentPost($category){
		global $con;
		$status = "published";
		$category = clean_data($category);
		$query = $con->prepare("SELECT DISTINCT * FROM tbl_posts WHERE status = ? AND category=? ORDER BY post_date ASC LIMIT 1");
		$query->bind_param('ss',$status, $category);
		$query->execute();
		$result = $query->get_result();
		return $result;
	}
	//get all topics by category
	function getAllTopicsByCategory($category,$status = ''){
		global $con;
		$status = clean_data($status);
		$category = clean_data($category);
		if(empty($status)){
			$query = $con->prepare("SELECT DISTINCT topic FROM tbl_posts WHERE category = ? ORDER BY post_date ASC");
			$query->bind_param('s',$category);
		}else{
			$query = $con->prepare("SELECT DISTINCT topic FROM tbl_posts WHERE category = ? AND status=? ORDER BY post_date ASC");
			$query->bind_param('ss',$category,$status);
		}
		$query->execute();
		$result = $query->get_result();
		return $result;
	}
	//get latest post
	function getLatestPost($category, $topic='', $subtopic=''){
		global $con;
		$status = "published";
		$category = clean_data($category);
		$topic = clean_data($topic);
		$subtopic = clean_data($subtopic);
		if(empty($topic) && empty($subtopic)){
			$query = $con->prepare("SELECT * FROM tbl_posts WHERE status=? AND category=? ORDER BY post_date ASC LIMIT 1");
			$query->bind_param('ss', $status, $category);
		}
		else if(!empty($topic) && empty($subtopic)){
			$query = $con->prepare("SELECT * FROM tbl_posts WHERE status=? AND category=? AND topic=? ");
			$query->bind_param('sss', $status, $category, $topic);
		}
		else{
			$query = $con->prepare("SELECT * FROM tbl_posts WHERE status=? AND category=? AND topic=? AND sub_topic=?");
			$query->bind_param('ssss', $status, $category, $topic, $subtopic);
		}
		$query->execute();
		$result = $query->get_result();
		return $result;
	}
	// view all posts
	function getAllTopics($status = ''){
		global $con;
		if(empty($status)){
			$query = $con->prepare("SELECT DISTINCT topic FROM tbl_posts ORDER BY post_date DESC");
		}else{
			$query = $con->prepare("SELECT DISTINCT topic FROM tbl_posts WHERE status = ? ORDER BY post_date DESC");
			$query->bind_param('s',$status);
		}
		$query->execute();
		$result = $query->get_result();
		return $result;
	}

	// update category
	function updatePost($catname,$topic,$subtopic,$content, $token, $id){
		global $con;
		if(($token !== $_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])){
			return showErrorMsg("CSRF Token Not Matched!!");
			exit;
		}
		$catname = clean_data($catname);
		$id 	 = clean_data($id);
		$topic = clean_data($topic);
		$subtopic = clean_data($subtopic);
		$post_date = date('Y-m-d H:i:s');
		if(empty($subtopic)){
			$subtopic = "NO";
		}
		$sql = $con->prepare("UPDATE tbl_posts SET category = ?, topic = ?, sub_topic=?, content = ?, post_date = ? WHERE id = ?");
		$sql->bind_param('sssssi', $catname,$topic,$subtopic,$content,$post_date, $id);
		if($sql->execute())
		{
			return showSuccessMsg("Post Updated!!");
		}
		else{
			return showErrorMsg("Something Went Wrong!!");
		}
		$sql->close();
	}



	// csrf token
	function csrf_token(){
		$token = bin2hex(random_bytes(32));
		$_SESSION['csrf_token'] = $token;
		return $token;
	}

	// show error msg
	function showErrorMsg($msg)
	{
		$msg = '<p class="alert alert-danger" style="border-left:10px solid red;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><i class="fa fa-times text-danger"></i> </strong> '.$msg.'</p>';
		return $msg;
	}

	// show success msg
	function showSuccessMsg($msg)
	{
		$msg = '<p class="alert alert-success" style="border-left:10px solid green;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong><i class="fa fa-check text-success"></i> Success!</strong> '.$msg.'</p>';
		return $msg;
	}

	#######################################################################
	#																	  #
	#						Count items							  	  	  #	
	#																      #
	#######################################################################

	//total categories
	function getCategoryCount(){
		global $con;
		$query = $con->prepare("SELECT * FROM tbl_category");
		$query->execute();
		$query->store_result();
		return $query->num_rows;
	}

	//total posts
	function getPostsCount(){
		global $con;
		$query = $con->prepare("SELECT * FROM tbl_posts");
		$query->execute();
		$query->store_result();
		return $query->num_rows;
	}

	//total published post
	function getPostsCountByStatus($status='published'){
		global $con;
		$query = $con->prepare("SELECT * FROM tbl_posts WHERE status=?");
		$query->bind_param("s", $status);
		$query->execute();
		$query->store_result();
		return $query->num_rows;
	}

}
catch(PDOException $e)
{
	echo "Error ".$e->getMessage();
}


?>
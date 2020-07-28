<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
	require_once("admin/database/database_connection.php");
	$txt = "%".$_POST['txt']."%";
	$output = '';
	$query = $con->prepare("SELECT * FROM tbl_category WHERE catname LIKE ?");
	$query->bind_param('s', $txt);
	$query->execute();
	$result = $query->get_result();
	$count=0;
	while($row = $result->fetch_assoc()){
		$count++;
		$output .='<div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
		<div class="portfolio-wrap">
		<figure>
		<img src="admin/images/'.$row['catimage'].'" class="img-fluid" style="width:100%;height:240px;" alt="">
		<a href="admin/images/'.$row['catimage'].'" data-lightbox="portfolio" data-title="'.$row['catname'].'" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>';
		if($row['status']==='published'){
			$output .= ' <a href="explore_cat.php?cat='.$row['catname'].'" class="link-details" title="Learn More"><i class="ion ion-android-open"></i></a>
			</figure>
			<div class="portfolio-info">
			<h4><a href="explore_cat.php?cat='.$row['catname'].'">'.$row['catname'].'</a></h4>';
		}else{
			$output .=' <a href="#portfolio" class="link-details" title="Learn More"><i class="ion ion-android-open"></i></a>
			</figure>
			<div class="portfolio-info">
			<h4><a href="#portfolio">'.$row['catname'].'</a></h4>
			<p class="text-success">Upcoming Soon</p>';
		}
		$output .='
		</div>
		</div>
		</div>';

	}
	if($count===0){
		$output = "<center><h3 class='text-center'>No Result Found!!</h3></center>";
		echo $output;
	}else{
		echo $output;
	}
}
else{
	echo "<script>window.location.href='index.php';</script>";
}
?>
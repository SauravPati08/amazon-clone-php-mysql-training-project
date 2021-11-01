<?php

	include "includes/dbconn.php";
	session_start();

	$user_id = $_SESSION['user_id'];
	$product_id = $_POST['product_id'];
	$rating = $_POST['rating'];
	$title = $_POST['title'];
	$body = $_POST['body'];
	$date = date("Y/m/d");

	$query = "INSERT INTO reviews (review_id,user_id,product_id,rating,review_title,review_text,review_date) VALUES (NULL,$user_id,$product_id,$rating,'$title','$body','$date')";

	if(mysqli_query($conn,$query)){
		header('Location:description.php?product_id='.$product_id);
	}else{
		echo "Error in adding review. Go back";
	}

?>
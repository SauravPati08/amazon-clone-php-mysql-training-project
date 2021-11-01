<?php

	include "includes/dbconn.php";
	session_start();

	$user_id = $_SESSION['user_id'];
	$current_password = $_POST['old'];
	$new_password = $_POST['new'];

	$query = "SELECT * FROM users WHERE user_id = $user_id";
	$result = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($result);

	if($result['password'] == $current_password){
		// change the password
		$query2 = "UPDATE users SET password = '$new_password' WHERE user_id = $user_id";
		if(mysqli_query($conn,$query2)){
			header('Location:profile.php?message=1');
		}else{
			header('Location:profile.php?message=2');
		}
	}else{
		header('Location:profile.php?message=0');
	}

?>
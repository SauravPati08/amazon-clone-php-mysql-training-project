<?php

//1. Connect to Database
// $conn = mysqli_connect("localhost","root","","amazon"); // $conn gets connection object

include "includes/dbconn.php";

// start the session
session_start();
//2. Receive from data
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];

$query3 = "SELECT * FROM users WHERE email LIKE '$email'";
$result2 = mysqli_query($conn,$query3);
$num_rows = mysqli_num_rows($result2);

if($num_rows == 0){

	//3. Insert into database
	$query = "INSERT INTO users (user_id,name,email,password) VALUES (NULL,'$name','$email','$password')";
	//  For executing query
	if(mysqli_query($conn,$query)){
	// search users table --> on basis of email
	$query2 = "SELECT * FROM users WHERE email LIKE '$email'";
	$result = mysqli_query($conn,$query2);
	$result = mysqli_fetch_assoc($result);
	//user_id
	$_SESSION['user_id'] = $result['user_id'];
	//name
	$_SESSION['name'] = $result['name'];
	header('Location:profile.php');
	}else{
	echo "Registration Failed";
	}
}else{
	echo "Email already exists";
}


?>
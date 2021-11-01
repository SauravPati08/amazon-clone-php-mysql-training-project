<?php

 // 1. Receive HTML Data --> $_POST --> superglobal variable

// $conn = mysqli_connect("localhost","root","","amazon"); // $conn gets connection object
include "includes/dbconn.php";
session_start(); // session is associative array where we can add new key-value pair

 // 2. Connecting PHP File with Database

$email = $_POST['user_email'];
$password = $_POST['user_password'];

 // 3. Search Query --> SELECT

$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";

 // For executing query

$result = mysqli_query($conn,$query);

$num_rows = mysqli_num_rows($result);

$result = mysqli_fetch_assoc($result);

 // 4. Compare  HTML data with Database Data

if($num_rows == 1){
	// set session (means adding new key-value pair)
	$_SESSION['name'] = $result['name'];
	$_SESSION['user_id'] = $result['user_id'];
	header('Location:profile.php');
}else{
	echo "Incorrect email/password";
}


?>
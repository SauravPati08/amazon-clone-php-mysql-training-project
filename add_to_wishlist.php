<?php

// insertion into wishlist table
include "includes/dbconn.php";
session_start();

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$query = "INSERT INTO wishlist (id,user_id,product_id) VALUES (NULL,$user_id,$product_id)";

if(mysqli_query($conn,$query)){
	echo "Success";
}else{
	echo "Failed";
}

?>
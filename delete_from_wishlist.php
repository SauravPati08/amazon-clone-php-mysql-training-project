<?php

// insertion into wishlist table
include "includes/dbconn.php";
session_start();

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$query = "DELETE FROM wishlist WHERE user_id = $user_id AND product_id = $product_id";

if(mysqli_query($conn,$query)){
	echo "Success";
}else{
	echo "Failed";
}

?>
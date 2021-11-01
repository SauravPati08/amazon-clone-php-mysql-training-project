<?php

// insertion into cart table
include "includes/dbconn.php";
session_start();

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$query = "INSERT INTO cart (id,user_id,product_id,quantity) VALUES (NULL,$user_id,$product_id,1)";

if(mysqli_query($conn,$query)){
	echo "Success";
}else{
	echo "Failed";
}

?>
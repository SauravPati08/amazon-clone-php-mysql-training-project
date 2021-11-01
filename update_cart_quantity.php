<?php

include "includes/dbconn.php";
session_start();

$product_id = $_POST['product_id'];
$sign = $_POST['sign'];
$user_id = $_SESSION['user_id'];
if($sign == '+'){
	$query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id";
}else{
	$query = "UPDATE cart SET quantity = quantity - 1 WHERE user_id = $user_id AND product_id = $product_id";
}


if(mysqli_query($conn,$query)){
	echo "1";
}else{
	echo "0";
}

?>
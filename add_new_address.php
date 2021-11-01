<?php

include "includes/dbconn.php";
session_start();

$user_id = $_SESSION['user_id'];
$details = $_POST['details'];
$phone = $_POST['phone'];
$pincode = $_POST['pincode'];
$order_id = $_POST['order_id'];

$query = "INSERT INTO address (address_id,user_id,details,phone,pincode) VALUES (NULL,$user_id,'$details','$phone','$pincode')";

if(mysqli_query($conn, $query)){
	header('Location:show_address.php?order_id='.$order_id);
}else{
	echo "Some error occured";
}


?>
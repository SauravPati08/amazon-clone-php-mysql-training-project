<?php


include "includes/dbconn.php";
session_start();

$order_id = $_GET['order_id'];
$address_id = $_GET['address_id'];
$user_id = $_SESSION['user_id'];
$query = "UPDATE orders SET address=$address_id WHERE user_id=$user_id";

if(mysqli_query($conn,$query)){
	header('Location:show_payment_options.php?order_id='.$order_id);
}else{
	echo "Some error occured. Go back.";
}

?>
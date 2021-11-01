<?php

include "includes/dbconn.php";
session_start();

// insert a row into orders table

// generate order_id

$order_id = uniqid();

// user_id (from session)

$user_id = $_SESSION['user_id'];

// amount(from front end)

$amount = $_POST['amount'];

// generate date

$date = date("Y/m/d");

// address (initially blank or 0)

// status of order (initially 0 means payment pending)

$query = "INSERT INTO orders (order_id,user_id,amount,order_date,address,status,payment_method) VALUES ('$order_id',$user_id,$amount,'$date',0,0,'pending')";
if(mysqli_query($conn, $query)){
	// order details 
	$query1 = "SELECT * FROM cart WHERE user_id = $user_id";
	$result1 = mysqli_query($conn, $query1);

	while($row = mysqli_fetch_assoc($result1)){
		$product_id = $row['product_id'];
		$quantity = $row['quantity'];

		$query2 = "INSERT INTO order_details (id,order_id,product_id, quantity) VALUES (NULL,'$order_id',$product_id,$quantity)";

		mysqli_query($conn, $query2);
		
	}
	echo $order_id;
}else{
	echo 0;
}

?>
<?php

include "includes/dbconn.php";

$user_input = $_POST['user_input'];
$query = "SELECT * FROM discount WHERE coupon_name LIKE '$user_input'";
$result = mysqli_query($conn,$query);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
	echo "invalid";
}else{
	$result = mysqli_fetch_assoc($result);
	if($result['coupon_status'] == 'active'){
		// semd the coupon discount value
		echo $result['coupon_value'];
	}else{
		echo "expired";
	}
}


?>
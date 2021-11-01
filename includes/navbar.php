<?php

session_start();
if(empty($_SESSION)){
	$logged_in = 0;
}else{
	$logged_in = 1;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Amazon</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">
	
</head>

<script type="text/javascript">
	$(document).ready(function(){
		$('#register-popup').click(function(){
			// close bootstrap modal jquery
			$('#exampleModal').modal('hide');
			$('#exampleModal2').modal('show');
		})
	})
</script>

<body>

	<div class="bg-amazon" style="height: 60px; padding: 10px;">

		<div class="row">

			<div class="col-md-3">
				<h2 class="text-white"><a href="index.php" style="text-decoration: none; color: white;" class="ml-3">Amazon</a></h2>
			</div>

			<div class="col-md-7">

				<form action="search.php" method="GET">
					<input placeholder="Search Products" type="text" class="form-control" name="term" style="width: 80%; display: inline;">
					<input type="submit" class="btn btn-warning" style="margin-top: -5px;" value="Search">
				</form>

			</div>

			<div class="col-md-2">

				<div class="text-md-center">
					
					<?php

						if($logged_in == 1){
							// echo '<h5 class="text-white">Hi '.$_SESSION['name'].'</h5>';
							echo '<div class="dropdown" style="display: inline;">
									<i class="text-white fa-2x fas fa-user mr-5" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    		<a class="dropdown-item" href="#">Hi '.$_SESSION['name'].'</a>
							    		<a class="dropdown-item" href="profile.php">My Profile</a>
							    		<a class="dropdown-item" href="orders.php">My Orders</a>
							    		<a class="dropdown-item" href="user_wishlist.php">My Wishlist</a>
							    		<a class="dropdown-item" href="logout.php">Logout</a>
							  		</div>
							  	</div>';

							// echo '<a href="logout.php" class="btn btn-warning btn-sm">Logout</a>';
							echo '<a href="cart.php"><i class="text-white fa-2x fas fa-shopping-cart"></i></a>';
						}else{
							echo '<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Login</button>';
						}

					?>

				</div>
				
				

			</div>

		</div>

	</div>
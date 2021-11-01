<?php

include "includes/navbar.php";

?>

	<div class="jumbotron">
		

		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="https://m.media-amazon.com/images/I/71FB7jdSipL._SX3000_.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="https://m.media-amazon.com/images/I/71S4svVhf9L._SX3000_.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="https://m.media-amazon.com/images/I/71nffY8FrCL._SX3000_.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="https://m.media-amazon.com/images/I/71fEJJk3qOL._SX3000_.jpg" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>


	</div>

	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<h3 class="mb-4">Top Clothing Products</h3>
			</div>

			<?php
				//1. Connect to Database
				$conn = mysqli_connect("localhost","root","","amazon"); // $conn gets connection object

				$query = "SELECT * FROM products WHERE category LIKE 'Clothing' LIMIT 4";
				$result = mysqli_query($conn, $query);
		

				while ($row = mysqli_fetch_assoc($result)) {
					// code...
					$img = substr(explode(',', $row['bg_img'])[0],1);
					echo '<div class="col-md-3">
				
							<div class="card">
								<img src='.$img.'>
								<div class="card-body">
									<h4>'.$row['name'].'</h4>
									<p>Rs '.$row['price'].' </p>
									<a href="description.php?product_id='.$row['product_id'].'" class="btn btn-warning btn-block">View</a>
								</div>
							</div>

						</div>';
				}
				
			?>
		</div>

		<div class="row">
			
			<div class="col-md-12">
				<h3 class="mb-4">Top Footwear</h3>
			</div>

			<?php
				//1. Connect to Database
				$conn = mysqli_connect("localhost","root","","amazon"); // $conn gets connection object

				$query = "SELECT * FROM products WHERE category LIKE 'Footwear' LIMIT 4";
				$result = mysqli_query($conn, $query);
		

				while ($row = mysqli_fetch_assoc($result)) {
					// code...
					$img = substr(explode(',', $row['bg_img'])[0],1);
					echo '<div class="col-md-3">
				
							<div class="card">
								<img src='.$img.'>
								<div class="card-body">
									<h4>'.$row['name'].'</h4>
									<p>Rs '.$row['price'].' </p>
									<a href="description.php?product_id='.$row['product_id'].'" class="btn btn-warning btn-block">View</a>
								</div>
							</div>

						</div>';
				}
				
			?>


		</div>
		<div class="row">
			
			<div class="col-md-12">
				<h3 class="mb-4">Top Furniture</h3>
			</div>

			<?php
				//1. Connect to Database
				$conn = mysqli_connect("localhost","root","","amazon"); // $conn gets connection object

				$query = "SELECT * FROM products WHERE category LIKE 'Furniture' LIMIT 4";
				$result = mysqli_query($conn, $query);
		

				while ($row = mysqli_fetch_assoc($result)) {
					// code...
					$img = substr(explode(',', $row['bg_img'])[0],1);
					echo '<div class="col-md-3">
				
							<div class="card">
								<img src='.$img.'>
								<div class="card-body">
									<h4>'.$row['name'].'</h4>
									<p>Rs '.$row['price'].' </p>
									<a href="description.php?product_id='.$row['product_id'].'" class="btn btn-warning btn-block">View</a>
								</div>
							</div>

						</div>';
				}
				
			?>


		</div>

	</div>







	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="login_validation.php" method="POST" >
	        	<label>Email</label><br>
	        	<input class="form-control" type="email" name="user_email"><br>
	        	<label>Password</label><br>
	        	<input class="form-control" type="password" name="user_password"><br><br>
	        	<input type="submit" name="" value="Login" class="btn btn-warning">
	        </form>

	        <div>
	        	<p class="mt-3">Not a member? <a id="register-popup" href="#">Sign Up</a></p>
	        </div>

	      </div>
	    </div>
	  </div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="reg_validation.php" method="POST" >
	        	<label>Name</label><br>
	        	<input class="form-control" type="text" name="user_name"><br>
	        	<label>Email</label><br>
	        	<input class="form-control" type="email" name="user_email"><br>
	        	<label>Password</label><br>
	        	<input class="form-control" type="password" name="user_password"><br><br>
	        	<input type="submit" name="" value="Register" class="btn btn-warning">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>





</body>
</html>
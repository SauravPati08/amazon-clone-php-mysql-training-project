<?php
	include "includes/navbar.php";
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mt-5">My Wishlist</h2>
		</div>
	</div>

		<div class="row">
			<?php

			include "includes/dbconn.php";
			$user_id = $_SESSION['user_id'];

			$query = "SELECT * FROM wishlist w JOIN products p ON p.product_id = w.product_id WHERE w.user_id = $user_id";
			$result = mysqli_query($conn,$query);

			while($row = mysqli_fetch_assoc($result)){
				$img = substr(explode(',', $row['bg_img'])[0],1);
				echo '<div class="col-md-4">
						<div class="card">
							<img src='.$img.'>
							<div class="card-body">
								<h4>'.$row['name'].'</h4>
								<p>Rs '.$row['price'].'</p>
								<a href="description.php?product_id='.$row['product_id'].'" class="btn btn-warning btn-block">View</a>
							</div>
						</div>
					</div>';
				}


			?>
			
		</div>
</div>
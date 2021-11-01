<?php
	include "includes/navbar.php";
	include "includes/dbconn.php";
	$user_id = $_SESSION['user_id'];
	$order_id = $_GET['order_id'];
?>

<div class="container">

	<div class="row mt-5">

		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<h4>Select Address</h4>
				</div>

				<?php

					$query = "SELECT * FROM address WHERE user_id = $user_id";

					$result = mysqli_query($conn, $query);
					$counter = 0;

					while($row = mysqli_fetch_assoc($result)){
						echo '<div class="col-md-12 mt-3">
								<div class="card">
									<div class="card-body">
										<p>
											'.$row['details'].'<br>
											'.$row['phone'].'<br>
											Pin Code - '.$row['pincode'].'
										</p>
										<a href="update_address.php?address_id='.$row['address_id'].'&order_id='.$order_id.'" class="btn btn-sm btn-warning">Select this address</a>
									</div>
								</div>
							</div>';
							$counter++;
					}
					if($counter == 0){
						echo '<div class="col-md-12 mt-3">
								<h4>You dont have any addresses</h4>
							</div>';
					}

				?>



				<div class="col-md-12"></div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<h4>Add New Address</h4>
					<form action="add_new_address.php" method="POST">
						<label>Address Details</label><br>
						<textarea class="form-control" name="details"></textarea><br>
						<label>Phone</label><br>
						<input type="text" name="phone" class="form-control"><br>
						<label>Pin Code</label><br>
						<input type="text" name="pincode" class="form-control"><br>
						<input type="hidden" name="order_id" value="<?php echo $order_id;?>">
						<input type="submit" name="" value="Add Address" class="btn btn-warning">

					</form>
				</div>
			</div>
		</div>

	</div>
</div>
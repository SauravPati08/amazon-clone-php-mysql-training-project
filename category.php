<?php

include "includes/navbar.php";

?>

<?php

$category = $_GET['category'];

?>

<div class="container mt-5">
	
	<div class="row mt-5">
		<div class="col-md-12">
			<h1><?php echo "All Products in ".$category; ?></h1>
		</div>
	</div>

	<div class="row">

		<?php
			include "includes/dbconn.php";

			$query = "SELECT * FROM products WHERE category LIKE '$category'";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
				$img = substr(explode(',', $row['bg_img'])[0],1);
				echo '<div class="col-md-3">
				
						<div class="card">
							<img src='.$img.'>
							<div class="card-body">
								<h4>'.$row['name'].'</h4>
								<p>Rs '.$row['price'].' </p>
								<a href="description.php?product_id='.$row['product_id'].'" class="btn btn-warning btn-block">Shop now</a>
							</div>
						</div>

					</div>';
			}
		?>
		
	</div>

</div>
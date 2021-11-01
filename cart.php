<?php
	include "includes/navbar.php";
?>

<script type="text/javascript">
	$(document).ready(function(){

		$('#checkout').click(function(){
			var amount = $('#total-amount').text();

			$.ajax({
				url: 'place_order.php',
				method: 'POST',
				data: {'amount':amount},
				success: function(data){
					// redirect to select address page
					window.location.href = "http://localhost/amazon/show_address.php?order_id=" + data;
				},
				error: function(error){

				}
			})
		})

		$('#coupon-btn').click(function(){
			var user_input = $('#coupon-code').val();
			$.ajax({
				url: 'apply_coupon.php',
				method: 'POST',
				data: {'user_input':user_input},
				success:function(data){
					if(data === 'invalid'){

						$('#coupon-message').html("<p style='color:red;'>Coupon code invalid</p>");

					}else if(data === 'expired'){
						$('#coupon-message').html("<p style='color:red;'>Coupon expired</p>");

					}else{

						$('#coupon-message').html("<p style='color:green;'>Coupon applied successfully</p>");
						var total = $('#total-amount').text();
						var discount_value = Math.round(Number(data)/100 * Number(total));
						var new_total = total - discount_value;
						$('#total-amount').text(new_total);
						$('#coupon-discount-value').text(discount_value);
					}
					$('#coupon-code').val('');

				},
				error:function(error){

				}
			})
		})





		$('.change-quantity').click(function(){
			
			var quantity = $(this).siblings('span').text();
			var price = $(this).parent().parent().siblings('.col-md-7').children('h5').children('span').text();
			var total = $('#total-amount').text();
			var product_id = $(this).data('id');
			var sign = $(this).text();


			if(sign === '+'){
				$(this).siblings('span').text(Number(quantity) + 1);
				$('#total-amount').text(Number(total) + Number(price));
				$('#tax').text(Math.round((Number(total) + Number(price))*0.18));
			}else{
				$(this).siblings('span').text(Number(quantity) - 1);
				$('#total-amount').text(Number(total) - Number(price));
				$('#tax').text(Math.round((Number(total) - Number(price))*0.18));
			}
			
			
			$.ajax({
				url: 'update_cart_quantity.php',
				method: 'POST',
				data:{'product_id':product_id,'sign':sign},
				success:function(data){
					console.log(data);
				},
				error:function(error){
					console.log(error);
				}
			})
		})
	})
</script>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mt-5 mb-5">My Cart</h2>
		</div>
	</div>

		<div class="row">

			<div class="col-md-9">
				
					<?php

				include "includes/dbconn.php";
				$user_id = $_SESSION['user_id'];

				$query = "SELECT * FROM cart w JOIN products p ON p.product_id = w.product_id WHERE w.user_id = $user_id";
				$result = mysqli_query($conn,$query);

				$total = 0;
				$counter = 0;
				while($row = mysqli_fetch_assoc($result)){
					$counter++;
					$total = $total + ($row['price'] * $row['quantity']);
					$img = substr(explode(',', $row['bg_img'])[0],1);
					echo '<div class="col-md-12">
							<div class="card">
								<div class="row">
									<div class="col-md-2">
										<img src='.$img.' style="width: 100%; height: auto; padding: 10px;">
									</div>

									<div class="col-md-7 p-3">
										<h3>'.$row['name'].'</h3>
										<h5>Rs <span>'.$row['price'].'</span></h5>
									</div>

									<div class="col-md-3">
										<div class="p-5">
											<button class="btn btn-sm btn-warning change-quantity" data-id="'.$row['product_id'].'">-</button>
											<span>'.$row['quantity'].'</span>
											<button class="btn btn-sm btn-warning change-quantity" data-id="'.$row['product_id'].'">+</button>
										</div>
									
									</div>

								</div>
							</div>
						</div>';
					}

					if($counter == 0){
						echo '<h4>Cart is empty</h4>';
					}
				?>

			</div>
			
			<?php

				if($counter != 0){
					echo '<div class="col-md-3">
							<div class="card">
								<div class="card-body">

									<div class="row">
										<div class="col-md-6">Total Price</div>
										<div class="col-md-6 mb-2">Rs <span id="total-amount">'.$total.'</span></div>
										<div class="col-md-6">Discount</div>
										<div class="col-md-6 mb-2">Rs <span id="coupon-discount-value">0</span></div>
										<div class="col-md-6">Total Tax</div>
										<div class="col-md-6 mb-2">Rs <span id="tax">'.$total*0.18.'</span></div>
										<div class="col-md-12">
											<p>Apply Discount</p>
											<div id="coupon-message"></div>
											<input type="text" name="" class="form-control" id="coupon-code">
											<button class="btn btn-sm btn-warning mt-2" id="coupon-btn">Apply</button>
										</div>
										<div class="col-md-12">
											<button class="btn bg-amazon btn-block text-white mt-2" id="checkout">Checkout</button>
										</div>
									</div>

								</div>
								
							</div>
						</div>';
				}

			?>
			
			
	</div>

	<div class="row">
		
	</div>
</div>
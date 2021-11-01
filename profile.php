<?php
	include "includes/navbar.php";
	if(!empty($_GET)){
		$message = $_GET['message'];
	}else{
		$message = 'empty';
	}
	
?>
<script type="text/javascript">
	$(document).ready(function(){
		var message = <?php echo $message; ?>;
		if(message !=='empty'){
			if(message === 0){
				$('#message').text('Password does not match');
			}else if(message === 2){
				$('#message').text('Some error occured. Try again');
			}else{
				$('#message').text('Password has changed successfully');
			}
			$('#exampleModal').modal('show');
		}
		
	})
</script>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 text-md-center mt-5">
			<i class="fas fa-5x fa-user mt-5" style="font-size: 160px;"></i>
			<h1 class="mt-3"><?php echo $_SESSION['name'] ?></h1>

			<div class="card mt-4">
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item"><a href="orders.php">My Orders</a></li>
			    <li class="list-group-item"><a href="user_wishlist.php">My Wishlist</a></li>
			    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#exampleModal">Change Password</a></li>
			    <li class="list-group-item"><a href="logout.php">Logout</a></li>
			  </ul>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<div id="message"></div>

        <form action="change_password.php" method="POST">
        	<label>Current Password</label><br>
        	<input type="password" name="old" class="form-control"><br>
        	<label>New Password</label><br>
        	<input type="password" name="new" class="form-control"><br>
        	<input type="submit" name="" value="Change Password" class="btn btn-warning">
        </form>
      </div>
    </div>
  </div>
</div>
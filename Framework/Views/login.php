<?php
    require_once('nav.php');
?>

<div class="limiter">
	<div class="container">
		<div class="">
			<form action="<?php echo FRONT_ROOT ?>Student/LogIn" method="GET">
				<div class="form-group" >
					<span style="color: red"><?php echo $message ?> <br></span>
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" require>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	


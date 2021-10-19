<?php
    require_once('nav.php');
?>

<div class="limiter">
	<div class="container">
		<div class="">
			<form action="<?php echo FRONT_ROOT ?>Student/Search" method="GET">
				<div class="form-group" >
					<span style="color: red"><?php echo $message ?> <br></span>
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" require>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" require>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	


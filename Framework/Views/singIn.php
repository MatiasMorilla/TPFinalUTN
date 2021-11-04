<?php
    require_once('nav.php');
?>

<div class="limiter">
	<div class="container">
		<div class="">
			<form action="<?php echo FRONT_ROOT ?>Student/CreateStudent" method="GET">
				<div class="form-group" >
					<label for="exampleInputEmail1">Email address: </label>
                    <span style="font-weight: bold"> <?php echo $email ?></span>
                    <input type="email" name="email" value="<?php echo $email ?>" style="display:none">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Crea una contraseña</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" require>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	


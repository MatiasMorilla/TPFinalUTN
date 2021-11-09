<?php
    require_once('nav.php');
?>

<div class="limiter">
	<div class="container">
		<div class="">
			<form action="<?php echo FRONT_ROOT ?>User/Search" method="POST">
				<div class="form-group" >
					<label for="exampleInputEmail1">Email address: </label>
                    <span style="font-weight: bold"> 
                        <?php echo $email ?>
                     </span>
				</div>
                <input type="email" name="email" 
                    value="<?php echo $email ?>" 
                        style="display: none">
				<div class="form-group">
					<label for="exampleInputPassword1">Ingrese su contraseña</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" require>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	


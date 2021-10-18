<?php 
    require_once("nav.php");

?>


<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo $companyName ?> </h2>
                    <p><strong>Email: </strong> <?php echo $companyEmail ?>. </p>
                    <p><strong>Numero de telefono: </strong> <?php echo $companyPhoneNumber ?> </p>
                    <p><strong>Direccion </strong> <?php echo $companyAddress ?> </p>
                    <p><strong>Cuil </strong> <?php echo $companyCuil ?> </p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="../assets/Globant_.png" alt="" class="img-circle img-responsive">
                    </figure>
                </div>
            </div>            
    	 </div>                 
		</div>
	</div>
</div>



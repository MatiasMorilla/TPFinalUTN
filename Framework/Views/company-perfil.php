<?php 
    require_once("nav.php");

?>


<div class="container mt-4">
	<div class="row">
           
                            
                <div class="col-6">
                    <figure>
                        <img src="../assets/Globant_.png" alt="" class="img-circle img-responsive" style="width:100%">
                    </figure>
                </div>   
                <div class="col-6" style="box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3); background-color:white;border-radius:10px">
                    <h2 class="text-center mb-4 mt-3" style="text-transform:uppercase"><?php echo $companyName ?> </h2>
                    <p><strong>Email: </strong> <?php echo $companyEmail ?>. </p>
                    <p><strong>Numero de telefono: </strong> <?php echo $companyPhoneNumber ?> </p>
                    <p><strong>Direccion </strong> <?php echo $companyAddress ?> </p>
                    <p><strong>Cuil </strong> <?php echo $companyCuil ?> </p>
                </div> 
	</div>
</div>



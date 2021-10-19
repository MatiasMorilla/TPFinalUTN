<?php 
    require_once("nav.php");
    require_once("session-valid.php");
?>


<div class="container mt-4">
	<div class="row">
           
                            
                <div class="col-6">
                    <figure>
                        <img src="../assets/Globant_.png" alt="" class="img-circle img-responsive" style="width:100%">
                    </figure>
                </div>   
                <div class="col-6" style="box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3); background-color:white;border-radius:10px">
                    <h2 class="text-center mb-4 mt-3" style="text-transform:uppercase"><?php echo $studentFinded->getName() . " " . $studentFinded->getLastName()?> </h2>
                    <p><strong>Email: </strong> <?php echo $studentFinded->getEmail() ?>. </p>
                    <p><strong>Legajo: </strong> <?php echo $studentFinded->getFileNumber() ?>. </p>
                    <p><strong>DNI: </strong> <?php echo $studentFinded->getDni() ?>. </p>
                    <p><strong>Genero: </strong> <?php echo $studentFinded->getGender() ?>. </p>
                    <p><strong>Fecha de nacimiento: </strong> <?php echo $studentFinded->getBirthDate() ?>. </p>
                    <p><strong>Numero de telefono: </strong> <?php echo $studentFinded->getPhoneNumber() ?>. </p>
                    <p><strong>Carrera: </strong> <?php echo $studentFinded->getCareer() ?>. </p>
                    <p><strong>Estado: </strong> <?php echo $studentFinded->getStudyStatus() ?>. </p>
                </div> 
	</div>
</div>
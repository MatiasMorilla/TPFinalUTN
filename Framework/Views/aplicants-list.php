<?php
    require_once('nav.php');
/*     require_once("session-valid.php"); */

    use DAO\JobDAO as JobDAO;
    $jobDAO = new JobDAO();
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="row">
                    <div class="col-4">
                         <h2 class="mb-4">Listado de postulaciones</h2>
                    </div>
               </div>
               
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Puesto</th>
                         <th>cv</th>
                         <th>Descripcion</th>
                         <th>Fecha</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($aplicantsList as $key => $aplicant)
                              {
                                   $job = $jobDAO->getJobByIdJobOffer($aplicant->getIdjobOffer());

                                   if(!isset($_SESSION["company"]))
                                   {
                                        ?>
                                             <tr>
                                                  <td><?php echo $aplicant->getIdStudent() ?></td>
                                                  <td><?php echo $job->getPosition() ?></td>
                                                  <td><?php echo $aplicant->getCv() ?></td>
                                                  <td><?php echo $aplicant->getAplicantDescription() ?></td>
                                                  <td><?php echo $aplicant->getAplicantDate() ?></td>
                                             </tr>
                                        <?php
                                   }
                                   else
                                   {
                                        $company = $_SESSION["company"];
                                        if($job->getCompany() == $company->getName())
                                        {
                                             ?>
                                                  <tr>
                                                       <td><?php echo $aplicant->getIdStudent() ?></td>
                                                       <td><?php echo $job->getPosition() ?></td>
                                                       <td><?php echo $aplicant->getCv() ?></td>
                                                       <td><?php echo $aplicant->getAplicantDescription() ?></td>
                                                       <td><?php echo $aplicant->getAplicantDate() ?></td>
                                                  </tr>
                                             <?php
                                        }
                                   }
                              }
                         ?>
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php
    require_once('nav.php');
/*     require_once("session-valid.php"); */

    use DAO\JobDAO as JobDAO;
    use DAO\StudentDAO as StudentDAO;
    $jobDAO = new JobDAO();
    $studentDAO = new StudentDAO();
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
                                   $student = $studentDAO->GetStudentById($aplicant->getIdStudent());
                                   
                                   if(!isset($_SESSION["company"]))
                                   {
                                        ?>
                                             <tr>
                                                  <td><?php echo $aplicant->getIdStudent() ?></td>
                                                  <td><?php echo $job->getPosition() ?></td>
                                                  <td><?php echo $aplicant->getCv() ?></td>
                                                  <td><?php echo $aplicant->getAplicantDescription() ?></td>
                                                  <td><?php echo $aplicant->getAplicantDate() ?></td>
                                                  <td>
                                                       <div class="d-flex">
                                                            <form action="<?php echo FRONT_ROOT ?>Aplicants/Remove" method="POST">
                                                                 <!-- <input type="text" value="<?php /*echo $student[0]->getEmail();*/ ?>" name="email" style="display:none" > -->
                                                                 <input type="text" value="matiasmorilla@hotmail.com" name="email" style="display:none" >
                                                                 <input type="text" value="<?php echo $student[0]->getFileNumber(); ?>" name="id" style="display:none" >
                                                                 <input type="text" value="<?php echo $aplicant->getIdJobOffer(); ?>" name="idJobOffer" style="display:none" >
                                                                 <button class="btn btn-secondary my-2 my-sm-0" type="submit">Eliminar</button>
                                                            </form>
                                                       </div> 
                                                  </td>
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

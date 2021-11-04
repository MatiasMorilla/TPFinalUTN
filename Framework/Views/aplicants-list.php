<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="row">
                    <div class="col-4">
                         <h2 class="mb-4">Listado aplicantes</h2>
                    </div>
               </div>
               
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Id estudiante</th>
                         <th>id jobOffer</th>
                         <th>cv</th>
                         <th>Descripcion</th>
                         <th>Fecha</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($aplicantsList as $aplicant)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $aplicant->getIdStudent() ?></td>
                                             <td><?php echo $aplicant->getIdjobOffer() ?></td>
                                             <td><?php echo $aplicant->getCv() ?></td>
                                             <td><?php echo $aplicant->getAplicantDescription() ?></td>
                                             <td><?php echo $aplicant->getAplicantDate() ?></td>
                                             <td>
                                             <div class="d-flex">
                                                  <form action="<?php echo FRONT_ROOT ?>Company/ShowCompany" method="GET">
                                                       <input type="text" name="name" value="<?php echo $aplicant->getName() ?>" style="display:none" />
                                                       <button class="btn btn-secondary my-2 my-sm-0" type="submit">Mas informacion</button>
                                                  </form>
                                             </td>
                                        </tr>
                                   <?php
                              }
                         ?>

                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>

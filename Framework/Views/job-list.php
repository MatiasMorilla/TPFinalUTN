<?php
    require_once('nav.php');
/*     require_once("session-valid.php"); */
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="row">
                    <div class="col-4">
                         <h2 class="mb-4">Listado de empleos</h2>
                    </div>
                    <div class="col">
                         <div class="row">
                              <div class="col-9">
                                   <form action="<?php echo FRONT_ROOT ?>Job/SearchJob" method="GET">
                                        <div class="row" style="float:right">
                                             <div class="col-9">
                                                  <input class="form-control mr-sm-2" type="search" placeholder="Ingrese el puesto" aria-label="Search" name="position" >
                                             </div>
                                             <div class="col-3" >
                                                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Buscar</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="col">
                                   <form action="<?php echo FRONT_ROOT ?>Job/ShowListView" method="GET">
                                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Limpiar Filtro</button>
                                   </form>
                              </div>
                         </div>   
                    </div>
               </div>
               
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Empresa</th>
                         <th>Puesto</th>
                         <th>Carrera</th>
                         <th>Descripcion</th>
                         <th>Requisitos</th>
                         <th>Beneficios</th>
                         <th>Fecha</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($jobList as $job)
                              {
                                   if(isset($_SESSION["company"]))
                                   {
                                        $company = $_SESSION["company"];
                                        if($job->getCompany() == $company->getName())
                                        {
                                             if($career == $job->getId_career()){
                                                  ?>
                                                       <tr>
                                                            <td><?php echo $job->getCompany() ?></td>
                                                            <td><?php echo $job->getPosition() ?></td>
                                                            <td><?php echo $job->getId_career() ?></td>
                                                            <td><?php echo $job->getDescription() ?></td>
                                                            <td><?php echo $job->getRequirements() ?></td>
                                                            <td><?php echo $job->getBenefits() ?></td>
                                                            <td><?php echo $job->getDate() ?></td>
                                                            <td>
                                                            <div class="d-flex">
                                                                 <?php
                                                                      if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                      {
                                                                           ?>
                                                                                <form action="<?php echo FRONT_ROOT ?>Job/ShowModify" method="GET">
                                                                                     <input type="text" name="id_position" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                                     <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                                </form>
                                                                           <?php
                                                                      }
                                                                      else
                                                                      {
                                                                           ?>
                                                                               <form action="<?php echo FRONT_ROOT ?>Student/ShowApply" method="GET">
                                                                                <?php $student = $_SESSION["student"] ?>
                                                                                <input type="text" name="IdJobOffer" value="<?php echo $job->getIdjobOffer() ?>" style="display:none" />
                                                                                <input type="text" name="fileNumber" value="<?php echo $student->getFileNumber() ?>" style="display:none" />
                                                                                <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Postularse</button>
                                                                               </form>
                                                                           <?php
                                                                      }
                                                                 ?> 
                                                             </div> 
                                                            </td>
                                                       </tr>
                                                  <?php
                                                  }else if($career == null){
               
                                                  ?>
                                                       <tr>
                                                           <td><?php echo $job->getCompany() ?></td>
                                                           <td><?php echo $job->getPosition() ?></td>
                                                           <td><?php echo $job->getId_career() ?></td>
                                                           <td><?php echo $job->getDescription() ?></td>
                                                           <td><?php echo $job->getRequirements() ?></td>
                                                           <td><?php echo $job->getBenefits() ?></td>
                                                           <td><?php echo $job->getDate() ?></td>
                                                           <td>
                                                           <div class="d-flex">
                                                               <?php
                                                                   if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                   {
                                                                       ?>
                                                                           <form action="<?php echo FRONT_ROOT ?>Job/ShowModify" method="GET">
                                                                                <input type="text" name="id_position" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                                <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                           </form>
                                                                       <?php
                                                                   }
                                                                   else
                                                                   {
                                                                        ?>
                                                                           <form action="<?php echo FRONT_ROOT ?>Aplicants/ShowApply" method="GET">
                                                                                <?php $student = $_SESSION["student"] ?>
                                                                                <input type="text" name="IdJobOffer" value="<?php echo $job->getIdjobOffer() ?>" style="display:none" />
                                                                                <input type="text" name="fileNumber" value="<?php echo $student->getFileNumber() ?>" style="display:none" />
                                                                                <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Postularse</button>
                                                                           </form>
                                                                      <?php
                                                                   }
                                                               ?> 
                                                           </div> 
                                                           </td>
                                                            <td>
                                                                 <?php
                                                                   if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                   {
                                                                       ?>
                                                                       <form action="<?php echo FRONT_ROOT ?>Job/RemoveJob" method="POST">
                                                                           <input type="text" name="IdJobOffer" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                           <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Eliminar</button>
                                                                      </form>
                                                                 <?php
                                                                   }
                                                                 ?>
                                                            </td>
                                                            <td>
                                                                 <?php
                                                                      if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                      {
                                                                           ?>
                                                                                <form action="<?php echo FRONT_ROOT ?>Job/PrintAplicants" method="POST">
                                                                                     <input type="text" name="IdJobOffer" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                                     <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Imprimir</button>
                                                                                </form>
                                                                           <?php
                                                                      }
                                                                 ?>
                                                            </td>
                                                       </tr>
                                                  <?php
                                                  }
                                        }
                                   }
                                   else
                                   {
                                        if($career == $job->getId_career()){
                                             ?>
                                                  <tr>
                                                       <td><?php echo $job->getCompany() ?></td>
                                                       <td><?php echo $job->getPosition() ?></td>
                                                       <td><?php echo $job->getId_career() ?></td>
                                                       <td><?php echo $job->getDescription() ?></td>
                                                       <td><?php echo $job->getRequirements() ?></td>
                                                       <td><?php echo $job->getBenefits() ?></td>
                                                       <td><?php echo $job->getDate() ?></td>
                                                       <td>
                                                       <div class="d-flex">
                                                            <?php
                                                                 if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                 {
                                                                      ?>
                                                                           <form action="<?php echo FRONT_ROOT ?>Job/ShowModify" method="GET">
                                                                                <input type="text" name="id_position" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                                <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                           </form>
                                                                      <?php
                                                                 }
                                                                 else
                                                                 {
                                                                      ?>
                                                                          <form action="<?php echo FRONT_ROOT ?>Student/ShowApply" method="GET">
                                                                           <?php $student = $_SESSION["student"] ?>
                                                                           <input type="text" name="IdJobOffer" value="<?php echo $job->getIdjobOffer() ?>" style="display:none" />
                                                                           <input type="text" name="fileNumber" value="<?php echo $student->getFileNumber() ?>" style="display:none" />
                                                                           <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Postularse</button>
                                                                          </form>
                                                                      <?php
                                                                 }
                                                            ?> 
                                                        </div> 
                                                       </td>
                                                  </tr>
                                             <?php
                                             }else if($career == null){
          
                                             ?>
                                                  <tr>
                                                      <td><?php echo $job->getCompany() ?></td>
                                                      <td><?php echo $job->getPosition() ?></td>
                                                      <td><?php echo $job->getId_career() ?></td>
                                                      <td><?php echo $job->getDescription() ?></td>
                                                      <td><?php echo $job->getRequirements() ?></td>
                                                      <td><?php echo $job->getBenefits() ?></td>
                                                      <td><?php echo $job->getDate() ?></td>
                                                      <td>
                                                      <div class="d-flex">
                                                          <?php
                                                              if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                              {
                                                                  ?>
                                                                      <form action="<?php echo FRONT_ROOT ?>Job/ShowModify" method="GET">
                                                                           <input type="text" name="id_position" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                           <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                      </form>
                                                                  <?php
                                                              }
                                                              else
                                                              {
                                                                   ?>
                                                                      <form action="<?php echo FRONT_ROOT ?>Aplicants/ShowApply" method="GET">
                                                                           <?php $student = $_SESSION["student"] ?>
                                                                           <input type="text" name="IdJobOffer" value="<?php echo $job->getIdjobOffer() ?>" style="display:none" />
                                                                           <input type="text" name="fileNumber" value="<?php echo $student->getFileNumber() ?>" style="display:none" />
                                                                           <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Postularse</button>
                                                                      </form>
                                                                 <?php
                                                              }
                                                          ?> 
                                                      </div> 
                                                      </td>
                                                       <td>
                                                            <?php
                                                              if(isset($_SESSION["admin"]))
                                                              {
                                                                  ?>
                                                                  <form action="<?php echo FRONT_ROOT ?>Job/RemoveJob" method="POST">
                                                                      <input type="text" name="IdJobOffer" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                      <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Eliminar</button>
                                                                 </form>
                                                            <?php
                                                              }
                                                            ?>
                                                       </td>
                                                       <td>
                                                            <?php
                                                                 if(isset($_SESSION["admin"]) || isset($_SESSION["company"]))
                                                                 {
                                                                      ?>
                                                                           <form action="<?php echo FRONT_ROOT ?>Job/PrintAplicants" method="POST">
                                                                                <input type="text" name="IdJobOffer" value="<?php echo $job->getId_position() ?>" style="display:none" />
                                                                                <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Imprimir</button>
                                                                           </form>
                                                                      <?php
                                                                 }
                                                            ?>
                                                       </td>
                                                  </tr>
                                             <?php
                                             }
                                   }
                              }
                                   
                         ?>

                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>

<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de estudiantes</h2>
               <div class="col-9">
                    <form action="<?php echo FRONT_ROOT ?>Student/Search" method="GET">
                         <div class="row" style="float:right">
                              <div class="col-9">
                                   <input class="form-control mr-sm-2" name="email" type="search" placeholder="Email alumno" aria-label="Search" >
                              </div>
                              <div class="col-3" >
                                   <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Buscar</button>
                              </div>
                         </div>
                    </form>
               </div>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($studentList as $student)
                              {


                                   if($email == $student->getEmail()){
                                   ?>
                                        <tr>
                                             <td><?php echo $student->getFileNumber() ?></td>
                                             <td><?php echo $student->getLastName() ?></td>
                                             <td><?php echo $student->getEmail() ?></td>
                                        </tr>
                                   <?php
                                   }else if($email == null){
     
                                   ?>
                                        <tr>
                                             <td><?php echo $student->getFileNumber() ?></td>
                                             <td><?php echo $student->getLastName() ?></td>
                                             <td><?php echo $student->getEmail() ?></td>
                                        </tr>
                                   <?php
                                   }
                              }

                         ?>

                         
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>
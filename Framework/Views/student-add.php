<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar alumno</h2>
               <form action="<?php echo FRONT_ROOT ?>Student/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="email" name="email" value="" class="form-control">
                                   <input type="password" name="password" value="12345" style="display:none">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Apellido</label>
                                   <input type="text" name="lastName" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">DNI</label>
                                   <input type="text" name="dni" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Genero</label>
                                   <input type="text" name="gender" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha de nacimiento</label>
                                   <input type="date" name="birthDate" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Numero de telefono</label>
                                   <input type="number" name="phoneNumber" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Legajo</label>
                                   <input type="text" name="fileNumber" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Estado de cursada</label>
                                   <select name="studyStatus">
                                        <option>En Curso</option>
                                        <option>Finalizado</option>
                                        <option>No finalizado</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Carerra</label>
                                   <select name="career">
                                        <option>Técnico Universitario en Programación</option>
                                        <option>Técnico Universitario en Sistemas Informaticos</option>
                                        <option>Técnico Universitario en Administracion</option>
                                   </select>
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>

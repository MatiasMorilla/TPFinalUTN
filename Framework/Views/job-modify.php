<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar Empleo</h2>
               <form action="<?php echo FRONT_ROOT ?>Job/ModifyJob" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                <h4 style="width: 700px"><?php echo $job->getPosition(); ?></h4>  
                                <input type="text" value="<?php echo $id_position; ?>" name="id_position" style="display:none" />
                                    <select name="attr">
                                        <option value="positions">Puesto</option>
                                        <option value="description">Descripcion</option>
                                        <option value="requirements">Requisitos</option>
                                        <option value="benefits">Beneficios</option>
                                        <option value="date">Fecha</option>
                                   </select>

                                   <input type="text" placeholder="Ingrese el nuevo valor" name="newValue" />
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Modificar</button>
               </form>
          </div>
     </section>
</main>
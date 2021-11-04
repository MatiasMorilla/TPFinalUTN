<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Postularse</h2>
               <form action="<?php echo FRONT_ROOT ?>Aplicants/Apply" method="post" class="bg-light-alpha p-5">
                    <div class="row">     
                    <input type="text" name="IdjobOffer" value="<?php echo $IdjobOffer; ?>" class="form-control">
                    <input type="text" name="fileNumber" value="<?php echo $fileNumber; ?>" class="form-control">                    
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Cargar CV</label>
                                   <input type="file" name="CV" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Descripcion personal</label>
                                   <input type="text" name="AplicantDescription" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Fecha</label>
                                   <input type="date" name="AplicantDate" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>


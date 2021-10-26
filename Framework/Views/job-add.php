<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar Empleo</h2>
               <form action="<?php echo FRONT_ROOT ?>Job/Add" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                        <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Puestos</label>
                                   <select name="position">
                                        <?php 

                                            foreach($arrayPositions as $position)
                                            {
                                                $description = $position["description"];
                                                echo "<option value='$description'> $description </option>";
                                            }

                                        ?>
                                   </select>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" name="date" value="" class="form-control">
                            </div>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <br>
                                <select name="company">
                                    <?php 
                                            foreach($companyList as $company)
                                            {
                                                $name = $company->getName();
                                                echo "<option value='$name'> $name </option>";
                                            }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" name="description" value="" class="form-control">
                            </div>
                        </div>                  
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Requisitos</label>
                                <input type="text" name="requirements" value="" class="form-control">
                            </div>
                        </div>                  
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Beneficios</label>
                                <input type="text" name="benefits" value="" class="form-control">
                            </div>
                        </div>                  
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>

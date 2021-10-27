<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
              <form action="<?php echo FRONT_ROOT ?>Job/RemoveJob" method="post" class="bg-light-alpha p-5">
                    <h2 class="mb-4">Eliminar Empleo</h2>                      
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Empresa</label>
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
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Puesto</label>
                            <input type="text" name="position" value="" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark ml-auto d-block">Eliminar</button>                        
                </form>
          </div>
     </section>
</main>
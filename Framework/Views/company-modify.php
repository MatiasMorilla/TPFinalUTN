<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Modificar Empresa</h2>
               <form action="<?php echo FRONT_ROOT ?>Company/ModifyCompany" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                <input type="text" value="<?php echo $name; ?>" name="name" />
                                    <select name="attr">
                                        <option value="CompanyName">Nombre</option>
                                        <option value="Address">Direccion</option>
                                        <option value="PhoneNumber">Telefono</option>
                                        <option value="Email">Email</option>
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
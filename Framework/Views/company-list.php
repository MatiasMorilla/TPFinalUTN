<?php
    require_once('nav.php');
    require_once("session-valid.php");
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <div class="row">
                    <div class="col-4">
                         <h2 class="mb-4">Listado de empresas</h2>
                    </div>
                    <div class="col">
                         <div class="row">
                              <div class="col-9">
                                   <form action="<?php echo FRONT_ROOT ?>Company/Search" method="GET">
                                        <div class="row" style="float:right">
                                             <div class="col-9">
                                                  <input class="form-control mr-sm-2" type="search" placeholder="Nombre de la empresa" aria-label="Search" name="name" >
                                             </div>
                                             <div class="col-3" >
                                                  <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Buscar</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div class="col">
                                   <form action="<?php echo FRONT_ROOT ?>Company/ShowListView" method="GET">
                                        <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Limpiar Filtro</button>
                                   </form>
                              </div>
                         </div>
                         
                         
                         
                    </div>
               </div>
               
               
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Direccion</th>
                         <th>Telefono</th>
                         <th>Email</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($companyList as $company)
                              {
                                   if(strcasecmp($name,$company->getName()) == 0){
                                   ?>
                                        <tr>
                                             <td><?php echo $company->getName() ?></td>
                                             <td><?php echo $company->getAddress() ?></td>
                                             <td><?php echo $company->getPhoneNumber() ?></td>
                                             <td><?php echo $company->getEmail() ?></td>
                                             <td>
                                             <div class="d-flex">
                                                  <form action="<?php echo FRONT_ROOT ?>Company/ShowCompany" method="GET">
                                                       <input type="text" name="name" value="<?php echo $company->getName() ?>" style="display:none" />
                                                       <button class="btn btn-secondary my-2 my-sm-0" type="submit">Mas informacion</button>
                                                  </form>
                                                  <?php
                                                       if(isset($_SESSION["admin"]))
                                                       {
                                                            ?>
                                                                 <form action="<?php echo FRONT_ROOT ?>Company/ShowModify" method="GET">
                                                                      <input type="text" name="name" value="<?php echo $company->getName() ?>" style="display:none" />
                                                                      <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                 </form>
                                                            <?php
                                                       }
                                                  ?> 
                                              </div> 
                                             </td>
                                        </tr>
                                   <?php
                                   }else if($name == null){

                                   ?>
                                        <tr>
                                             <td><?php echo $company->getName() ?></td>
                                             <td><?php echo $company->getAddress() ?></td>
                                             <td><?php echo $company->getPhoneNumber() ?></td>
                                             <td><?php echo $company->getEmail() ?></td>
                                             <td>
                                             <div class="d-flex">
                                                  <form action="<?php echo FRONT_ROOT ?>Company/ShowCompany" method="GET">
                                                       <input type="text" name="name" value="<?php echo $company->getName() ?>" style="display:none" />
                                                       <button class="btn btn-secondary my-2 my-sm-0" type="submit">Mas informacion</button>
                                                  </form>
                                                  <?php
                                                       if(isset($_SESSION["admin"]))
                                                       {
                                                            ?>
                                                                 <form action="<?php echo FRONT_ROOT ?>Company/ShowModify" method="GET">
                                                                      <input type="text" name="name" value="<?php echo $company->getName() ?>" style="display:none" />
                                                                      <button class="btn btn-secondary my-2 my-sm-0 ml-2" type="submit">Modificar</button>
                                                                 </form>
                                                            <?php
                                                       }
                                                  ?> 
                                              </div> 
                                             </td>
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

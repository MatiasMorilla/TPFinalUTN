<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de empresas</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Nombre</th>
                         <th>Cuil</th>
                         <th>Direccion</th>
                         <th>Telefono</th>
                         <th>Email</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($companyList as $company)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $company->getName() ?></td>
                                             <td><?php echo $company->getCuil() ?></td>
                                             <td><?php echo $company->getAddress() ?></td>
                                             <td><?php echo $company->getPhoneNumber() ?></td>
                                             <td><?php echo $company->getEmail() ?></td>
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

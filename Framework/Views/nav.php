<?php 

     $student = null;
     if(isset($_SESSION["student"]))
     {
          $student = $_SESSION["student"];
     }
?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>Bolsa de trabajo UTN</strong>
     </span>
     <ul class="navbar-nav ml-auto">  
             
          <?php 
               if(isset($_SESSION["student"]))
               {
                    ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/Showperfil">Mi perfil</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Job/ShowListView">Listar Empleos</a>
                         </li>   
                         <li class="nav-item">
                              <form action="<?php echo FRONT_ROOT ?>Aplicants/ShowMyList" method="POST">
                                   <input type="text" name="idStudent" value="<?php echo $student->getFileNumber() ?>" style="display:none " />
                                   <button class="nav-link" type="submit" style="border: 0; outline: 0; background: none;">Mis postulaciones</button>
                              </form>
                         </li> 
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowLogout">Log out</a>
                         </li>
                    <?php
               }
               elseif(isset($_SESSION["admin"])) 
               {
                    ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowAddView">Agregar Alumno</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowListView">Listar Alumnos</a>
                         </li> 
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a>
                         </li>  
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
                         </li>   
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowDeleteView">Eliminar Empresa</a>
                         </li>    
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Job/ShowAddView">Agregar Empleo</a>
                         </li>    
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Job/ShowListView">Listar Empleos</a>
                         </li>   
                         <!-- <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Job/ShowRemove">Eliminar Empleo</a>
                         </li>   -->
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Aplicants/ShowListView">Lista de aplicantes</a>
                         </li> 
                         <li class="nav-item">
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/ShowLogout">Log out</a>
                         </li>
                    <?php
               }
               else
               {

                    ?>
                         
                    <?php

               }

          ?>
     </ul>
</nav>

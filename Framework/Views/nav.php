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
                              <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
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

<?php 
     use Controllers\HomeController as HomeController;     

     if(!isset($_SESSION["student"]) && !isset($_SESSION["admin"]))
     {
          $homeController = new HomeController();
          $homeController->Index();
     }
?>
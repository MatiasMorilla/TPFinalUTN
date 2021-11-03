<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }        
        public function GoIndex(){
            header("location:../index.php");
        }
    }
?>
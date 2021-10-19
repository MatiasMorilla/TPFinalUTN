<?php
    use Controllers\HomeController as HomeController;
    session_destroy();

    $homeController = new HomeController();
    $homeController->Index();
    
    if(isset($_SESSION["student"]) || isset($_SESSION["admin"]))
    {
        echo "<script>
            location.reload();
        </script>";
    }

?>
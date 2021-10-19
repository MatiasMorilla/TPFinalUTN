<?php
    use Controllers\HomeController as HomeController;
    session_destroy();

    $homeController = new HomeController();
    $homeController->Index();

?>
<?php

    include_once "controllers/controller.php";
    include_once "controllers/routes.php";
    include_once "models/crud.php";

    define ("URL", "http://localhost/AdminLTE_MVC/");

    $controller = new Controller();
    $controller->main();
?>
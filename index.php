<?php
session_start();

define ("URL", "http://localhost/AdminLTE_MVC/");

include_once "controllers/controller.php";
include_once "controllers/emailController.php";
include_once "controllers/routes.php";
include_once "models/crud.php";

$controller = new Controller();
$controller->main();

?>
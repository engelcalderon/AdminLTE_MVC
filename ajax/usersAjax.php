<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if( isset($_POST["email"]) && isset($_POST["password"])){
    $form = array(
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    );
    $controller = new Controller;
    $controller->loginUserController($form);
}

?>
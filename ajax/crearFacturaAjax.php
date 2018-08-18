<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if (isset($_POST["agregandoProducto"]) && isset($_POST["productID"])) {
    $codigoProducto = $_POST["productID"];

    $controller = new Controller;
    $controller->getProductController($codigoProducto);
}

if (isset($_POST["guardar"]) && isset($_POST["cliente"]) && isset($_POST["productos"])) {
    $productos = $_POST["productos"];
    $data = [
        "cliente" => $_POST["cliente"],
        "productos" => $productos
    ];
    $controller = new Controller;
    $controller->guardarImprimirFactura($data);
}
?>
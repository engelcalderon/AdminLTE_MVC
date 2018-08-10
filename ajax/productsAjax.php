<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if( isset($_POST["nuevo"]) && isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["impuesto"]) 
            && isset($_POST["precio_compra"]) && isset($_POST["precio_venta"])){
                
                $data = [
                    "codigo"=>$_POST["codigo"],
                    "nombre"=>$_POST["nombre"],
                    "cantidad"=>$_POST["cantidad"],
                    "impuesto"=>$_POST["impuesto"],
                    "precio_compra"=>$_POST["precio_compra"],
                    "precio_venta"=>$_POST["precio_venta"]
                ];
                $controller = new Controller;
               $controller->addProductController($data);
            }

if (isset($_POST["mostrarEditar"]) && isset($_POST["idProducto"])) {
    $idProducto = $_POST["idProducto"];

    $controller = new Controller();
    $controller->mostrarDatosEditarProductoController($idProducto);
}

if( isset($_POST['editar']) && isset($_POST['id']) && isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["impuesto"]) 
            && isset($_POST["precio_compra"]) && isset($_POST["precio_venta"])){

                $data = [
                    "id"=>$_POST["id"],
                    "codigo"=>$_POST["codigo"],
                    "nombre"=>$_POST["nombre"],
                    "cantidad"=>$_POST["cantidad"],
                    "impuesto"=>$_POST["impuesto"],
                    "precio_compra"=>$_POST["precio_compra"],
                    "precio_venta"=>$_POST["precio_venta"]
                ];
                $controller = new Controller;
                $controller->editarProductoController($data);
            }

if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idProducto = $_POST["id"];

    $controller = new Controller();
    $controller->eliminarProductoController($idProducto);
}

?>
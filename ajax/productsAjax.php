<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if( isset($_POST["codigo"]) && isset($_POST["nombre"]) && isset($_POST["impuesto"]) 
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
?>
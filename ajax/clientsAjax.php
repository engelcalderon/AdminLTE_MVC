<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

if( isset($_POST["tipoID"]) && isset($_POST["ID"]) && isset($_POST["nombre"]) 
            && isset($_POST["nfantasia"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["provincia"])
            && isset($_POST["canton"]) && isset($_POST["distrito"]) && isset($_POST["barrio"]) && isset($_POST["direccion"])){

                $data = [
                    "tipoID"=>$_POST["tipoID"],
                    "ID"=>$_POST["ID"],
                    "nombre"=>$_POST["nombre"],
                    "nfantasia"=>$_POST["nfantasia"],
                    "telefono"=>$_POST["telefono"],
                    "email"=>$_POST["email"],
                    "provincia"=>$_POST["provincia"],
                    "canton"=>$_POST["canton"],
                    "distrito"=>$_POST["distrito"],
                    "barrio"=>$_POST["barrio"],
                    "direccion"=>$_POST["direccion"]
                ];
                $controller = new Controller;
                $controller->createClientController($data);
            }
?>
<?php

include_once "../controllers/controller.php";
include_once "../models/crud.php";

// Nuevo cliente
if( isset($_POST["nuevo"]) && isset($_POST["tipoID"]) && isset($_POST["ID"]) && isset($_POST["nombre"]) 
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

// Mostrar datos editar
if (isset($_POST["mostrarEditar"]) && isset($_POST["idCliente"])) {
    $idCliente = $_POST["idCliente"];

    $controller = new Controller();
    $controller->mostrarDatosEditarClienteController($idCliente);
}

// Editar
if( isset($_POST["editar"]) && isset($_POST["id_cliente"]) && isset($_POST["tipoID"]) && isset($_POST["ID"]) && isset($_POST["nombre"]) 
            && isset($_POST["nfantasia"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["provincia"])
            && isset($_POST["canton"]) && isset($_POST["distrito"]) && isset($_POST["barrio"]) && isset($_POST["direccion"])){
                $data = [
                    "id_cliente"=>$_POST["id_cliente"],
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
                $controller->editarClienteController($data);
            }

// Eliminar
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idCliente = $_POST["id"];

    $controller = new Controller();
    $controller->eliminarClienteController($idCliente);
}

?>
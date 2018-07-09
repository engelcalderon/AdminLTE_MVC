<?php

class Controller {

    public function main() {
        include "views/template.php";
    }

    public function manageRoutes() {
        if (isset($_GET['url'])) {
            $route = $_GET["url"];
            $view = Routes::handleRoutes($route);
            include $view;
        }
        else {
            header("location:" . URL . "dashboard");
        }
    }

    public function registerUserController($data){
        $passwordEncriptada = crypt($data["password"], "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/");
        
        $data["password"] = $passwordEncriptada;

        $response = Datos::registroUsuarioModel($data);

        if($response == "success"){
           echo json_encode([
               "status" => "success"
           ]);
        }
        else{
            echo json_encode([
                "status" => "error"
            ]);
        }
    }
    
    public function loginUserController($data) {
        $response = Datos::ingresoUsuarioModel($data, "users");
        
        $passwordEncriptada = crypt($data["password"], '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/');
        
        if($response["email"] == $data["email"] && $response["password"] == $passwordEncriptada ){
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["validUser"]=TRUE;
            echo json_encode([
                "status" => "success"
            ]);
        }
        else{
            echo json_encode([
                "status" => "error",
                "message" => "Email or Password does not match"
            ]);
        }
    }


    public function createClientController($data) {
        $response = Datos::createClientModel($data);
                
        if ($response["status"] == "success") {
            $client = Datos::getClientModel($data["ID"]);
            if ($client["status"] == "success") {
                echo json_encode(array(
                    "status" => "success",
                    "client" => $client["data"]
                ));
                return;
            }
        }
        echo json_encode($response);
    }
    
    public function getClientsController() {
        $clients = Datos::getClientsModel();

        if ($clients["status"] == "success") {
            foreach($clients["data"] as $key => $value) {
                echo "
                    <tr>
                        <td>".$value["identificacion"]."</td>
                        <td>".$value["tipoID"]."</td>
                        <td>".$value["nombre"]."</td>
                        <td>".$value["nombre_fantasia"]."</td>
                        <td>".$value["telefono"]."</td>
                        <td>".$value["email"]."</td>
                        <td>".$value["provincia"]."</td>
                        <td>".$value["canton"]."</td>
                        <td>".$value["distrito"]."</td>
                        <td>".$value["barrio"]."</td>
                        <td>".$value["direccion"]."</td>
                    </tr>
                ";
            }
        }
        else {
            echo $client["message"];
        }
    }

    public function addProductController($data) {
        $response = Datos::addProductModel($data);

        if ($response["status"] == "success") {
            $product = Datos::getProductModel($data["codigo"]);
            if ($product["status"] == "success") {
                echo json_encode(array(
                    "status" => "success",
                    "product" => $product["data"]
                ));
                return;
            }
        }
        echo json_encode($response);
    }

    public function getProductsController() {
        $products = Datos::getProductsModel();

        if ($products["status"] == "success") {
            foreach($products["data"] as $key => $value) {
                echo "
                    <tr>
                        <td>".$value["codigo"]."</td>
                        <td>".$value["nombre"]."</td>
                        <td>".$value["cantidad_existente"]."</td>
                        <td>".$value["impuesto_venta"]."</td>
                        <td>".$value["precio_compra"]."</td>
                        <td>".$value["precio_venta"]."</td>
                    </tr>
                ";
            }
        }
        else {
            echo $products["message"];
        }
    }

}

?>
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

    public function registerUserController(){
		if( isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["email"]) ){

		    $passwordEncriptada = crypt($_POST["password"], "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/");
            $datosController = array( "name" => $_POST["name"],
                                    "email" => $_POST["email"],
									"password" => $passwordEncriptada,
									);
                
			$respuesta = Datos::registroUsuarioModel($datosController, "users");

			if($respuesta == "success"){
				header("location:index.php?action=dashboard");
            }
            else{
                echo "Error";
				//header("location:index.php?action=register");
			}
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
        echo $response;
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

}

?>
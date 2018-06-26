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
            // $_SESSION["validar"]=true;
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


    public function crearNuevoClienteController() {
        if( isset($_POST["registroCliente_tipoID"]) && isset($_POST["registroCliente_identificacion"]) && isset($_POST["registroCliente_nombre"]) 
            && isset($_POST["registroCliente_telefono"]) && isset($_POST["registroCliente_email"]) && isset($_POST["registroCliente_provincia"]) && isset($_POST["registroCliente_canton"])
            && isset($_POST["registroCliente_distrito"]) && isset($_POST["registroCliente_barrio"]) && isset($_POST["registroCliente_direccion"])){
            
            $datosModel = array(
                "identificacion" => $_POST["registroCliente_identificacion"],
                "tipo_identificacion" => $_POST["registroCliente_tipoID"],
                "nombre" => $_POST["registroCliente_nombre"],
                "telefono" => $_POST["registroCliente_telefono"],
                "email" => $_POST["registroCliente_email"],
                "provincia" => $_POST["registroCliente_provincia"],
                "canton" => $_POST["registroCliente_canton"],
                "distrito" => $_POST["registroCliente_distrito"],
                "barrio" => $_POST["registroCliente_barrio"],
                "direccion" => $_POST["registroCliente_direccion"],
            );
           
            $respuesta = Datos::crearNuevoClienteModel($datosModel, "cliente");
            
            if($respuesta != "success" ){
                echo "Error";
            }
        }
    }
    
    public function mostrarClientesController() {
        $clientes = Datos::mostrarClientesModel();

        foreach($clientes as $cliente) {
            echo "
                <tr>
                  <td>".$cliente["identificacion"]."</td>
                  <td>".$cliente["tipo_identificacion"]."</td>
                  <td>".$cliente["nombre"]."</td>
                  <td>Sin asignar</td>
                  <td>".$cliente["telefono"]."</td>
                  <td>".$cliente["email"]."</td>
                  <td>".$cliente["provincia"]."</td>
                  <td>".$cliente["canton"]."</td>
                  <td>".$cliente["distrito"]."</td>
                  <td>".$cliente["barrio"]."</td>
                  <td>".$cliente["direccion"]."</td>
                </tr>
            ";
        }
    }

}

?>
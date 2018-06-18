<?php

class Controller {

    public function main() {
        if (isset($_GET["action"])) {
            if ($_GET["action"] == "dashboard")
                include "views/template_dashboard.php";
            else
                include "views/template.php";
        }
        else {
            include "views/template.php";
        }
    }

    public function manageMainRoutes() {
        if (isset($_GET["action"])) {
            $route = $_GET["action"];
            $view = Routes::handleMainRoutes($route);
            include $view;
        }
        else {
            header("location:index.php?action=login");
        }
    }

    public function manageDashboardRoutes() {
            if (isset($_GET["navigate"])) {
                $route = $_GET["navigate"];
                $view = Routes::handleDashboardRoutes($route);
                include $view;
            }
            else{
                include "views/pages/dashboard1.php";
            }
    }

    public function registroUsuarioController(){
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

	public function ingresoUsuarioController(){
		if( isset($_POST["email"]) && isset($_POST["password"])){

			$datosController = array( "email" => $_POST["email"],
											"password" => $_POST["password"] );
            $respuesta = Datos::ingresoUsuarioModel($datosController, "users");
            
			$passwordEncriptada = crypt($_POST["password"], '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/');
            
            if($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $passwordEncriptada ){
				session_start();
				$_SESSION["validar"]=true;
				header("location:index.php?action=dashboard");
			}else{
				echo "Error";
				//header("location:index.php?action=register");
			}
		}
	}

}

?>
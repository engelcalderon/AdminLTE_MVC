<?php

class Routes {

        public function handleMainRoutes($route) {
            switch($route) {
                case "login":
                $module = "views/pages/login.php";
                break;
                case "register":
                $module = "views/pages/register.php";
                break;
                default:
                $module = "views/pages/login.php";
            }
            return $module;
        }

        public function handleDashboardRoutes($route) {
            switch($route) {
                case "blankpage":
                $module = "views/pages/blankpage.php";
                break;
                case "nuevocliente":
                break;
                case "clientes":
                $module = "views/pages/clientes.php";
                break;
                default:
                $module = "views/pages/error404.php";
            }
            return $module;
        }
}

?>
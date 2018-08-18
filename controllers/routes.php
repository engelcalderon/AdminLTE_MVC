<?php

class Routes {

        public function handleRoutes($route) {
            switch($route) {
                case "login":
                $module = "views/public/pages/login.php";
                break;
                case "register":
                $module = "views/public/pages/register.php";
                break;
                case "dashboard":
                $module = "views/dashboard/pages/dashboard1.php";
                break;
                case "dashboard/clientes":
                $module = "views/dashboard/pages/clientes.php";
                break;
                case "dashboard/productos":
                $module = "views/dashboard/pages/productos.php";
                break;
                case "dashboard/emailsmtp":
                $module = "views/dashboard/pages/emailsmtp.php";
                break;
                case "dashboard/emailfree":
                $module = "views/dashboard/pages/emailfree.php";
                break;
                case "dashboard/crearfactura":
                $module = "views/dashboard/pages/crearfactura.php";
                break;
                case "dashboard/factura":
                $module = "views/dashboard/pages/factura.php";
                break;
                case "dashboard/facturas":
                $module = "views/dashboard/pages/facturas.php";
                break;
                case "dashboard/archivos":
                $module = "views/dashboard/pages/archivos.php";
                break;
                default:
                $module = "views/public/pages/login.php";
            }
            return $module;
        }
}

?>
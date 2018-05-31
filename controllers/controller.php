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

}

?>
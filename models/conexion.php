<?php
class Conexion{
  static public function conectar(){
    $link = new PDO("mysql:host=localhost;dbname=adminlte","root","");
   // $link = new PDO("mysql:host=localhost;dbname=id6235510_adminlte","id6235510_root","admin");
    return $link;
  }
}
 ?>
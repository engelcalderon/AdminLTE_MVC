<?php
class Conexion{
  static public function conectar(){
    $link = new PDO("mysql:host=localhost;dbname=adminlte","root","");
      //$link = new PDO("mysql:host=localhost;dbname=id6235510_progra","id6235510_bsi19frederickcalderon","bsi19frederickcalderon");
    return $link;
  }
}
 ?>
<?php
  require_once "conexion.php";

  class Datos extends Conexion {

    #Registro de usuario
  	#-------------------------------------
  	static public function registroUsuarioModel($datosModel, $tabla){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(name, email, password) VALUES (:name, :email, :password)");

      $stmt -> bindParam(":name",$datosModel["name"], PDO::PARAM_STR);
      $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
      $stmt -> bindParam(":password",$datosModel["password"], PDO::PARAM_STR);

      if($stmt -> execute()){
        return "success";
      }else{
        return "error";
      }
        $stmt -> close();

    }

    #Ingreso de usuario
  	#-------------------------------------
  	static public function ingresoUsuarioModel($datosModel, $tabla){
      $stmt = Conexion::conectar()->prepare("SELECT email, password FROM $tabla WHERE email = :email");
      $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
      $stmt->execute();

      return $stmt->fetch();
      $stmt->close();
    }

  }
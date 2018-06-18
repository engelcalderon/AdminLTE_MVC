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

    #Crear nuevo cliente
    #-------------------------------------
    public function crearNuevoClienteModel($datosModel, $tabla){

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
        identificacion, tipo_identificacion, nombre, telefono, email, provincia, canton, distrito, barrio, direccion) 
        VALUES (:identificacion, :tipo_identificacion, :nombre, :telefono, :email, :provincia, :canton, :distrito, :barrio, :direccion)");

      $stmt -> bindParam(":identificacion",$datosModel["identificacion"], PDO::PARAM_STR);
      $stmt -> bindParam(":tipo_identificacion",$datosModel["tipo_identificacion"], PDO::PARAM_STR);
      $stmt -> bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":telefono",$datosModel["telefono"], PDO::PARAM_STR);
      $stmt -> bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
      $stmt -> bindParam(":provincia",$datosModel["provincia"], PDO::PARAM_STR);
      $stmt -> bindParam(":canton",$datosModel["canton"], PDO::PARAM_STR);
      $stmt -> bindParam(":distrito",$datosModel["distrito"], PDO::PARAM_STR);
      $stmt -> bindParam(":barrio",$datosModel["barrio"], PDO::PARAM_STR);
      $stmt -> bindParam(":direccion",$datosModel["direccion"], PDO::PARAM_STR);

      if($stmt -> execute()){
        return "success";
      }else{
        return "error";
      }
    }

    public function mostrarClientesModel() {
      $stmt = Conexion::conectar()->prepare("SELECT * FROM cliente");

      $stmt->execute();

      return $stmt->fetchAll();
    }

  }
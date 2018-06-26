<?php

  require_once "conexion.php";

  class Datos extends Conexion {

    #Registro de usuario
  	#-------------------------------------
  	static public function registroUsuarioModel($data){

      $stmt = Conexion::conectar()->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

      $stmt -> bindParam(":name",$data["name"], PDO::PARAM_STR);
      $stmt -> bindParam(":email",$data["email"], PDO::PARAM_STR);
      $stmt -> bindParam(":password",$data["password"], PDO::PARAM_STR);

      if($stmt -> execute()){
        return "success";
      }else{
        return "error";
      }
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

    #Creacion de nuevo cliente
  	#-------------------------------------
    static public function createClientModel($data){
      try {
        $stmt = Conexion::conectar()->prepare("INSERT INTO client(identificacion, tipoID, nombre, nombre_fantasia, telefono, email, provincia, canton, distrito, barrio, direccion) 
            VALUES (:identificacion, :tipo_identificacion, :nombre, :nfantasia, :telefono, :email, :provincia, :canton, :distrito, :barrio, :direccion)");
    
          $stmt -> bindParam(":identificacion",$data["ID"], PDO::PARAM_STR);
          $stmt -> bindParam(":tipo_identificacion",$data["tipoID"], PDO::PARAM_STR);
          $stmt -> bindParam(":nombre",$data["nombre"], PDO::PARAM_STR);
          $stmt -> bindParam(":nfantasia",$data["nfantasia"], PDO::PARAM_STR);
          $stmt -> bindParam(":telefono",$data["telefono"], PDO::PARAM_STR);
          $stmt -> bindParam(":email",$data["email"], PDO::PARAM_STR);
          $stmt -> bindParam(":provincia",$data["provincia"], PDO::PARAM_STR);
          $stmt -> bindParam(":canton",$data["canton"], PDO::PARAM_STR);
          $stmt -> bindParam(":distrito",$data["distrito"], PDO::PARAM_STR);
          $stmt -> bindParam(":barrio",$data["barrio"], PDO::PARAM_STR);
          $stmt -> bindParam(":direccion",$data["direccion"], PDO::PARAM_STR);
          
          if ($stmt -> execute()) {
                return array(
                    "status" => "success"
                );
          }
        
          return array(
            "status" => "error",
            "message" => "Unknown"
        );
    }
    catch (PDOExecption $e) {
        return array(
            "status" => "error",
            "message" => $e->getMessage()
        );
      }
    }

    #Obtener datos de todos los clientes
  	#-------------------------------------
    static public function getClientsModel() {
        try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM client");

          if ($stmt->execute()) {
              return array(
                  "status"=> "success",
                  "data" => $stmt->fetchAll()
              );
          }

          return array(
              "status" => "error",
              "message" => "Unknown"
          );
          
      }
      catch (PDOExecption $e) {
          return array(
              "status" => "error",
              "message" => $e->getMessage()
          );
      }
    }

    #Obtener datos de un cliente
  	#-------------------------------------
    static public function getClientModel($identificacion) {
      try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM client WHERE identificacion = :identificacion");
          $stmt->bindParam(":identificacion",$identificacion,PDO::PARAM_STR);

          if ($stmt->execute()) {
              return array(
                  "status"=> "success",
                  "data" => $stmt->fetch()
              );
          }

          return array(
              "status" => "error",
              "message" => "Unknown"
          );
          
      }
      catch (PDOExecption $e) {
          return array(
              "status" => "error",
              "message" => $e->getMessage()
          );
      }
  }

  }
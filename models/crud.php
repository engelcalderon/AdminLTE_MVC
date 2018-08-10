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

    #Editar un cliente
  	#-------------------------------------
      static public function editarClienteModel($data){
        try {
          $stmt = Conexion::conectar()->prepare("update client set identificacion = :identification, tipoID = :tipo_identificacion, nombre = :nombre, nombre_fantasia = :nfantasia , 
          telefono = :telefono, email = :email, provincia = :provincia, canton = :canton, distrito = :distrito, barrio = :barrio, direccion = :direccion where id = :id");

            $stmt -> bindParam(":id",$data["id_cliente"], PDO::PARAM_INT);
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
    static public function getClientModel($id) {
      try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM client WHERE id = :id");
          $stmt->bindParam(":id",$id,PDO::PARAM_STR);

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

     #Agregar un nuevo producto
  	#-------------------------------------
    static public function addProductModel($data) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO producto(codigo, nombre, cantidad_existente, impuesto_venta, precio_compra, precio_venta) 
                VALUES (:codigo, :nombre, :cantidad, :impuesto, :precio_compra, :precio_venta)");
        
              $stmt -> bindParam(":codigo",$data["codigo"], PDO::PARAM_STR);
              $stmt -> bindParam(":nombre",$data["nombre"], PDO::PARAM_STR);
              $stmt -> bindParam(":cantidad",$data["cantidad"], PDO::PARAM_STR);
              $stmt -> bindParam(":impuesto",$data["impuesto"], PDO::PARAM_STR);
              $stmt -> bindParam(":precio_compra",$data["precio_compra"], PDO::PARAM_STR);
              $stmt -> bindParam(":precio_venta",$data["precio_venta"], PDO::PARAM_STR);
              
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

     #Editar un producto
  	#-------------------------------------
    static public function editarProductoModel($data) {
        try {
            $stmt = Conexion::conectar()->prepare("update producto set codigo = :codigo, nombre = :nombre, cantidad_existente = :cantidad, 
            impuesto_venta = :impuesto, precio_compra = :precio_compra, precio_venta = :precio_venta where id = :id");
            
                $stmt -> bindParam(":id",$data["id"], PDO::PARAM_STR);
              $stmt -> bindParam(":codigo",$data["codigo"], PDO::PARAM_STR);
              $stmt -> bindParam(":nombre",$data["nombre"], PDO::PARAM_STR);
              $stmt -> bindParam(":cantidad",$data["cantidad"], PDO::PARAM_STR);
              $stmt -> bindParam(":impuesto",$data["impuesto"], PDO::PARAM_STR);
              $stmt -> bindParam(":precio_compra",$data["precio_compra"], PDO::PARAM_STR);
              $stmt -> bindParam(":precio_venta",$data["precio_venta"], PDO::PARAM_STR);
              
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

     #Eliminar un producto
  	#-------------------------------------
    static public function eliminarProductoModel($idProducto) {
        try {
            $stmt = Conexion::conectar()->prepare("delete from producto where id = :id");
            
                $stmt -> bindParam(":id",$idProducto, PDO::PARAM_INT);
              
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

    #Obtener datos de un producto por su codigo
  	#-------------------------------------
      static public function getProductModel($codigo) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE codigo = :codigo");
            $stmt->bindParam(":codigo",$codigo,PDO::PARAM_STR);
  
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

      #Obtener datos de un producto por su id
      #-------------------------------------
      static public function getProductoModelByID($idProducto) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE id = :id");
            $stmt->bindParam(":id",$idProducto,PDO::PARAM_STR);
  
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

    #Obtener todos los productos
  	#-------------------------------------
      static public function getProductsModel() {
        try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM producto");

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

     #Guardar un nuevo archivos
  	#-------------------------------------
      static public function guardarArchivoModel($data) {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO archivo(nombre, directorio) values (:nombre, :directorio)");
        
              $stmt -> bindParam(":nombre",$data["nombre"], PDO::PARAM_STR);
              $stmt -> bindParam(":directorio",$data["directorio"], PDO::PARAM_STR);
              
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

  }
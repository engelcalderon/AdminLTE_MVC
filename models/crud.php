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
          $stmt = Conexion::conectar()->prepare("update client set identificacion = :identificacion, tipoID = :tipo_identificacion, nombre = :nombre, nombre_fantasia = :nfantasia , 
          telefono = :telefono, email = :email, provincia = :provincia, canton = :canton, distrito = :distrito, barrio = :barrio, direccion = :direccion where id = :id");

            $stmt -> bindParam(":id",$data["id_cliente"], PDO::PARAM_STR);
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
    
    static public function eliminarClienteModel($idCliente) {
        try {
            $stmt = Conexion::conectar()->prepare("delete from client where id = :id");
            
                $stmt -> bindParam(":id",$idCliente, PDO::PARAM_INT);
              
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

     #Obtener datos de un cliente por su numero de identificacion
  	#-------------------------------------
      static public function getClientModelByIdentification($identificacion) {
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

     #Obtener todos los archivos
  	#-------------------------------------
      static public function getArchivosModel() {
        try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM archivo");

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

     #Crear factura y agregar productos
  	#-------------------------------------
    static public function crearFacturaModel($data) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=adminlte","root","");

            $cliente = $conexion->prepare("SELECT id FROM client where identificacion = :id");
            $cliente -> bindParam(":id",$data["cliente"], PDO::PARAM_STR);

            if ($cliente->execute()) {
                $clienteID = $cliente->fetch();

                $stmt = $conexion->prepare("INSERT INTO factura(id_cliente) values (:cliente)");
            
                $stmt -> bindParam(":cliente",$clienteID["id"], PDO::PARAM_STR);
                
                if ($stmt -> execute()) {

                    $id_factura =  $conexion->lastInsertId();

                    foreach($data["productos"] as $value) {
                        $query = "INSERT INTO factura_producto (id_factura, id_producto, cantidad) VALUES
                        (:id_factura, :id_producto, :cantidad)";
                        $stmt = $conexion->prepare($query);
                        $stmt -> bindParam(":id_factura",$id_factura, PDO::PARAM_STR);
                        $stmt -> bindParam(":id_producto", $value["producto"], PDO::PARAM_STR);
                        $stmt -> bindParam(":cantidad",$value["cantidad"], PDO::PARAM_STR);

                        if (!$stmt -> execute()) {
                            return array(
                                "status" => "error",
                                "message" => "Error al insertar productos"
                            );
                            break;
                        }
                    }
                    // $conexion->close();
                    return array(
                        "status" => "success",
                        "factura"=> $id_factura
                    );
                }
                else {
                    return array(
                        "status" => "error",
                        "message" => "Error al crear factura"
                    );
                }
            
            }
            }
            catch (PDOExecption $e) {
                return array(
                    "status" => "error",
                    "message" => $e->getMessage()
                );
            }
    }

    #Obtener productos de una factura
  	#-------------------------------------
      static public function getFacturaProductosModel($idFactura) {
        try {
            $stmt = Conexion::conectar()->prepare("select cantidad, nombre as descripcion, codigo, precio_venta as subtotal from factura_producto 
            INNER JOIN producto on factura_producto.id_producto = producto.id where factura_producto.id_factura = :idFactura");
        
            $stmt -> bindParam(":idFactura",$idFactura, PDO::PARAM_STR);
              
            if ($stmt -> execute()) {
                return $stmt->fetchAll();
            }
        }
        catch (PDOExecption $e) {
            return "error".$e;
          }
      }

       #Obtener detalles de una factura
  	#-------------------------------------
      static public function  getFacturaDetallesModel($idFactura) {
        try {
            $stmt = Conexion::conectar()->prepare("select nombre as cliente from factura 
            INNER JOIN client on factura.id_cliente = client.id where factura.id = :idFactura");
        
            $stmt -> bindParam(":idFactura",$idFactura, PDO::PARAM_STR);
              
            if ($stmt -> execute()) {
                return $stmt->fetch();
            }
        }
        catch (PDOExecption $e) {
            return "error".$e;
          }
      }

    #Obtener todas las facturas
  	#-------------------------------------
      static public function  getFacturasModel() {
        try {
            $stmt = Conexion::conectar()->prepare("select factura.id as factura, client.nombre as cliente
             from factura inner join client on factura.id_cliente = client.id");
        
            if ($stmt -> execute()) {
                return $stmt->fetchAll();
            }
        }
        catch (PDOExecption $e) {
            return "error";
          }
      }

  }
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "conexion.php";

class ModeloClientes{

    // Crear Cliente
    static public function mdlIngresarCliente($tabla, $datos){        

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email, telefono, direccion, fecha_nacimiento, compras) VALUES(:nombre, :documento, :email, :telefono, :direccion, :fecha_nacimiento, :compras)");  

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);        
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);        
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":compras", $datos["compras"], PDO::PARAM_STR);
        

        var_dump($stmt);

        if ($stmt->execute()){
            return "ok";            
        }
        else {
            return "Error";
        }

        $stmt = null;
    }

    // Mostrar Clientes    
    static public function mdlMostrarClientes($tabla, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();

        }
        else {
            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    // Editar Cliente
    static public function mdlEditarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento, compras = :compras WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":compras", $datos["compras"], PDO::PARAM_INT);        
        
        var_dump($stmt);

        if ($stmt->execute()){
            return "ok";            
        }
        else {
            return "Error";
        }

        $stmt = null;

    }

    // Borrar Cliente
    static public function mdlEliminarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }
        else {
            return "Error";
        }

        $stmt = null;    
    }

}


?>
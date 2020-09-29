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

}


?>
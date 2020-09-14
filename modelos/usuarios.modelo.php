<?php

require_once "conexion.php";

class ModeloUsuarios {
    public static function mdlMostarUsuarios($tabla, $item, $valor){

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch();
        }
        else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");            
            $stmt->execute();
            
            return $stmt->fetchAll();
        }      
        
        $stmt -> close();
        $stmt = null;
    }

    static public function mdlIngresarUsuario($tabla, $datos) {        

        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto)
                        VALUES(:nombre, :usuario, :password, :perfil, :foto)");


        /*if ($consulta) {
            echo 'Correcto';
            echo '<script>console.log("Correcto");</script>';
        }*/        

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':password', $password);
        $consulta->bindParam(':perfil', $perfil);
        $consulta->bindParam(':foto', $foto);
        /*$consulta->bindParam(':estado', $estado);
        $consulta->bindParam(':ultimo_login', $ultimo_login);
        $consulta->bindParam(':fecha', $fecha);*/


        $nombre = $datos["nombre"];
        $usuario = $datos["usuario"];
        $password = sha1($datos["password"]);
        $perfil = $datos["perfil"];
        $foto = $datos["foto"];
        /*$estado = $datos["estado"];
        $ultimo_login = $datos["ultimo_login"];
        $fecha = $datos["fecha"];*/

        //var_dump($consulta);


        if ($consulta->execute()) {
            return "ok";
        } else {
            return "Error";
        }

        //$consulta->close();
        $consulta = null;
    }

    static public function mdlEditarUsuario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, 
            password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "Error";
        }

        //$stmt->close();
        $stmt=null;

    }

    public static function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 
                WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1);
        $stmt -> bindParam(":".$item2, $valor2);        
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "Error";
        }
        //$stmt->close();
        $stmt = null;

    }
}

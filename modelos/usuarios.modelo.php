<?php

require_once "conexion.php";

class ModeloUsuarios {
    public static function mdlMostarUsuarios($tabla, $item, $valor){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch();

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
}

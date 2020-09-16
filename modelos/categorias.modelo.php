<?php

require_once "conexion.php";

class ModeloCategorias{

    //Crear Categoría

    static public function mdlCrearCategoria($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(:categoria)");

        $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);
        
        var_dump($stmt);

        if ($stmt->execute()){
            return "ok";            
        }
        else {
            return "Error";
        }

        $stmt = null;

    }

    // Mostrar Categorías

    public static function mdlMostarCategorias($tabla, $item, $valor){

        echo '<script>console.log("'.$item.'")</script>';

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
}

?>
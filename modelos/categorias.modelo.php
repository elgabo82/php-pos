<?php

require_once "conexion.php";

class ModeloCategorias{

    //Crear Categoría

    static public function mdlCrearCategoria($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES(:categoria)");

        $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);
        
        //var_dump($stmt);

        if ($stmt->execute()){
            return "ok";            
        }
        else {
            return "Error";
        }

        $stmt = null;

 
    }  

    // Mostrar Categoría
    static public function mdlMostrarCategorias($tabla, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE $item = :$item");

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

    // Editar Categoría
    static public function mdlEditarCategoria($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        
        //var_dump($stmt);

        if ($stmt->execute()){
            return "ok";            
        }
        else {
            return "Error";
        }

        $stmt = null;

 
    }

    // Borrar Categoría

    static public function mdlBorrarCategoria($tabla, $datos){
    
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        
        //var_dump($stmt);

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
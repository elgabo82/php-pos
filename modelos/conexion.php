<?php

class Conexion {
    public static function conectar() {

        try {
        $db = new PDO("mysql:host=localhost;dbname=pos", 
                            "usuariopos", 
                            "P0S.2020!");

        $db -> exec("SET NAMES utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();            
        }        
    }
}
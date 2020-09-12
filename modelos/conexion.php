<?php

class Conexion {
    public static function conectar() {
        $enlace = new PDO("mysql:host=localhost;dbname=pos", 
                            "usuariopos", 
                            "P0S.2020!");

        $enlace -> exec("SET NAMES utf8");

        return $enlace;
    }
}
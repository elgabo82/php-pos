<?php

class ControladorUsuarios {
    public function ctrIngresoUsuario(){

        if (isset($_POST["idUsuario"])){

            if (preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["idUsuario"]) &&
                preg_match('/^[a-zA-Z0-9@!¡.]+$/', $_POST["passUsuario"])){

                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["idUsuario"];

                    $respuesta = ModeloUsuarios::mdlMostarUsuarios($tabla, $item, $valor);

                    var_dump($respuesta);
            }
        }
    }
}
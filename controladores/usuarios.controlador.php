<?php

class ControladorUsuarios {
    public function ctrIngresoUsuario(){

        if (isset($_POST["idUsuario"])){

            if (preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["idUsuario"]) &&
                preg_match('/^[a-zA-Z0-9@!¡.]+$/', $_POST["passUsuario"])){

                    $tabla = "usuarios";
                    $item = "usuario";
                    $valor = $_POST["idUsuario"];

                    //$clave = sha1($_POST["passUsuario"]);

                    //var_dump($clave);

                    $respuesta = ModeloUsuarios::mdlMostarUsuarios($tabla, $item, $valor);

                    //var_dump($respuesta);

                    if ($respuesta["usuario"] == $_POST["idUsuario"] &&
                        $respuesta["password"] == sha1($_POST["passUsuario"])) {
                            //echo '<br><div class="alert alert-success">Bienvenido al sistema</div>';
                            $_SESSION["sesionIniciada"] = "ok";
                            echo '<script>
                                window.location = "inicio";
                            </script>';
                        }
                    else {
                        //echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentar.</div>';
                        //Añadida 11-09-2020 20:18
                        echo '<br/><alert class="alert alert-danger swalDefaultError" role="alert">Error al ingresar, vuelve a intentar.</alert>';
                    }
            }
        }
    }
}
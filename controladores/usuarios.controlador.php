<?php

class ControladorUsuarios {
    public static function ctrIngresoUsuario(){

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
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["usuario"] = $respuesta["usuario"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["estado"] = $respuesta["estado"];
                            $_SESSION["ultimo_login"] = $respuesta["ultimo_login"];
                            $_SESSION["fecha"] = $respuesta["fecha"];

                            echo '<script>
                                window.location = "inicio";
                            </script>';
                        }
                    else {
                        //echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentar.</div>';
                        //Añadida 11-09-2020 20:18
                        //echo '<br/><alert class="alert alert-danger swalDefaultError" role="alert">Error al ingresar, vuelve a intentar.</alert>';
                        //Añadida 12-09-2020 14:04

                        if ($_POST["passUsuario"] == "" ||
                        $_POST["passUsuario"] == null){
                            echo '<script>
                    
                            Swal.fire({
                                icon: "error",
                                title: "¡Uy!, Algo sali&oacute; mal",
                                text: "La clave no puede estar vacía.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                
                            }).then((result) => {
                                if (result) {
                                    window.location = "login";
                                    }
                                }); 
                            
                            </script>';

                        } else {
                            echo '<script>
                    
                            Swal.fire({
                                icon: "error",
                                title: "¡Uy!, Algo sali&oacute; mal",
                                text: "El usuario o la clave están incorrectos.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                
                            }).then((result) => {
                                if (result) {
                                    window.location = "login";
                                    }
                                }); 
                            
                            </script>';
                        }                        
                         
                    }
            }
        }
    }

    /* Registro de usuario */
    static public function ctrCrearUsuario(){
        //echo 'Ingresando a la función ctrCrearUsuario\n';
        
        if (isset($_POST["nuevoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) && 
                preg_match('/^[a-zA-Z0-9!¡#@.-_]+$/', $_POST["nuevaClave"])) {

                    $ruta = "";

                    if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                        list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        // Crear el directorio
                        $directorio = 'vistas/img/usuarios/'.$_POST["nuevoUsuario"];
                        
                        // El directorio actual debe tener permisos para el usuario Apache
                        //$pwd = getwd();
                        mkdir($directorio, 0755, true);
                        //var_dump($_FILES["nuevaFoto"]["tmp_name"]);

                        if ($_FILES['nuevaFoto']['type'] == "image/jpg" ||
                        $_FILES['nuevaFoto']['type'] == "image/jpeg") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/usuarios/".$_POST['nuevoUsuario']."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                        if ($_FILES['nuevaFoto']['type'] == "image/png") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/usuarios/".$_POST['nuevoUsuario']."/".$aleatorio.".png";

                            $origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }


                    }

                    $tabla = "usuarios";
                    //$clave = sha1($_POST["nuevaClave"]);                    

                    $datos = array(
                                    "nombre" => $_POST["nuevoNombre"],
                                    "usuario" => $_POST["nuevoUsuario"],
                                    "password" => $_POST["nuevaClave"],
                                    "perfil" => $_POST["nuevoPerfil"],
                                    "foto" => $ruta
                                );

                    //var_dump($datos);
                    
                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                    //var_dump($respuesta);

                    if ($respuesta == "ok") {
                        echo '<script>                    
                        Swal.fire({
                            icon: "success",
                            title: "Tarea exitosa",
                            text: "El usuario ha sido guardado correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "usuarios";
                                }
                            }); 
                        
                        </script>';
                    }
                } 
            else {
                echo '<script>
                
                Swal.fire({
                    icon: "error",
                    title: "¡Uy!, Algo sali&oacute; mal",
                    text: "El usuario no puede estar vacío o contener caracteres especiales.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    
                }).then((result) => {
                    if (result) {
                        window.location = "usuarios";
                        }
                    }); 
                
                </script>';         
            }
          
        }
 
    }
}
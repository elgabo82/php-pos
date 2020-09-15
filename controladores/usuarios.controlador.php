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

                            // Se pregunta el estado
                            if ($respuesta["estado"] == 1 ){

                                //echo '<br><div class="alert alert-success">Bienvenido al sistema</div>';
                                $_SESSION["sesionIniciada"] = "ok";
                                $_SESSION["id"] = $respuesta["id"];
                                $_SESSION["nombre"] = $respuesta["nombre"];
                                $_SESSION["usuario"] = $respuesta["usuario"];
                                $_SESSION["perfil"] = $respuesta["perfil"];
                                $_SESSION["foto"] = $respuesta["foto"];
                                $_SESSION["estado"] = $respuesta["estado"];
                                $_SESSION["ultimo_login"] = $respuesta["ultimo_login"];
                                $_SESSION["fecha"] = $respuesta["fecha"];


                                // Zona horaria
                                //date_default_timezone_set('America/Guayaquil');
                                

                                $formatoFecha = date('Y-m-d');
                                $formatoHora = date('H:i:s');
                                $fechaActual = $formatoFecha.' '.$formatoHora;

                                $fecha = new DateTime();
                                $zona = $fecha->getTimezone();
                                $zona->getName();
                                date_default_timezone_set($zona->getName());

                                $item1 = "ultimo_login";
                                $valor1 = $fechaActual;
                                $item2 = "id";
                                $valor2 = $respuesta["id"];
                                $tabla = "usuarios";

                                $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, 
                                    $item1, $valor1, $item2, $valor2);

                                if ($ultimoLogin == "ok") {
                                    echo '
                                        <script> 
                                            window.location = "inicio"; 
                                        </script>';  
                                }



                                /*if (strcmp($timeZone, ini_get('date.timezone'))) {
                                    echo '<script>                    
                                            Swal.fire({
                                                icon: "error",
                                                title: "Problemas con la Zona Horaria",
                                                text: "La zona horaria no está configurada correctamente.",
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
                                            window.location = "inicio";
                                        </script>';
                                }*/
                                
                            } 
                            else {
                                echo '<script>
                    
                                Swal.fire({
                                    icon: "error",
                                    title: "Usuario no activado",
                                    text: "El usuario no ha sido activado todavía.",
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

    // Mostrar Usuario
    static public function ctrMostrarUsuarios($item, $valor) {

        $tabla = "usuarios";

        $resp = ModeloUsuarios::mdlMostarUsuarios($tabla, $item, $valor);
        
        return $resp;
    }

    // Editar Usuario
    public static function ctrEditarUsuario() {
        if (isset($_POST["editarUsuario"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                $ruta = $_POST["fotoActual"];
                
                if (isset($_FILES["editarFoto"]["tmp_name"]) &&
                    !empty($_FILES["editarFoto"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    // Crear el directorio
                    $directorio = 'vistas/img/usuarios/'.$_POST["editarUsuario"];

                    // Preguntar si ya existe en la BD

                    if (!empty($_POST["fotoActual"])) {
                        unlink($_POST["fotoActual"]);
                    } else {
                        // El directorio actual debe tener permisos para el usuario Apache
                        //$pwd = getwd();
                        mkdir($directorio, 0755, true);
                    }
                                        
                    //var_dump($_FILES["editarFoto"]["tmp_name"]);

                    if ($_FILES['editarFoto']['type'] == "image/jpg" ||
                    $_FILES['editarFoto']['type'] == "image/jpeg") {

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/".$_POST['editarUsuario']."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES['editarFoto']['type'] == "image/png") {

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/usuarios/".$_POST['editarUsuario']."/".$aleatorio.".png";

                        $origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }


                }

                $tabla = "usuarios";
                
                if ($_POST["editarClave"] != "") {
                    if(preg_match('/^[a-zA-Z0-9!¡#@.-_]+$/', $_POST["editarClave"])){
                        $clavesha = sha1($_POST["editarClave"]);
                    }
                    else {
                        echo '<script>
                
                        Swal.fire({
                            icon: "error",
                            title: "¡Uy!, Algo sali&oacute; mal",
                            text: "La clave no puede estar vacía o contener caracteres especiales.",
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
                    $clavesha = $claveActual;
                }

                $datos = array(
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $clavesha,
                    "perfil" => $_POST["editarPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>                    
                        Swal.fire({
                            icon: "success",
                            title: "Tarea exitosa",
                            text: "El usuario ha sido modificado correctamente.",
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
                            title: "¡Uy! Algo salió mal",
                            text: "El nombre no puede estar vacío o llevar caracteres especiales.",
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

    // Borrar Usuario
    public static function ctrBorrarUsuario() {
        if(isset($_GET["idUsuario"])){
            $tabla =" usuarios";

            $datos = $_GET["idUsuario"];

            if ($_GET["fotoUsuario"]!= ""){
                unlink($_GET["fotoUsuario"]);
                rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
            }

            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>                    
                Swal.fire({
                    icon: "success",
                    title: "Tarea exitosa",
                    text: "El usuario ha sido borrado correctamente.",
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
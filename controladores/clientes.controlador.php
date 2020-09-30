<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ControladorClientes{

    // Crear Cliente
    static public function ctrCrearCliente(){

        if(isset($_POST["nuevoCliente"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevaCedula"]) &&
                filter_var($_POST["nuevoCorreo"], FILTER_VALIDATE_EMAIL)
                /*preg_match('/^[0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', 
                    $_POST["nuevoCorreo"])/* &&
                preg_match('/^[0-9_ ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])*/){

                    $tabla = "clientes";

                    $datos = array(
                        "nombre" => $_POST["nuevoCliente"],
                        "documento" => $_POST["nuevaCedula"],
                        "email" => $_POST["nuevoCorreo"],
                        "telefono" => trim($_POST["nuevoTelefono"],"_"),
                        "direccion" => $_POST["nuevaDireccion"],
                        "fecha_nacimiento" => $_POST["nuevaFechaNacimiento"],
                        "compras" => "0"
                    );

                    //var_dump($datos);
                    

                    $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                        
                            Swal.fire({
                                icon: "success",
                                title: "Proceso exitoso",
                                text: "El producto fue ingresado exitosamente.",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                
                            }).then((result) => {
                                if (result) {
                                    window.location = "clientes";
                                    }
                                }); 
                            
                            </script>';
                    }
                    else {
                        echo 'console.log("Error");';
                    }


            }
            else {
                echo '<script>                    
                    Swal.fire({
                        icon: "error",                        
                        title: "¡Uy!, Algo sali&oacute; mal",
                        text: "Ha ingresado datos incorrectos sobre el cliente, por favor revise y reintente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        
                    }).then((result) => {
                        if (result) {
                            window.location = "clientes";
                            }
                        }); 
                    
                    </script>';
            }

        }
    }

    // Mostrar Clientes
    static public function ctrMostrarClientes($item, $valor){

        $tabla = "clientes";

        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    }

    // Editar Cliente
    static public function ctrEditarCliente(){

        if(isset($_POST["editarCliente"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
                filter_var($_POST["editarCorreo"], FILTER_VALIDATE_EMAIL)) {       

                    /*$ruta = $_POST["imagenActual"];                    

                    if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

                        list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        // Crear el directorio
                        $directorio = 'vistas/img/productos/'.$_POST["editarCodigo"];

                        // Preguntar si ya existe en la BD                        

                        if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {
                            unlink($_POST["imagenActual"]);
                        } else {
                            // El directorio actual debe tener permisos para el usuario Apache
                            //$pwd = getwd();
                            mkdir($directorio, 0755, true);
                        }
                        
                        // El directorio actual debe tener permisos para el usuario Apache
                        //$pwd = getwd();
                        //mkdir($directorio, 0755, true);
                        //var_dump($_FILES["editarImagen"]["tmp_name"]);

                        if ($_FILES['editarImagen']['type'] == "image/jpg" ||
                        $_FILES['editarImagen']['type'] == "image/jpeg") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/productos/".$_POST['editarCodigo']."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES['editarImagen']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                        if ($_FILES['editarImagen']['type'] == "image/png") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/productos/".$_POST['editarCodigo']."/".$aleatorio.".png";

                            $origen = imagecreatefromjpeg($_FILES['editarImagen']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                    }*/

                $tabla = "clientes";
                //$ruta = "vistas/img/productos/default/anonymous.png";

                $datos = array(
                    "id"=>$_POST["idCliente"],
                    "nombre"=>$_POST["editarCliente"],
                    "documento"=>$_POST["editarCedula"],
                    "email"=>$_POST["editarCorreo"],
                    "telefono"=>trim($_POST["editarTelefono"], "_"),                    
                    "direccion"=>$_POST["editarDireccion"],
                    "fecha_nacimiento"=>$_POST["editarFechaNacimiento"],                    
                    "compras"=>0);
                
                //var_dump($datos);               
                
                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "Los datos del cliente fueron modificados exitosamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "clientes";
                                }
                            }); 
                        
                        </script>';
                }
                else {
                    echo 'console.log("Error");';
                }

            }
            else {
                echo '<script>
                    
                    Swal.fire({
                        icon: "error",                        
                        title: "¡Uy!, Algo sali&oacute; mal",
                        text: "Los datos del cliente no pueden estar vacíos o llevar caracteres especiales.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        
                    }).then((result) => {
                        if (result) {
                            window.location = "clientes";
                            }
                        }); 
                    
                    </script>';
            }
        }            
    }

}

?>

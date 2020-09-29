<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ControladorClientes{

    //Crear Clientes
    static public function ctrCrearCliente(){

        if(isset($_POST["nuevoCliente"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevaCedula"]) /*&&
                preg_match('/^[0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', 
                    $_POST["nuevoCorreo"])/* &&
                preg_match('/^[0-9_ ]+$/', $_POST["nuevoTelefono"]) &&
                preg_match('/^[#\.\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"])*/){

                    $tabla = "clientes";

                    $datos = array(
                        "nombre" => $_POST["nuevoCliente"],
                        "documento" => $_POST["nuevaCedula"],
                        "email" => $_POST["nuevoCorreo"],
                        "telefono" => $_POST["nuevoTelefono"],
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

}

?>

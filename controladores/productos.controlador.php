<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControladorProductos{

    // Mostrar Productos

    static public function ctrMostrarProductos($item, $valor){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    }

    // Crear Producto

    static public function ctrCrearProducto(){ 

        if(isset($_POST["nuevaDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) && 
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"]) && 
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioVenta"])){

                $tabla = "productos";
                $ruta = "vistas/img/productos/default/anonymous.png";

                $datos = array(
                    "id_categoria"=>$_POST["nuevaCategoria"],
                    "codigo"=>$_POST["nuevoCodigo"],
                    "descripcion"=>$_POST["nuevaDescripcion"],
                    "imagen"=>$ruta,
                    "stock"=>$_POST["nuevoStock"],
                    "precio_compra"=>$_POST["nuevoPrecioCompra"],
                    "precio_venta"=>$_POST["nuevoPrecioVenta"],
                    "ventas"=>0);
                
                    var_dump($datos);
                

                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "El producto fue guardado exitosamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "productos";
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
                        type: "error",
                        title: "¡Uy!, Algo sali&oacute; mal",
                        text: "El producto no puede estar vacío o llevar caracteres especiales.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        
                    }).then((result) => {
                        if (result) {
                            window.location = "productos";
                            }
                        }); 
                    
                    </script>';
            }
        }    
    }
}
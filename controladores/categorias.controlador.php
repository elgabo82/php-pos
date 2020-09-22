<?php

class ControladorCategorias {
    // Crear Categorías
    static public function ctrCrearCategoria(){

        //$_POST["nuevaCategoria"] = "Clavos";        

        if (isset($_POST["nuevaCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

                $tabla = "categorias";

                //echo '<script>console.log("Categoría: '.$_POST["nuevaCategoria"].'");</script>';
                //echo '<script>console.log("Tabla: '.$tabla.'");</script>';                
                
                $datos = $_POST["nuevaCategoria"];

                //var_dump($datos);

                $respuesta = ModeloCategorias::mdlCrearCategoria($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "La categoría fue guardada exitosamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "categorias";
                                }
                            }); 
                        
                        </script>';
                }
                
            }
            else {
                echo '<script>
                    
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "¡Uy!, Algo sali&oacute; mal",
                        text: "La categoría no puede estar vacía o llevar caracteres especiales.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        
                    }).then((result) => {
                        if (result) {
                            window.location = "categorias";
                            }
                        }); 
                    
                    </script>';
            }
        }

    }

    // Mostrar Categorías
    static public function ctrMostrarCategorias($item, $valor) {

        $tabla = "categorias";

        $resp = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        
        return $resp;
    }

    // Editar Categoría
    static public function ctrEditarCategoria(){        

        if (isset($_POST["editarCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

                $tabla = "categorias";

                //echo '<script>console.log("Categoría: '.$_POST["nuevaCategoria"].'");</script>';
                //echo '<script>console.log("Tabla: '.$tabla.'");</script>';                
                
                $datos = array(
                                "categoria"=>$_POST["editarCategoria"],
                                "id"=>$_POST["idCategoria"]);

                //var_dump($datos);

                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "La categoría fue modificada exitosamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "categorias";
                                }
                            }); 
                        
                        </script>';
                }
                
            }
            else {
                echo '<script>
                    
                    Swal.fire({
                        icon: "error",
                        type: "error",
                        title: "¡Uy!, Algo sali&oacute; mal",
                        text: "La categoría no puede estar vacía o llevar caracteres especiales.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        
                    }).then((result) => {
                        if (result) {
                            window.location = "categorias";
                            }
                        }); 
                    
                    </script>';
            }
        }

    }

    // Borrar Categoría
    static public function ctrBorrarCategoria(){

        if(isset($_GET["idCategoria"])){

            $tabla = "categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>                        
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "La categoría fue borrada exitosamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            
                        }).then((result) => {
                            if (result) {
                                window.location = "categorias";
                                }
                            });
                    </script>';
            }

        }
    }

}

?>
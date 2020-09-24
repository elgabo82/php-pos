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
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) && 
                preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){

                    $ruta = "vistas/img/productos/default/anonymous.png";

                    if (isset($_FILES["nuevaImagen"]["tmp_name"])) {

                        list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        // Crear el directorio
                        $directorio = 'vistas/img/productos/'.$_POST["nuevoCodigo"];
                        
                        // El directorio actual debe tener permisos para el usuario Apache
                        //$pwd = getwd();
                        mkdir($directorio, 0755, true);
                        //var_dump($_FILES["nuevaImagen"]["tmp_name"]);

                        if ($_FILES['nuevaImagen']['type'] == "image/jpg" ||
                        $_FILES['nuevaImagen']['type'] == "image/jpeg") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/productos/".$_POST['nuevoCodigo']."/".$aleatorio.".jpg";

                            $origen = imagecreatefromjpeg($_FILES['nuevaImagen']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                        if ($_FILES['nuevaImagen']['type'] == "image/png") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "vistas/img/productos/".$_POST['nuevoCodigo']."/".$aleatorio.".png";

                            $origen = imagecreatefromjpeg($_FILES['nuevaImagen']['tmp_name']);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                    }

                $tabla = "productos";
                //$ruta = "vistas/img/productos/default/anonymous.png";

                $datos = array(
                    "id_categoria"=>$_POST["nuevaCategoria"],
                    "codigo"=>$_POST["nuevoCodigo"],
                    "descripcion"=>$_POST["nuevaDescripcion"],
                    "imagen"=>$ruta,
                    "stock"=>$_POST["nuevoStock"],
                    "precio_compra"=>$_POST["nuevoPrecioCompra"],
                    "precio_venta"=>$_POST["nuevoPrecioVenta"],
                    "ventas"=>0);
                
                    //var_dump($datos);
                

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

    static public function ctrEditarProducto(){        

        if(isset($_POST["editarDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) && 
                preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) && 
                preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

                    $ruta = $_POST["imagenActual"];                    

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

                    }

                $tabla = "productos";
                //$ruta = "vistas/img/productos/default/anonymous.png";

                $datos = array(
                    "id_categoria"=>$_POST["editarCategoria"],
                    "codigo"=>$_POST["editarCodigo"],
                    "descripcion"=>$_POST["editarDescripcion"],
                    "imagen"=>$ruta,
                    "stock"=>$_POST["editarStock"],
                    "precio_compra"=>$_POST["editarPrecioCompra"],
                    "precio_venta"=>$_POST["editarPrecioVenta"],
                    "ventas"=>0);
                
                    //var_dump($datos);
                

                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    
                        Swal.fire({
                            icon: "success",
                            title: "Proceso exitoso",
                            text: "El producto fue modificado exitosamente.",
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

    // Eliminar Producto
    static public function ctrEliminarProducto(){

        if(isset($_GET["idProducto"])){
            $tabla = "productos";
            $datos = $_GET["idProducto"];

            if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){
                unlink($_GET["imagen"]);
                rmdir('vistas/img/productos/'.$_GET["codigo"]);
            }

            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>                    
                Swal.fire({
                    icon: "success",
                    title: "Tarea exitosa",
                    text: "El producto ha sido borrado correctamente.",
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
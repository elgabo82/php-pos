<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaProductos{

    // Mostrar tabla productos
    static public function mostrarProductos(){

        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);
        
        /*var_dump($productos);*/                

        $datosJson = '{
            "data": [';
            for ($i = 0; $i < count($productos); $i++){
            
                $imagen ="<img src='".$productos[$i]["imagen"]."' width='40px'>";                

                $item = "id";
                $valor = $productos[$i]["id_categoria"];
                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                if ($productos[$i]["stock"] <= 10){
                    $stock = "<button title='Considere iniciar el abastecimiento' alt='Considere iniciar el abastecimiento' class='btn btn-danger'>".$productos[$i]["stock"]."</button>";
                }
                else if ($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15){
                    $stock = "<button title='Cantidad cercana a la m&iacute;nima' alt='Cantidad cercana a la m&iacute;nima' class='btn btn-warning'>".$productos[$i]["stock"]."</button>";
                } 
                else 
                    {
                        $stock = "<button title='Cantidad suficiente' alt='Cantidad suficiente' class='btn btn-success'>".$productos[$i]["stock"]."</button>";
                    }
                

                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' name='btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarProducto' name='btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";
            
                $datosJson.='[
                    "'.($i+1).'",  
                    "'.$imagen.'",
                    "'.$productos[$i]["codigo"].'",
                    "'.$productos[$i]["descripcion"].'",
                    "'.$categorias["categoria"].'",
                    "'.$stock.'",
                    "'.$productos[$i]["precio_compra"].'",
                    "'.$productos[$i]["precio_venta"].'",
                    "'.$productos[$i]["fecha"].'",
                    "'.$botones.'"
                ],';
            }
            $datosJson = substr($datosJson, 0, -1);        
            $datosJson.=']
            }';       
        
        echo $datosJson;     
        
        
        /*echo '{
            "data": [
                [
                    "1",                    
                    "ruta1",
                    "101",
                    "Aspiradora",
                    "Taladros",
                    "5",                    
                    "$7",
                    "$8",
                    "2020-09-21 19:05",
                    "botones"
                ],
                [
                    "2",                   
                    "ruta2",
                    "102",
                    "Plato",
                    "Martillos",
                    "15",
                    "$6",
                    "$17",                    
                    "2020-09-21 19:05",
                    "botones"
                ]
            ]
        }';*/

    }
}

// Activar productos
$activarProductos = new TablaProductos();
$activarProductos->mostrarProductos();

?>
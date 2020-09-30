<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes{

    // Mostrar tabla clientes
    static public function mostrarClientes(){

        $item = null;
        $valor = null;

        $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
        
        //var_dump($clientes);        

        $datosJson = '{
            "data": [';
            for ($i = 0; $i < count($clientes); $i++){
            
                //$imagen ="<img src='".$productos[$i]["imagen"]."' width='40px'>";                

                $item = "id";
                $valor = $clientes[$i]["id"];                

                /*if ($clientes[$i]["stock"] <= 10){
                    $stock = "<button title='Considere iniciar el abastecimiento' alt='Considere iniciar el abastecimiento' class='btn btn-danger'>".$clientes[$i]["stock"]."</button>";
                }
                else if ($clientes[$i]["stock"] > 11 && $clientes[$i]["stock"] <= 15){
                    $stock = "<button title='Cantidad cercana a la m&iacute;nima' alt='Cantidad cercana a la m&iacute;nima' class='btn btn-warning'>".$clientes[$i]["stock"]."</button>";
                } 
                else 
                    {
                        $stock = "<button title='Cantidad suficiente' alt='Cantidad suficiente' class='btn btn-success'>".$clientes[$i]["stock"]."</button>";
                    }*/
                

                $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarCliente' name='btnEditarCliente' id='btnEditarCliente' idCliente='".$clientes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCliente'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnEliminarCliente' name='btnEliminarCliente' idCliente='".$clientes[$i]["id"]."'><i class='fa fa-times'></i></button></div>";
            
                $datosJson.='[
                    "'.$clientes[$i]["id"].'",                      
                    "'.$clientes[$i]["nombre"].'",
                    "'.$clientes[$i]["documento"].'",
                    "'.$clientes[$i]["email"].'",
                    "'.$clientes[$i]["telefono"].'",                    
                    "'.$clientes[$i]["direccion"].'",
                    "'.$clientes[$i]["fecha_nacimiento"].'",
                    "'.$clientes[$i]["compras"].'",
                    "'.$clientes[$i]["fecha"].'",
                    "'.$botones.'"
                ],';
            }
            $datosJson = substr($datosJson, 0, -1);        
            $datosJson.=']
            }';       
        
        echo $datosJson;

    }
}

// Mostrar clientes
$mostrarClientes = new TablaClientes();
$mostrarClientes->mostrarClientes();

?>
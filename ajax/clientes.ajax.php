<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes {
    // Editar Cliente
    public $idCliente;

    public function ajaxEditarCliente(){

        $item = "id";
        $valor = $this->idCliente;

        $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

        echo json_encode($respuesta);

    }

}

// Editar cliente
if(isset($_POST["idCliente"])){    
    $editar = new AjaxClientes();

    $editar->idCliente = $_POST["idCliente"];
    $editar->ajaxEditarCliente();
}

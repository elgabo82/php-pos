<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias { 
    
    public $validarCategoria;

    // Validar usuarios para evitar duplicados
    public function ajaxValidarCategoria(){

        $item = "categoria";
        $valor = $this->validarCategoria;      

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
    }
}

// Editar usuario
/*if(isset($_POST["idUsuario"])){    
    $editar = new AjaxUsuarios();

    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuario();
}*/

// Activar usuario
/*if(isset($_POST["activarUsuario"])){    

    $activarUsuario = new AjaxUsuarios();

    $activarUsuario->activarUsuario = $_POST["activarUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];

    $activarUsuario -> ajaxActivarUsuario();

}*/

// Validar categorías para evitar duplicados

echo $_POST["validarCategoria"];
if (isset($_POST["validarCategoria"])){

    echo $_POST["validarCategoria"];
    var_dump($_POST["validarCategoria"]);

    $valCategoria = new AjaxCategorias();
    $valCategoria->validarCategoria = $_POST["validarCategoria"];
    $valCategoria->ajaxValidarCategoria();
}

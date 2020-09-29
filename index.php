<?php

// Controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
#require_once "controladores/perfil.controlador.php";
#require_once "controladores/config.controlador.php";
#require_once "controladores/ventas.controlador.php";

// Modelos
require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
#require_once "modelos/perfil.modelo.php";
#require_once "modelos/config.modelo.php";
#require_once "modelos/ventas.modelo.php";

$plantilla = new ControladorPlantilla();

$plantilla -> ctrPlantilla();

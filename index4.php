<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);



//$usuario="gabriel eduardo";
$producto = "UPS 10KVA";
//$directorio = 'vistas/img/usuarios/'.$usuario;
$directorio = 'vistas/img/productos/';//.$producto;

//$dir = 'vistas/img/usuarios/';
//chdir($directorio);

$pwd = getcwd();
chdir($directorio);
$pwd = getcwd();

//var_dump($_SERVER['DOCUMENT_ROOT']);

var_dump($pwd);

//chmod($pwd,0777);
//echo exec('whoami');

//$dirnuevo = $pwd.'/'.$usuario;
$dirnuevo = $pwd.'/'.$producto;

//var_dump($dirnuevo);
mkdir($producto, 0755, true);
//mkdir($usuario, 0777, true);
//mkdir($directorio, 0755, true);


?>
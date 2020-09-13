<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL | E_STRICT);



$usuario="gabriel";
$directorio = 'vistas/img/usuarios/'.$usuario;

/*$dir = 'vistas/img/usuarios/';
chdir($dir);*/
$pwd = getcwd();
//var_dump($_SERVER['DOCUMENT_ROOT']);

var_dump($pwd);

//chmod($pwd,0777);
//echo exec('whoami');

$dirnuevo = $pwd.'/'.$usuario;

//var_dump($dirnuevo);

//mkdir($usuario, 0777, true);
mkdir($directorio, 0755, true);


?>
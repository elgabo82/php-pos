
<html>
    <title>Prueba</title>
    <p>Prueba</p>
</html>

<?php

ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL);
 
try {
$db = new PDO("mysql:host=localhost;dbname=pos", 
"usuariopos", 
"P0S.2020!");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db -> exec("SET NAMES utf8");
} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}



$datos = array(
    "nombre" => "Gabriel Morejón",
    "usuario" => "gabriel",
    "password" => "Clave",
    "perfil" => "Administrador",
    "foto" => "Foto",
    "estado" => 1,
    "ultimo_login" => "2020-06-09",
    "fecha" => "2020-06-09"
);



//var_dump($datos);

$tabla = "usuarios";
/*$consulta = $db->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha)
    VALUES(:nombre, :usuario, :password, :perfil, :foto, :estado, :ultimo_login, :fecha)");*/


$consulta = $db->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil)
    VALUES(:nombre, :usuario, :password, :perfil)");


$consulta->bindParam(':nombre', $nombre);
$consulta->bindParam(':usuario', $usuario);
$consulta->bindParam(':password', $password);
$consulta->bindParam(':perfil', $perfil);
/*$consulta->bindParam(':foto', $foto);
$consulta->bindParam(':estado', $estado);
$consulta->bindParam(':ultimo_login', $ultimo_login);
$consulta->bindParam(':fecha', $fecha);*/


$nombre = $datos["nombre"];
$usuario = $datos["usuario"];
$password = sha1($datos["password"]);
$perfil = $datos["perfil"];
/*$foto = $datos["foto"];
$estado = $datos["estado"];
$ultimo_login = $datos["ultimo_login"];
$fecha = $datos["fecha"];*/

echo $nombre . " " . $usuario . " " . $password;

//$consulta->execute();

echo 'Ejecutado con éxito';
$db = null;


/*$consulta2 = "INSERT INTO $tabla(nombre, usuario, password, perfil)
VALUES(:nombre, :usuario, :password, :perfil)";*/

/*$stmt = $db->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, estado, ultimo_login, fecha)
VALUES(:nombre, :usuario, :password, :perfil, :foto, :estado, :ultimo_login, :fecha)");*/

/*$stmt = $db->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil)
VALUES(:nombre, :usuario, :password, :perfil)");*/


//var_dump($datos);
//print_r($datos);
//printf($consulta);
//print_r($consulta2);

/*$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":usuario", $usuario);
$stmt->bindParam(":password", $password);
$stmt->bindParam(":perfil", $perfil);*/
/*$stmt->bindParam(":foto", $foto);
$stmt->bindParam(":estado", $estado);
$stmt->bindParam(":ultimo_login", $ultimo_login);
$stmt->bindParam(":fecha", $fecha);*/


//printf($consulta2);
//var_dump($consulta2);


/*if ($stmt->execute()) {
    printf('Correcto consulta 2');
    echo '<script>console.log("Correcto - Consulta 2 - INSERT");</script>';
} else {
    printf("\nError INSERT");
    //echo 'Error: ' . $db->error;
    echo '<script>console.log("Error - Consulta 2 - INSERT");</script>';
}*/

//$stmt->close();
//$db = null;

?>
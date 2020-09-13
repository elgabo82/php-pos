<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WebPOS - GrupoFMO &copy;2020</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="vistas/img/favicon.ico"> <!-- Icono -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="vistas/plugins/toastr/toastr.min.css">  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">  
    
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="vistas/plugins/toastr/toastr.min.js"></script>
  
  <!-- AdminLTE for demo purposes
  <script src="./vistas/dist/js/demo.js"></script> -->

  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.js"></script>
  


  <!-- Principal -->
  <script src="vistas/js/main.js"></script>

  <!-- Alertas -->
  <!--<script src="vistas/js/alertas.js"></script>-->

<!--<script>
    $.noConflict();
</script>-->
</head> <!-- sidebar-collapse -->
<!-- Comentada y reubicada luego de la validación de la sesión -->
<!--<body class="hold-transition sidebar-mini layout-fixed">-->
<body>

<?php
// Falta generar variables aleatorias para el inicio de sesión
if (isset($_SESSION["sesionIniciada"]) && $_SESSION["sesionIniciada"] == "ok"){
  echo '<body class="hold-transition sidebar-mini layout-fixed">';
    echo '<div class="wrapper">';

    include "modulos/header.php";
    include "modulos/menu.php";

  if (isset($_GET["ruta"])) {
    if ($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "usuarios" || 
        $_GET["ruta"] == "config" || 
        $_GET["ruta"] == "categorias" || 
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "reporteventas" ||
        $_GET["ruta"] == "cerrar") {
      include "modulos/".$_GET["ruta"].".php";
    }
    else {
      include "modulos/error.php";
    }
  } else {
    include "modulos/inicio.php";
  }
    include "modulos/pie.php";

  echo '</div>';
  echo '</body>';
} else {
  echo' <body class="hold-transition sidebar-mini layout-fixed login-page">';
  include "modulos/login.php";
  echo '</body>';
}


?>
<script src="vistas/js/usuarios.js"></script>
</body>
</html>

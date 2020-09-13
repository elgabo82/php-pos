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
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script> 
  
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar usuarios
            </h1>            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-dashboard nav-icon text-warning"></i>
                  <a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header"> 
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>
        </div>

        <div class="card-body">
        
          <table id="tabla" class="table table-bordered dt-responsive table-striped tabla">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>&Uacute;ltimo inicio de ses.</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Usuario 1</td>
                <td>A</td>
                <td>4</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>7</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
              <tr>              
                <td>2</td>
                <td>Usuario 2</td>
                <td>B</td>
                <td>4</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>7</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
              <tr>              
                <td>3</td>
                <td>Usuario 3</td>
                <td>C</td>
                <td>4</td>
                <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>7</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>                                              
            </tbody>            
          </table>                  
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>



<!-- Ventana Modal - Agregar usuarios -->
<div class="modal fade" id="modalAgregarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar usuario</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!--Nombre de usuario-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" placeholder="Nombres y Apellidos" 
                    name="nuevoNombre" id="nuevoNombre" required>
                </div>                
              </div>
            </div>

            <!--Usuario-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" placeholder="Usuario" 
                    name="nuevoUsuario" id="nuevoUsuario" autocomplete="username" required>
                </div>                
              </div>
            </div>

            <!--Clave-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" placeholder="Contraseña" 
                    name="nuevaClave" id="nuevaClave" autocomplete="current-password" required>
                </div>                
              </div>
            </div>

            <!-- Selección de perfil -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="nuevoPerfil" class="form-control input-lg" id="nuevoPerfil">
                  <option value="">Seleccione el perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Usuario">Usuario</option>
                  <option value="Invitado">Invitado</option>
                </select>
              </div>
            </div>

            <!-- Foto de perfil -->
            <div class="form-group">
              <div class="panel">Subir foto</div>
              <input type="file" id="nuevaFoto" name="nuevaFoto" id="nuevaFoto">
              <p class="help-block">
                Peso m&aacute;ximo 12MB
              </p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      
        <?php

          class ControladorUsuarios {
            /* Registro de usuario */
            static public function ctrCrearUsuario(){
                //echo 'Ingresando a la función ctrCrearUsuario\n';
                
                if (isset($_POST["nuevoUsuario"])) {
                    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) && 
                        preg_match('/^[a-zA-Z0-9!¡#@.-_]+$/', $_POST["nuevaClave"])) {

                    } 
                    else {
                      var_dump($_POST["nuevoUsuario"]);
                        echo '<script>                                                

                        alert(
                          "Error de ingreso de datos"
                        );
                        
                        </script>';         
                    }
                  
                }

            }
          }

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

</body>
</html>
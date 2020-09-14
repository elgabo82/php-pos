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
              <?php
                $item = null;
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                //var_dump($usuarios);

                foreach ($usuarios as $key => $value) {
                  //var_dump($value["nombre"]);
                  echo '
                  <tr>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["usuario"].'</td>
                    <td>'.$value["perfil"].'</td>';

                    if ($value["foto"] != "") {
                      echo '<td><img src='.$value["foto"].' 
                        class="img-thumbnail" width="40px"></td>';
                    }
                    else {
                      echo '<td><img src="vistas/img/usuarios/default/anonymous.png" 
                        class="img-thumbnail" width="40px"></td>';
                    }
                  
                    if ($value["estado"] !=0) {
                      echo '<td>
                      <button class="btn btn-success 
                        btn-xs btnActivar" idUsuarioEstado="'.$value["id"].'" 
                        estadoUsuario="0">Activado
                      </button></td>';
                    }
                    else {
                      echo '<td>
                      <button class="btn btn-danger
                        btn-xs btnActivar" idUsuarioEstado="'.$value["id"].'" 
                        estadoUsuario="1">Desactivado
                      </button></td>';
                    }                                      

                  echo'
                    <td>'.$value["ultimo_login"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarUsuario" 
                          idUsuario="'.$value["id"].'" data-toggle="modal" 
                          data-target="#modalEditarUsuario">
                        <i class="fas fa-edit"></i></button>
                        <button class="btn btn-danger">
                        <i class="fa fa-times"></i></button>
                      </div>
                    </td>
                  </tr>';
                }
              ?>                                
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
                    name="nuevoUsuario" 
                    autocomplete="username"
                    id="nuevoUsuario" required>
                </div>                
              </div>
            </div>

            <!--Clave-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" placeholder="Contraseña" 
                    autocomplete="current-password"
                    name="nuevaClave" id="nuevaClave" required>
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
              <input type="file" class="nuevaFoto" name="nuevaFoto" id="nuevaFoto">
              <p class="help-block">Peso m&aacute;ximo 3MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" 
                class="img-thumbnail previsualizar" id="previsualizar" 
                name="previsualizar" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary swalDefaultWarning">Guardar</button>
        </div>
      
        <?php          

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

<!-- Ventana Modal - Editar usuarios -->
<div class="modal fade" id="modalEditarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Editar usuario</h4>
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
                  <input type="text" class="form-control input-lg" value="" 
                    name="editarNombre" id="editarNombre" required>
                </div>                
              </div>
            </div>

            <!--Usuario-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" value="" 
                    name="editarUsuario" 
                    autocomplete="username"
                    id="editarUsuario" readonly>
                </div>                
              </div>
            </div>

            <!--Clave-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" placeholder="Escriba la nueva clave" 
                    autocomplete="current-password"
                    name="editarClave" id="editarClave">
                  <input type="hidden" id="claveActual" name="claveActual">
                </div>                
              </div>
            </div>


            <!--Repetir Clave-->
            <!--<div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" placeholder="Contraseña" 
                    autocomplete="current-password"
                    name="editarClave" id="editarClave" required>
                </div>                
              </div>
            </div>-->
            

            <!-- Selección de perfil -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="editarPerfil" class="form-control input-lg">
                  <option value="" id="editarPerfil"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Usuario">Usuario</option>
                  <option value="Invitado">Invitado</option>
                </select>
              </div>
            </div>

            <!-- Foto de perfil -->
            <div class="form-group">
              <div class="panel">Subir foto</div>
              <input type="file" class="editarFoto" name="editarFoto" id="editarFoto">
              <p class="help-block">Peso m&aacute;ximo 3MB</p>
              <img src="vistas/img/usuarios/default/anonymous.png" 
                class="img-thumbnail previsualizarEditada" id="previsualizarEditada" 
                name="previsualizarEditada" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary swalDefaultWarning">Guardar cambios</button>
        </div>
      
        <?php          

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrEditarUsuario();

        ?>

      </form>
    </div>
  </div>
</div>

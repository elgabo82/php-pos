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
          <!--<h3 class="card-title">Title</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>-->
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar usuario
          </button>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped tablas">
            <thead>
              <tr>
                <th>#ID</th>
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
                <td>2</td>
                <td>3</td>
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
            </tbody>
            <tfoot>
              <tr>
                <th>#ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Perfil</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>&Uacute;ltimo inicio de ses.</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
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
      <form method="post" enctype="multipart/form-data" role="form">
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
                </div>
                <input type="text" class="form-control input-lg" placeholder="Nombres y Apellidos" 
                  name="nuevoNombre" required>
              </div>
            </div>

            <!--Usuario-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Usuario" 
                  name="nuevoUsuario" required>
              </div>
            </div>

            <!--Clave-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" class="form-control input-lg" placeholder="Contraseña" 
                  name="nuevaClave" required>
              </div>
            </div>

            <!-- Selección de perfil -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-users"></i></span>
                </div>
                <select name="nuevoPerfil" class="form-control input-lg">
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
              <input type="file" id="nuevaFoto" name="nuevaFoto">
              <p class="help-block">
                Peso m&aacute;ximo 12MB
              </p>
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
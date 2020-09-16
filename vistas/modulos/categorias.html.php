<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar categor&iacute;as
            </h1>            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-dashboard nav-icon text-warning"></i>
                  <a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar categor&iacute;as</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            Agregar categor&iacute;a
          </button>
        </div>

        <div class="card-body">
        
          <table id="tabla" class="table table-bordered dt-responsive table-striped tabla">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nombre Categor&iacute;a</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Equipos el&eacute;ctricos</td>                   
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
              <tr>              
                <td>2</td>
                <td>Materiales de construcci&oacute;n</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
              <tr>              
                <td>3</td>
                <td>Otros</td>
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
<div class="modal fade" id="modalAgregarCategoria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar categor&iacute;a</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!--Nombre de usuario-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Nueva categor&iacute;a" 
                  name="nuevaCategoria" required>
              </div>
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

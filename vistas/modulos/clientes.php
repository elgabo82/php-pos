<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar clientes</h1>            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-dashboard nav-icon text-warning"></i>
                  <a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar clientes</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            Agregar cliente
          </button>
        </div>

        <div class="card-body">
        
          <table id="tabla" class="table table-bordered dt-responsive table-striped tabla">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nombre</th>
                <th>C&eacute;dula</th>
                <th>Correo</th>
                <th>Tel&eacute;fono</th>
                <th>Direcci&oacute;n</th>
                <th>Fecha de nacimiento</th>
                <th>Total de compras</th>
                <th>&Uacute;ltima compra</th>
                <th>Ingreso al sistema</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Gabriel Morej&oacute;n</td>
                <td>1309540779</td>
                <td>gabrielmorejon@grupofmo.com</td>
                <td>0995974963</td>
                <td>V&iacute;a a Crucita</td>
                <td>09/06/1982</td>
                <td>10</td>
                <td>2020-08-15 16:15:25</td>
                <td>2019-06-15 09:45:55</td>
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



<!-- Ventana Modal - Agregar clientes -->
<div class="modal fade" id="modalAgregarCliente" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar cliente</h4>
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
                <input type="text" class="form-control input-lg" placeholder="Nombre cliente" 
                  name="nuevoCliente" id="nuevoCliente" required>
              </div>
            </div>

            <!--Identificación-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <input type="number" min="0" class="form-control input-lg" placeholder="N&uacute;mero de c&eacute;dula" 
                  name="nuevaCedula" id="nuevaCedula" required>
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

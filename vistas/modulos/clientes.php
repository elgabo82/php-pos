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
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Nombres y Apellidos del cliente" 
                  name="nuevoCliente" id="nuevoCliente" required>
              </div>
            </div>

            <div class="row">
                  <div class="col-xs-12 col-sm-4">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary btnValidarCedula" 
                          id="btnValidarCedula" name="btnValidarCedula">Validar c&eacute;dula
                        </button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-xs-12 col-sm-8">
                  <!--Identificación-->
                  <div class="form-group">
                      <div class="input-group">            
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                        </div>
                        <input type="number" min="0" class="form-control input-lg" placeholder="N&uacute;mero de c&eacute;dula" 
                          name="nuevaCedula" id="nuevaCedula" data-toogle="tooltip" data-placement="bottom" required>
                      </div>
                    </div>
                  </div>                  
              </div>

            <!--Fecha de Nacimiento-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control input-lg" 
                  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/aaaa" data-mask 
                  id="nuevaFechaNacimiento" name="nuevaFechaNacimiento" placeholder="Fecha de nacimiento: dd/mm/aaaa" required>
              </div>
            </div>            

            <!--Correo electrónico-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input type="email" min="0" class="form-control input-lg" placeholder="Correo electr&oacute;nico" 
                  name="nuevoCorreo" id="nuevoCorreo" required>
              </div>
            </div>

            <!--Teléfono-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" min="0" class="form-control input-lg" placeholder="Ingresar tel&eacute;fono" 
                  name="nuevoTelefono" id="nuevoTelefono" data-inputmask="'mask': ['999-99 999-999999 [x99999]', 
                  '+999 99 999 99999[9]-9999']" data-mask required>
              </div>
            </div>

            <!--Dirección-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-route"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Direcci&oacute;n" 
                  name="nuevaDireccion" id="nuevaDireccion" required>
              </div>
            </div>        

          </div> 
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar cliente</button>
        </div>
      </form>
    </div>
  </div>
</div>

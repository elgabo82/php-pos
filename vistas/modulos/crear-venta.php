<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nueva venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-dashboard nav-icon text-warning"></i>
                  <a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Contenido Principal -->
    <section class="content">
      <div class="row">
        <!--<div class="card">-->
          <!-- Formulario de ventas -->
          <div class="col-lg-5 col-sm-12">
            <div class="card card-success">
              <div class="card-header" style="background: #3c8dbc color:white;">
                <div class="card-body">
                  <form role="form" method="post">
                    <div class="card">
                      <!-- Vendedor -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>
                        </div>
                      </div>

                      <!-- Vendedor -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                          <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1234567890" readonly>
                        </div>
                      </div>

                      <!-- Entrada del cliente -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-users"></i></span>
                            <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                            <option value="">Seleccionar cliente</option>
                            </select>                          
                          <span class="input-group-text">                          
                            <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>
                        </div>
                      </div>

                      <!-- Entrada del producto -->
                      <div class="row nuevoProducto">
                        <!-- Descripción del producto-->
                        <div class="col-sm-6" style="padding-right: 0px">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <button class="btn btn-danger btn-xs"><i class="fas fa-times-circle"></i></button>
                                </span>
                              </div>                                
                              <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Producto" required>
                            </div>                            
                          </div>
                        </div>

                        <!-- Cantidad del producto -->
                        <div class="col-sm-2">
                          <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="0" placeholder="0" required>
                        </div>

                        <!-- Precio del producto -->
                        <div class="col-sm-4" style="padding-left: 0px">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="ion ion-social-usd"></i>
                                </span>
                              </div>                                
                              <input type="number" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" min="1" placeholder="00000" readonly required>
                            </div>                            
                          </div>
                        </div>
                      </div>

                      <!-- Botón agregar producto -->
                      <button type="button" class="btn btn-default hidden-lg">Agregar Producto</button>
                      <hr>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <!--</div>-->

        <!-- Tabla de productos -->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="card card-warning">
            <div class="card-header with-border" style="background: #3c8dbc color:white;">

            </div>
          </div>
        </div>
      </div> 
    </section>
 
  </div>

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
                          data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask 
                          id="nuevaFechaNacimiento" name="nuevaFechaNacimiento" placeholder="Fecha de nacimiento: yyyy/mm/dd" required>
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
                          name="nuevoTelefono" id="nuevoTelefono" data-inputmask="'mask': ['999-99 999-999999']" data-mask required>
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
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-primary">Guardar cliente</button>
              </div>
          </div> 
        </div>        
      </form>

      <?php
        /*$crearCliente = new ControladorClientes();
        $crearCliente->ctrCrearCliente();*/
      ?>
    </div>
  </div>
</div>
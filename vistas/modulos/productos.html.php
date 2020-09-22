<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar productos
            </h1>            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <i class="fa fa-dashboard nav-icon text-warning"></i>
                  <a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar productos</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar producto
          </button>
        </div>

        <div class="card-body">
        
          <table id="tabla" class="table table-bordered dt-responsive table-striped tabla">
            <thead>
              <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>C&oacute;digo</th>
                <th>Descripci&oacute;n</th>
                <th>Categor&iacute;a</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>A1</td>
                <td>Producto 1</td>
                <td>Cat. 1</td>
                <td>55</td>                
                <td>$1,50</td>
                <td>$2,25</td>
                <td>2020-09-17 17:54:14</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>A2</td>
                <td>Producto 2</td>
                <td>Cat. 1</td>
                <td>105</td>                
                <td>$4,50</td>
                <td>$5,25</td>
                <td>2020-09-17 17:55:20</td>                
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



<!-- Ventana Modal - Agregar Productos -->
<div class="modal fade" id="modalAgregarProducto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" role="form">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!--Código de producto-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Ingrese el c&oacute;digo." 
                  name="nuevoCodigo" required>
              </div>
            </div>

            <!--Descripción-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-buffer"></i></span>
                </div>
                <input type="text" class="form-control input-lg" placeholder="Descripci&oacute;n del producto" 
                  name="nuevaDescripcion" required>
              </div>
            </div>

            <!-- Selección de categoría -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <select name="nuevaCategoria" class="form-control input-lg">
                  <option value="">Seleccione Categoría</option>
                  <option value="Uno">A</option>
                  <option value="Dos">B</option>
                  <option value="Tres">C</option>
                </select>
              </div>
            </div>
            
            <!--Stock-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-buffer"></i></span>
                </div>
                <input type="number" class="form-control input-lg" min="0" placeholder="Cantidad" 
                  name="nuevoStock" required>
              </div>
            </div>
            
            <!--Precio de compra-->
            <div class="form-group row mb-2">
              <div class="col-sm-6">
                <div class="input-group">            
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg" min="0" placeholder="Precio de compra" 
                    name="nuevoPrecioCompra" required>
                </div>            
              </div>

              <!--Precio de venta-->
              <div class="col-sm-6">            
                <div class="input-group">            
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg" min="0" placeholder="Precio de venta" 
                    name="nuevoPrecioVenta" required>
                </div>
                <br>
                <!-- Checkbox porcentaje -->
              </div>                
            </div>
            
            <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" class="minimal percentage" id="usaPorcentaje" name="usaPorcentaje" checked>
                        <label for="usaPorcentaje">
                          Utilizar porcentaje
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- Porcentaje -->
                    <div class="input-group">         
                      <div class="input-group-prepend">                                                                
                          <span class="input-group-text"><i class="fa fa-percent"></i></span>                      
                      </div>
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>                 
                    </div>
                  </div>                  
                </div>

            <!-- Foto del producto -->
            <div class="form-group">
              <div class="panel">Subir imagen</div>
              <input type="file" id="nuevaImagen" name="nuevaImagen">
              <p class="help-block">
                Peso m&aacute;ximo 2MB
              </p>
              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="100px">
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

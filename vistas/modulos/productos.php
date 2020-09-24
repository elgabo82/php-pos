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
        
          <table id="tablaProductos" class="table table-bordered dt-responsive table-striped tablaProductos" width="100%" name="tablaProductos">
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
            <!-- Selección de categoría -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <select class="form-control input-lg nuevaCategoria" id="nuevaCategoria" name="nuevaCategoria" required>
                  <option value="">Seleccione Categoría</option>

                  <?php

                    $item = null;
                    $valor =  null;

                    $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                    foreach ($categorias as $key => $value) {
                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                    }

                  ?>
              
                </select>
              </div>
            </div>


            <!--Código de producto-->
            <div class="form-group">              
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="nuevoCodigo"
                  name="nuevoCodigo" readonly required>
              </div>
            </div>

            <!--Descripción-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-buffer"></i></span>
                </div>
                <input type="text" class="form-control input-lg nuevaDescripcion" placeholder="Descripci&oacute;n del producto" id="nuevaDescripcion" name="nuevaDescripcion" required>
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
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg nuevoPrecioCompra" 
                    id="nuevoPrecioCompra" 
                    min="0" step="any" placeholder="Precio de compra" 
                    name="nuevoPrecioCompra" required>
                </div>
              </div>

              <!--Precio de venta-->
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">       
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg nuevoPrecioVenta" 
                    min="0" step="any" placeholder="Precio de venta"
                    id="nuevoPrecioVenta"
                    name="nuevoPrecioVenta" required>
                </div>
                <br>
                <!-- Checkbox porcentaje -->
              </div>                
            </div>
            
            <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" class="minimal porcentaje" 
                          id="porcentaje" name="porcentaje" checked>
                        <label for="porcentaje">
                          Utilizar porcentaje
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <!-- Porcentaje -->
                    <div class="input-group">         
                      <div class="input-group-prepend">                                                                
                          <span class="input-group-text"><i class="fa fa-percent"></i></span>                      
                      </div>
                      <input type="number" class="form-control input-lg nuevoPorcentaje" 
                        id="nuevoPorcentaje" name="nuevoPorcentaje"
                        min="0" value="40" required>                 
                    </div>
                  </div>                  
                </div>

            <!-- Foto del producto -->
            <div class="form-group">
              <div class="panel">Subir imagen</div>
              <input type="file" class="nuevaImagen" id="nuevaImagen" name="nuevaImagen">
              <p class="help-block">
                Peso m&aacute;ximo 2MB
              </p>
              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar"
                id="previsualizar" name="previsualizar" width="100px">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>        

      </form>

      <?php
          $crearProducto = new ControladorProductos();
          $crearProducto->ctrCrearProducto();
      ?>


    </div>
  </div>
</div>


<!-- Ventana Modal - Editar Productos -->
<div class="modal fade" id="modalEditarProducto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" role="form">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Editar producto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!-- Selección de categoría -->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-th"></i></span>
                </div>
                <select class="form-control input-lg editarCategoria" name="editarCategoria" readonly required>
                  <option id="editarCategoria"></option>                 
                </select>
              </div>
            </div>


            <!--Código de producto-->
            <div class="form-group">              
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                </div>
                <input type="text" class="form-control input-lg" id="editarCodigo"
                  name="editarCodigo" readonly required>
              </div>
            </div>

            <!--Descripción-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-buffer"></i></span>
                </div>
                <input type="text" class="form-control input-lg editarDescripcion" 
                  id="editarDescripcion" name="editarDescripcion" required>
              </div>
            </div>
            
            <!--Stock-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fab fa-buffer"></i></span>
                </div>
                <input type="number" class="form-control input-lg editarStock" min="0" id="editarStock" 
                  name="editarStock" required>
              </div>
            </div>
            
            <!--Precio de compra-->
            <div class="form-group row mb-2">
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg editarPrecioCompra" 
                    id="editarPrecioCompra" 
                    min="0" step="any"
                    name="editarPrecioCompra" required>
                </div>
              </div>

              <!--Precio de venta-->
              <div class="col-xs-12 col-sm-6">
                <div class="input-group">       
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>
                  </div>
                  <input type="number" class="form-control input-lg editarPrecioVenta" 
                    min="0" step="any"
                    id="editarPrecioVenta"
                    name="editarPrecioVenta" readonly required>
                </div>
                <br>
                <!-- Checkbox porcentaje -->
              </div>                
            </div>
            
            <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" class="minimal porcentajeEditar" 
                          id="porcentajeEditar" name="porcentajeEditar" checked>
                        <label for="porcentajeEditar">
                          Utilizar porcentaje
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <!-- Porcentaje -->
                    <div class="input-group">         
                      <div class="input-group-prepend">                                                                
                          <span class="input-group-text"><i class="fa fa-percent"></i></span>                      
                      </div>
                      <input type="number" class="form-control input-lg editarPorcentaje" 
                        id="editarPorcentaje" name="editarPorcentaje"
                        min="0" value="40" required>                 
                    </div>
                  </div>                  
                </div>

            <!-- Foto del producto -->
            <div class="form-group">
              <div class="panel">Subir imagen</div>
              <input type="file" class="editarImagen" id="editarImagen" name="editarImagen">
              <p class="help-block">
                Peso m&aacute;ximo 2MB
              </p>
              <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizarEditada"
                id="previsualizarEditada" name="previsualizarEditada" width="100px">
                <input type="hidden" name="imagenActual" id="imagenActual">
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>        

      </form>

      <?php      
          $editarProducto = new ControladorProductos();
          $editarProducto->ctrEditarProducto();
      ?>


    </div>
  </div>
</div>

<?php

 $eliminarProducto = new ControladorProductos();
 $eliminarProducto->ctrEliminarProducto();
?>
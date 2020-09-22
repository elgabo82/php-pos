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
                <th style="width: 10px">#</th>
                <th>Categor&iacute;a</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

            <?php

              $item = null;
              $valor = null;

              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              //var_dump($categorias);

              foreach ($categorias as $key => $value) {
                echo '
                <tr>
                  <td>'.($key+1).'</td>
                  <td class="text-uppercase">'.$value["categoria"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarCategoria" 
                        idCategoria="'.$value["id"].'" data-toggle="modal" 
                        data-target="#modalEditarCategoria">
                      <i class="fas fa-edit"></i></button>
                      <button class="btn btn-danger 
                        btnEliminarCategoria"
                        idCategoria="'.$value["id"].'">
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

<!-- Ventana Modal - Agregar categorías -->
<div class="modal fade" id="modalAgregarCategoria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" >
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Agregar categor&iacute;a</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!--Nombre de categoría-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-th"></i></span>
                  <input type="text" class="form-control input-lg" placeholder="Nombre de categor&iacute;a" 
                    name="nuevaCategoria" id="nuevaCategoria" required>
                </div>                
              </div>
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary swalDefaultWarning">Guardar</button>
        </div>
      
        <?php       

          $crearCategoria = new ControladorCategorias();
          $crearCategoria->ctrCrearCategoria();

        ?>

      </form>
    </div>
  </div>
</div>


<!-- Ventana Modal - Editar categorías -->
<div class="modal fade" id="modalEditarCategoria" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" >
        <!-- Modal Header -->
        <div class="modal-header" style="background: #3c8dbc; color: white;">
          <h4 class="modal-title">Editar categor&iacute;a</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="card-body">
            <!--Nombre de categoría-->
            <div class="form-group">
              <div class="input-group">            
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-th"></i></span>
                  <input type="text" class="form-control input-lg" 
                    name="editarCategoria" id="editarCategoria" required>
                  <input type="hidden" name="idCategoria" id="idCategoria" required>
                </div>                
              </div>
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary swalDefaultWarning">Guardar cambios</button>
        </div>
        
        <?php
          $editarCategoria = new ControladorCategorias();
          $editarCategoria->ctrEditarCategoria();
        ?>       

      </form>
    </div>
  </div>
</div>

<?php          

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();

?>
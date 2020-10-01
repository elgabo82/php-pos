<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar ventas</h1>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <a href="crear-venta">
            <button class="btn btn-primary">
              Nueva venta
            </button>
          </a>
        </div>

        <div class="card-body">
        
          <table id="tabla" class="table table-bordered dt-responsive table-striped tabla">
            <thead>
              <tr>
                <th>#ID</th>
                <th>C&oacute;d. Factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de pago</th>
                <th>Valor de compra</th>
                <th>Total Pagado</th>
                <th>Fecha</th>      
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
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info"><i class="fas fa-print"></i></button>
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

</div>

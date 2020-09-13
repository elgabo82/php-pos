<!--<div class="content-wrapper">-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <!--<i class="far fa-user"></i>-->
          <i class="fas fa-user"></i>
          <!--<span class="badge badge-info navbar-badge">Usuario Administrador</span>-->
          <span class="badge">Usuario: <?php echo $_SESSION["usuario"]; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <?php 
              if ($_SESSION["foto"] != "") {
                echo '<img src="'.$_SESSION["foto"].'" alt="Avatar de Usuario" class="img-size-50 mr-3 img-circle">';
              }
              else {
                echo '<img src="vistas/img/usuarios/default/anonymous.png" alt="Avatar de Usuario" class="img-size-50 mr-3 img-circle">';
              }
              ?>              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <?php echo $_SESSION["nombre"]; ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <?php echo'<p class="text-sm">Perfil: '.$_SESSION["perfil"].'</p>'; ?>                
                <?php echo '<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$_SESSION["ultimo_login"].'</p>'; ?>
                <!--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>-->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="cerrar" class="dropdown-item dropdown-footer">Salir</a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- /.content -->
  <!--</div>-->
  <!-- /.content-wrapper -->
<div id="fondo"></div>
<div class="login-box">
    <div class="login-logo">    
        <a href="https://www.grupofmo.com" target="_blank">
            <img src="vistas/img/GrupoFMO-Nuevo.png"
                alt="GrupoFMO Logo"
                class="img-responsive"
                height="64px"
                style="padding: 30px 100px 0px 100px opacity: .8">  
            <!--<br><b>WebPOS</b> - GrupoFMO-->
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Reg&iacute;strese para iniciar sesi&oacute;n.</p>

        <form method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" 
                autocomplete="username" 
                name="idUsuario" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Clave" 
                autocomplete="current-password"
                name="passUsuario">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Recordarme
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
            </div>

            <?php
                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();

            ?>
        </form>

        <div class="social-auth-links text-center mb-3">
            <p>- O tambi&eacute;n puede -</p>
            <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Iniciar sesi&oacute;n usando Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Iniciar sesi&oacute;n usando Google+
            </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="forgot-password.html">He olvidado mi clave.</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Registrarme como nuevo usuario.</a>
        </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<div class="d-flex justify-content-center">
            <form class="p-5 bg-light" method="post">
                <h1>Iniciar Sesión</h1>
                <p style="font-size:15px">Para disfrutar de todas opciones disponibles inicie sesión</p>
                <div class="form-group">
                <label for="usuario">Usuario:</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                    <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="loginNombre" required>
                    
                
                
                </div>
    <!-- Label contraseña -->
    <div class="form-group">
        <label for="pwd">Contraseña:</label>
    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-unlock"></i></i></span>
    </div>
        <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="loginPwd" required>
       
    </div>
    </div>
    <!-- Fin Label contraseña -->
        <?php
            $login = new ControladorFormularios();
            $login -> crtLogin();           
        ?>
    <!-- Botones enviar y Volver -->
    <div>
    <a href="index.php?ruta=inicio"><button type="submit" class="btn btn-primary">Iniciar Sesión</button></a>
    </div>
    <div>
    <p style="font-size:15px">¿No tiene cuenta?  <a href="index.php?ruta=registro">Registrese</a></p>
    </div>
</form>



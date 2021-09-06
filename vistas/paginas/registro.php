<div class="d-flex justify-content-center">
            <form class="p-5 bg-light" method="post">
                <h1>Registrarse</h1>
                <div class="form-group">
                <label for="usuario">Usuario:</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                    <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="registroNombre" required>
                    <input type="hidden" id="usuario" name="rol" value="normal" required>
                
                
                </div>
    <!-- Label correo -->
    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <!-- Icono de correo -->
    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-envelope"></i></i></span>
    </div>
    <input type="email" class="form-control" placeholder="Correo electrónico" id="email" name="registroEmail" required>
    </div>
<!-- Fin Icono de correo -->
    </div>
    <!-- Fin Label correo -->

    <!-- Label contraseña -->
    <div class="form-group">
        <label for="pwd">Contraseña:</label>
    <div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-unlock"></i></i></span>
    </div>
        <input type="password" class="form-control" placeholder="Contraseña" id="pwd" name="registroPwd" required>
    </div>
    </div>
    <!-- Fin Label contraseña -->
    <?php
        //Se asegura de que está recibiendo prametros
        if(isset($_POST['registroNombre'])){

            //Si los recibe llama al metodo crtRegistro de la clase ControladorFormularios
            $registro = ControladorFormularios::ctrRegistro();
          
            //Si el metodo funciona muestra el mensaje de "El usuario ha sido registrado" y el botón "Aceptar"
            if ($registro){
 
                 echo '<script>
                 if (window.history.replaceState){
                     window.history.replaceState( null, null, window.location.href);
                 }
                 </script>';
                echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                echo '<a href="index.php?ruta=iniciarSesion"><button type="button" class="btn btn-primary">Aceptar</button></a>';
            //Si da error es porque ya hay un usuario con ese nombre y muestra el mensaje de error y el botón aceptar
            }else{
                
                echo '<div class="alert alert-danger">Este usuario ya está registrado. Pruebe con otro </div>';
                echo '<a href="index.php?ruta=registro"><button type="button" class="btn btn-primary">Aceptar</button></a>';
               
            }
        //Si aún no está recibiendo parametros muestra el botón "Registrarse" 
        }else{
            echo '<button type="submit" class="btn btn-primary">Registrarse</button>';
        }
    ?>
            <div>
    
    </div>
    <div>
    <p style="font-size:15px">¿Ya tiene una cuenta?  <a href="index.php?ruta=iniciarSesion">Inicie sesión</a></p>
    </div>
           

    <!-- Botones enviar y Volver -->
   
</form>

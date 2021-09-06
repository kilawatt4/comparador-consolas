<?php
//Si 
if(isset($_GET["id"])){

    $item = "id_consola";
    $valor = $_GET["id"];
   
    $respuesta = ConsolasControlador::ctrConsolas($item, $valor);
    $consolas = $respuesta->consola;
}
?>
<div class="d-flex justify-content-center">
            <form method="post">
                <h1>Editar <?php echo $consolas["nombre_consola"]?></h1>

                <div class="form-group">
                <img src="Imagenes_consolas/<?php echo $consolas["imagen_consola"]?>" style="width:200px;"/>
                <div class="input-group">
                
                <div class="input-group-prepend">
                
                </div>
               
                    <p><input type="file" class="form-control" placeholder="Imagen" alt="Imagen consola" id="imagen" name="actualizarImg" height="50%"></p>
                    
    
                
                </div>
                </div>
    <!-- Label correo -->
    <div class="form-group">
        <!-- Icono de correo -->
    <div class="input-group">
    <div class="input-group-prepend">
        
    </div>
    <input type="text" class="form-control" placeholder="Nombre de la consola" value="<?php echo  $consolas["nombre_consola"]; ?>" id="nombre" name="actualizarNombre" required>
    <input type="hidden" value="<?php echo  $consolas["id_consola"]; ?>" name="id_consola">
    </div>
<!-- Fin Icono de correo -->
    </div>
    <!-- Fin Label correo -->

    <!-- Label contraseña -->
    <div class="form-group">
        <!-- Icono de correo -->
    <div class="input-group">
    <div class="input-group-prepend">
        
    </div>
    <textarea name="actualizarEspecificaciones" id="espec" cols="30" rows="5" type="text" class="form-control" placeholder="Especificaciones" required><?php echo  $consolas["especificaciones"]; ?></textarea><br><br>
<!--     <input type="text" class="form-control" placeholder="Especificaciones" value="<?php echo  $consolas["especificaciones"]; ?>" id="espec" name="actualizarEspecificaciones" required>
 -->    </div>
    <!-- Fin Label contraseña -->
    </div>
        <?php

            $actualizarConsola = ConsolasControlador::ctrActualizar();

            if ($actualizarConsola=="ok"){
                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState( null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success">Guardando datos espere un momento...</div>
                
                <script>
                    setTimeout(function(){

                        window.location = "index.php?ruta=inicio";
                    },2000);

                </script>
                ';
}

        ?>
    <!-- Botones enviar y Volver -->
    <button type="submit" class="btn btn-primary">Guardar datos</button>
    <a href="index.php?ruta=inicio" style="margin: 28px"><button type="button" class="btn btn-primary">Volver a la página principal</button></a>
                
</form>
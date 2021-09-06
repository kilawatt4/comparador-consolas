<?php
$default = false;

if (isset($_GET["id"]) && !empty($_GET["id"])){
    $item = "id_consola";
    $valor = $_GET["id"];
   
    $respuesta = ConsolasControlador::ctrConsolas($item, $valor);
    $default = $respuesta->consola;

    //Recuperar precios de la consola
 
    /* $respuesta = ConsolasControlador::ctrConsolas($item, $valor);
    $tienda = $respuesta->tienda; */
    
}

?>
<div class="d-flex justify-content-center">
            <form class="p-5 bg-light" method="post">
                <h1>Añadir consola</h1>
    <input type="hidden" name="idConsola" value="<?php echo (!empty($default))? $default['id_consola']: ""; ?>">
                <!--Insertar imagen-->
    <div class="form-group">
    <label for="imagen">Imagen de la consola:</label>
        <div class="input-group">
            <input type="file" class="form-control" placeholder="Imagen"  id="imagen" name="insertarImg" required>
            <!-- <input type = "hidden" class="form-control" name="id_consola"> -->
        </div>
    </div>

    <!-- Insertar nombre -->
    <div class="form-group">
    <label for="nombre">Nombre de la consola:</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nombre de la consola" id="nombre" name="insertarNombre" value="<?php echo (!empty($default))? $default['nombre_consola']: ""; ?>" required>
        </div>
    </div>
   
    <!-- insertar especificaciones   -->
    <div class="form-group">
    <label for="espec">Especificaciones de la consola:</label>
        <div class="input-group">
            <textarea name="insertarEspecificaciones" id="espec" cols="30" rows="2" type="text" class="form-control" placeholder="Especificaciones" value="<?php echo (!empty($default))? $default['especificaciones']: ""; ?>" required></textarea><br><br>
        </div>
    </div>
    <div class="form-group">
    <label for="precio1">Precio de la consola en Fnac:</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Precio Fnac" id="precio1" name="precio[]" value="<?php echo (!empty($default))? $default['precio']: ""; ?>" >
            <input type="hidden" class="form-control" value="1" name="id[]">
        </div>
    </div>

           <!-- Precio de Game -->
    <div class="form-group">
    <label for="precio2">Precio de la consola en Game:</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Precio Game" id="precio2" name="precio[]"  value="<?php echo (!empty($default))? $default['precio']: ""; ?>" >
            <input type="hidden" class="form-control" value="2" name="id[]">
            
        </div>
    </div>

    <!-- Precio de Worten -->
    <div class="form-group">
    <label for="precio3">Precio de la consola en Worten:</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Precio Worten" id="precio3" name="precio[]"  value="<?php echo (!empty($default))? $default['precio']: ""; ?>" >
            <input type="hidden" class="form-control" value="3" name="id[]">
            
        </div>
    </div>

    <!-- Precio de Media Marck -->
    <div class="form-group">
    <label for="precio4">Precio de la consola en Media Markt:</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Precio Media Markt" id="precio4" name="precio[]"  value="<?php echo (!empty($default))? $default['precio']: ""; ?>">
            <input type="hidden" class="form-control" value="4" name="id[]">
            
        </div>
    </div>
    
        <?php
//Si recibe post de nombre de la consola:
if(isset($_POST['insertarNombre'])){


        /* if(!empty($default)){
            //Update de consola
           
            //Borrar precios de la consola
            $idConsola = $default['id_consola'];
        }else{
            $idConsola = ConsolasControlador::ctrInsertar();
        } */
        
        //Llamaba al metodo ctrInsertar
        $idConsola = ConsolasControlador::ctrInsertar();
            //Si el metodo ejecuta
            if ($idConsola){
                //tiendas y precios reciben su post
                $tiendas = $_POST['id'];
                $precios = $_POST['precio'];

                //Para cada precio
                foreach($precios as $k=>$p){
                    //Si hay algun precio escrito
                    if(!empty($p)){
                        //Insertalo en la consola y la tienda correspondiente 
                        ModeloConsola::mdlInsertarPrecio(array(
                            'consola'=>$idConsola,
                            'tienda'=>$tiendas[$k],
                            'precio'=>$p
                        ));
                    }

                }
                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState( null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success">Añadiendo consola espere un momento...</div>';
                ?>
                <script>
                    setTimeout(function(){
                        window.location = "index.php?ruta=inicio";
                    },2000);

                </script>
                <?php
}else{
    echo '<div class="alert alert-danger">Error añadiendo la consola</div>';
}
}

        ?>
    <!-- Botones enviar y Volver -->
    <button type="submit" class="btn btn-primary">Añadir consola</button>
    <a href="index.php?ruta=inicio" style="margin: 28px"><button type="button" class="btn btn-primary">Volver a la página principal</button></a>
                
</form>
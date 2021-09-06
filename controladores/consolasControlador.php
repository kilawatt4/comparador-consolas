<?php
Class ConsolasControlador{
    //Metodo mostrar consolas
    //Recibe item y valor como parametros
    static public function ctrConsolas($item, $valor){
        $nombre_tabla = "consola";
        $nombre_otra_tabla = "tiendas";
        //Segun los parametros que se requieran se ejecutara un modelo u otro 
        $respuesta = new stdClass();
        $respuesta->tienda=ModeloConsola::mdlTienda($nombre_otra_tabla, $valor);
        $respuesta->consola = ModeloConsola::mdlConsola($nombre_tabla,$nombre_otra_tabla,$item, $valor);
        
        //Se devuelve la respuesta sea cual sea el modelo usado
        return $respuesta;
    }
    // metodo Modificar  
    static public function ctrActualizar(){
        //Si recibe un post
        if(isset($_POST["actualizarNombre"])){
            $nombre_tabla = "consola";
            //Array con las columnas de la tabla asociandolas con el post correspondiente
            $datos = array("id_consola" => $_POST["id_consola"],
        "nombre_consola" => $_POST["actualizarNombre"],
       "imagen_consola" => $_POST["actualizarImg"],
       "especificaciones" => $_POST["actualizarEspecificaciones"]);
            //Llamada al metodo mdlActualizar
            $respuesta = ModeloConsola::mdlActualizar($datos);
            return $respuesta;
            
        }
    }
    //Metodo para eliminar
    public function ctrEliminar(){
        //Si se recibe el post eliminar:
        if(isset($_POST["eliminar"])){
            $nombre_tabla = "consola";
            $otra_tabla = "tienda";
            $valor = $_POST["eliminar"];
            //Se llama al modelo eliminar
            $respuesta = ModeloConsola::mdlEliminar($nombre_tabla,$otra_tabla, $valor );
            //Si la respuesta es "ok" la página se recarga y si no es "ok" no hace nada
            if($respuesta == "ok"){
                echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState( null, null, window.location.href);
                }

                window.location = "index.php?ruta=inicio";
                </script>';
              
            }
        }
    }
    //Metodo de añadir consola
    static public function ctrInsertar(){
        if(isset($_POST["insertarImg"])){
            //Si recibes un post de insertar imagen
            //Crea un array que relaciona las columnas de las tablas con su post corresponiente
        $datos = array("imagen_consola" => $_POST["insertarImg"],
                       "nombre_consola" => $_POST["insertarNombre"],
                       "especificaciones" => $_POST["insertarEspecificaciones"]);
            //Llama al modelo insertar
    $respuesta = ModeloConsola::mdlInsertar($datos);
    //Devuelve una respuesta
    return $respuesta;
                    }
                }

    static public function ctrInsertarPrecio(){
        if(isset($_POST["precio_fnac"])){
        $datosfnac = array( "fk_consola" => $_POST["id_consola"],
                        "precio" => $_POST["insertarPrecioFnac"],
                        "logo" => $_POST["fnac_logo"],
                        "nombre" => $_POST["fnac"]);

        $respuesta = ModeloConsola::mdlInsertarPrecioFnac($datosfnac);
        return $respuesta;
     
    
                    }
                }

}


?>
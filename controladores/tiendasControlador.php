<?php
Class TiendasControlador{
    static public function ctrTiendas(){
        $respuesta = ModeloTienda::mdlTienda();

        return $respuesta;
    }
}

?>
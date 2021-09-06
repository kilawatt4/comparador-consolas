<?php
require_once "conexion.php";

Class ModeloTienda{
    
    static public function mdlTienda(){
       
            $stm = Conexion::conectar()->prepare("SELECT * FROM tiendas");

            if($stm -> execute()){
                return $stm -> fetchAll();
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            
        
        

        $stm -> close();
        $stm = null;
    }
}


?>
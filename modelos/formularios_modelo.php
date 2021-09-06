<?php

require_once "conexion.php";

Class ModeloFormularios{
    //Metodo para realizar el registro en la base de datos
    static public function mdlRegistro($tabla, $datos){

        //Sentencia sql para la insercion de datos a la tabla

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, correo, password, rol) VALUES 
                                            (:usuario, :correo, :password, :rol)");

        //Relaciona las columnas de la tabla con los post introducidos
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);

        //Comprobar que ejecuta 
            if($stmt -> execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());   
        }
    }
    static public function mdlCoincidencia($tabla, $datos){

        //Sentencia sql para la insercion de datos a la tabla

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        //Comprobar que ejecuta 

       
                if($stmt -> execute()){
                $resultado = $stmt -> fetch();
                return empty($resultado);    
            }else{
                return "coincidencia";
            }
        
     
        
    }

    //Método para seleccionar el registro de la base de datos y compara el valor introducido en el post de login con lo que hay en la base de datos
    static public function mdlLogin($usuario, $password){ 
        //Sentencia sql para recoger los datos de la tabla
            $stmt = Conexion::conectar() -> prepare("SELECT * FROM registros WHERE usuario = :usuario AND password = :password");
            //Relaciona las columnas de la tabla con los post introducidos
            $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", $password, PDO::PARAM_STR);
           
            if($stmt -> execute()){
                return $stmt -> fetch();
           }else{
               print_r(Conexion::conectar()->errorInfo());
           }
    }
    
    static public function mdlGetID($id){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM registros WHERE id= :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if($stmt -> execute()){
               
            return $stmt -> fetch();
       }else{
           print_r(Conexion::conectar()->errorInfo());
       }
       
    }
    static public function mdlGetRol($rol){
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM registros WHERE rol= :rol");
        $stmt->bindParam(":rol", $rol, PDO::PARAM_STR);
        if($stmt -> execute()){
               
            return $stmt -> fetch();
       }else{
           print_r(Conexion::conectar()->errorInfo());
       }
       
    }


}
?>
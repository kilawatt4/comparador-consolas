<?php
require_once "conexion.php";

Class ModeloConsola{
    //Metodo del mostrar consolas
    static public function mdlConsola($nombre_tabla,$nombre_otra_tabla, $item, $valor){
        if($item == null && $valor == null){
            ///Si no requiere el parametro item y el valor se devielven todos los elementos de la tabla
            $stm = Conexion::conectar()->prepare("SELECT * FROM $nombre_tabla");

            $stm -> execute();
            return $stm -> fetchAll();
        }else{
            //Si requieren de esos parametros se devolverá una consola en especifico
            $stm = Conexion::conectar()->prepare("SELECT * FROM $nombre_tabla  WHERE $item = :valor ");
            
            $stm->bindParam(":valor", $valor,PDO::PARAM_INT);
            $stm->execute();
            return $stm -> fetch();
        }
        

        $stm -> close();
        $stm = null;
    }

    //Metodo que devuelve las tiendas
    static public function mdlTienda($nombre_otra_tabla, $valor){
        //Sentancia sql que une la tabla precios y la tabla tiendas segun una id
        $stm = Conexion::conectar()->prepare("SELECT * FROM precios as p JOIN tiendas as t WHERE p.tienda=t.id_tiendas AND p.consola=:valor");
       
//Relaciona la columna de la tabla con el post introducido
        $stm->bindParam(":valor", $valor,PDO::PARAM_INT);

        $stm->execute();
            
            return $stm -> fetchAll();

    }


    //Metodo para editar la consola
    static public function mdlActualizar($datos){
        //Si el post de la imagen no recibe parametros
        if(($datos["imagen_consola"]!="")){
            //Consulta sql para modificar los datos introducidos sin la imagen
        $stmt = Conexion::conectar()->prepare("UPDATE consola SET nombre_consola=:nombre_consola,imagen_consola=:imagen_consola, especificaciones=:especificaciones WHERE id_consola = :id_consola");

            //Relaciona las columnas de la tabla con los post introducidos
            $stmt->bindParam(":nombre_consola", $datos["nombre_consola"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_consola", $datos["imagen_consola"], PDO::PARAM_STR);
            $stmt->bindParam(":especificaciones", $datos["especificaciones"], PDO::PARAM_STR);
            $stmt->bindParam(":id_consola", $datos["id_consola"], PDO::PARAM_INT);

            //Comprobar que ejecuta 
            if($stmt->execute()){

            return "ok";

            }else{

            print_r(Conexion::conectar()->errorInfo());

            }
            $stmt->close();
            $stmt = null;
        }else{
            //Si el parametro imagen está relleno tambien actualiza todos los parametros incluido la imagen
            $stmt = Conexion::conectar()->prepare("UPDATE consola SET nombre_consola=:nombre_consola, especificaciones=:especificaciones WHERE id_consola = :id_consola");

    
            $stmt->bindParam(":nombre_consola", $datos["nombre_consola"], PDO::PARAM_STR);
            $stmt->bindParam(":especificaciones", $datos["especificaciones"], PDO::PARAM_STR);
            $stmt->bindParam(":id_consola", $datos["id_consola"], PDO::PARAM_INT);

            //Comprobar que ejecuta 
            if($stmt->execute()){

            return "ok";

            }else{

            print_r(Conexion::conectar()->errorInfo());

            }
            $stmt->close();
            $stmt = null;
            }
        }
        //Metodo eliminar
    static public function mdlEliminar($tabla,$otra_tabla, $valor){
        //sentencia sql para eliminar un elemento en especifico
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_consola=:id_consola");
    //Relaciona la columna de la tabla con el post introducido
            $stmt->bindParam(":id_consola", $valor, PDO::PARAM_INT);

            //Comprobar que ejecuta 
            if($stmt->execute()){
            return "ok";
            }else{
            print_r(Conexion::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt = null;
    }
    //Metodo insertar
    static public function mdlInsertar($datos){
        $dbh = Conexion::conectar();
        //Sentencia sql para insertar datos a una tabla
        $stmt = $dbh->prepare("INSERT INTO consola (nombre_consola, imagen_consola, especificaciones) VALUES (:nombre, :imagen, :especificaciones)"); 
        //Relaciona las columnas de la tabla con los post introducidos
       $stmt->bindParam(":nombre", $datos["nombre_consola"], PDO::PARAM_STR);
       $stmt->bindParam(":imagen", $datos["imagen_consola"], PDO::PARAM_STR);
       $stmt->bindParam(":especificaciones", $datos["especificaciones"], PDO::PARAM_STR);
       
       if ($stmt->execute()){
           //Devuelve el ultimo id insertado en la tabla
           return $dbh->lastInsertId();
       }

    }

       


   }

            
    




?>
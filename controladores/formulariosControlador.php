<?php
Class ControladorFormularios{
    //Metodo de registro
    static public function ctrRegistro(){
        
        if(isset($_POST["registroNombre"])){
            //Si recibe un post del nombre de usuario
            $nombre_tabla = "registros";
            //Array con los nombres de las tablas y con el POST que les corresponde
            $datos = array("usuario" => $_POST["registroNombre"],
                           "correo" => $_POST["registroEmail"],
                           "password" => $_POST["registroPwd"],
                            "rol" => $_POST["rol"]);

            
            if(ModeloFormularios::mdlCoincidencia($nombre_tabla, $datos)){
                //Si el metodo mdlCoincidencia ejecuta:
                ModeloFormularios::mdlRegistro($nombre_tabla, $datos);
                //Devuelve verdadero
                return true;
            }else{
                //Si no: devuelve falso
                return false;
            }
        }
    }

    //Metodo de login
    public function crtLogin(){
        //Si encuentra los post introducidos
        if(isset($_POST["loginNombre"]) && isset($_POST["loginPwd"])){
            //Llama al metodo mdlLogin
            $respuesta = ModeloFormularios::mdlLogin($_POST["loginNombre"], $_POST["loginPwd"]);
                //Si devuelve algo llama a la sesion y recoge el id del usuario, además de que redirige a inicio
                if( !empty($respuesta)){
                    $_SESSION["id"] = $respuesta["id"];
                    
                    echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState( null, null, window.location.href);
                    }
                    window.location = "index.php?ruta=inicio";
                    </script>';
                    //Si no es que los datos introducidos no se encuentran en la base de datos
                 }else{
            
                    echo '<script>
                    if (window.history.replaceState){
                        window.history.replaceState( null, null, window.location.href);
                    }
                    </script>';
                    echo '<div class="alert alert-danger">Usuario o contraseña incorrectos</div>';
        }  
    }
}
    public function ctrGetId(){
        $tabla = "registros";
        $respuesta=ModeloFormularios::mdlGetUser($tabla, $datos);
    }
}
?>
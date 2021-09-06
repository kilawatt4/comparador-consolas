<?php
session_start();
$user = null;
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    $user = ModeloFormularios::mdlGetID($_SESSION["id"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Comparador de Precios</title>
    <!-- Mi CSS -->
    <link rel="stylesheet" href="estilos/estilos.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Latest compiled FontAwesome -->
<script src="https://kit.fontawesome.com/f97ae15858.js" crossorigin="anonymous"></script>


</head>
<body>
<div style="background-color:#fgfg">

<div>
<h1 style="text-align: center;">Tu comparador de Consolas Online :)</h1>
</div>
    <!--===============================
    Botones de abrir cerrar sesion y registrarse
    ==================================-->
    <div class="container-fluid bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-sm bg-light py-2 mx-5 nav-pills">
            <ul class="navbar-nav">
            <?php
                
                    if(isset($_GET["ruta"])){ ?>
                        <?php if(empty($user)){ ?> 
                        <?php  if($_GET["ruta"] == "iniciarSesion"){ ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?ruta=iniciarSesion"><i class="far fa-user-circle"></i></a>
                            </li>
                        <?php }else{  ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?ruta=iniciarSesion"><i class="far fa-user-circle"></i></a>
                            </li>
                        <?php } ?> 
                        <?php } ?> 
                        <?php  if($_GET["ruta"] == "inicio"){ ?>

                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?ruta=inicio">Página principal</a>
                            </li>
                        <?php }else{  ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?ruta=inicio">Página principal</a>
                            </li>
                        <?php } ?>
                        <?php if(!empty($user)){ ?> 
                        <?php  if($_GET["ruta"] == "cerrarSesion"){ ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?ruta=cerrarSesion">Cerrar sesión</a>
                            </li>
                        <?php }else{  ?> 
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?ruta=cerrarSesion">Cerrar sesión</a>
                            </li>
                        <?php } ?> 
                        <?php } ?>
                    <?php }else{ ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ruta=iniciarSesion"><i class="far fa-user-circle"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?ruta=inicio">Página principal</a>
                        </li>
                        <?php if(!empty($user)){ ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?ruta=cerrarSesion">Cerrar sesión</a>
                        </li>
                        <?php } ?> 
                       
                    <?php } ?> 


            
                
            </ul>
                        </nav>
        </div>
    </div>
    </div>
        <!--===============================
    Contenido
    ==================================-->
    <div class="container-fluid">
        <div class ="container py-5">

            <?php

                if(isset($_GET["ruta"])){
                    if($_GET["ruta"] == "registro" ||
                       $_GET["ruta"] == "iniciarSesion" ||
                       $_GET["ruta"] == "inicio" ||
                       $_GET["ruta"] == "inicioAdmin" ||
                       $_GET["ruta"] == "cerrarSesion"||
                       $_GET["ruta"] == "editar"||
                       $_GET["ruta"] == "insertar"||
                       $_GET["ruta"] == "insertarPrecio"||
                       $_GET["ruta"] == "especificaciones"){
                        include "paginas/".$_GET["ruta"].".php";
                       }else{
                            include "paginas/error404.php";
                       }
                }else{
                    include "paginas/inicio.php";
                }
                
            ?>
        </div>
    </div>
    
</body>
</html>
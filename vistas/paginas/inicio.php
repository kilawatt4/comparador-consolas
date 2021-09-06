<?php

$respuesta = ConsolasControlador::ctrConsolas(null, null);
 $consolas = $respuesta->consola;

 if(isset($_GET["loginNombre"])){    
    $item = "id_registros";
    $valor = $_GET["loginNombre"];
   

    }

?>
<!-- Pregunta si hay algun usuario logeado y si el usuario logeado es "Alex" (el administrador) -->
     <?php if((!empty($user))&&($user['usuario'] == "Alex")){ ?>
     <!-- Muestro mensaje -->
        <p>PANEL DE ADMINISTRADOR</p>


        <!--Hago un foreach para recorrer el contenido de la base de datos ya que quiero mostrar todos los datos-->
        <?php foreach ($consolas as $key => $value): ?>
        
        <div class="bloque">
        
        <!-- Muestro imagen -->
           <img style="width: 80%"  src="Imagenes_consolas/<?php echo $value["imagen_consola"];?>" alt="imagen">
           
        <!-- Muestro nombre de la consola -->
            <p><a href="index.php?ruta=especificaciones&id_consola=<?php echo $value["id_consola"]?>"><?php echo $value["nombre_consola"];?></a></p>
            <div class="btn-group">
                    <!-- Icono de editar -->
                    <div class="px-1">
                        <a class="btn btn-warning" href="index.php?ruta=editar&id=<?php echo $value["id_consola"]?>"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <!-- Icono de eliminar -->
                    <form method="post">
                        <input type="hidden" value="<?php echo $value["id_consola"]?>" name="eliminar">
                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
        
                        <?php
                            //Metodo de eliminar
                            $eliminar = new ConsolasControlador();
                            $eliminar->ctrEliminar();
        
                        ?>
        
        
                    </form>
            </div> 
        </div>
        
        <?php endforeach ?>
        <div>
        <a href="index.php?ruta=insertar"><button type="button" class="btn btn-primary">Añadir consola</button></a>
        </div>
        <!-- un style para el div -->
        
        <style>
        .bloque {
         width:33%;
         display: inline-block;
         font-size: 30px;
          padding:40px;
        }
        
        </style>
    <?php }else{ ?>
    <!-- Pregunta si el usuario está logeado o no -->
<?php if(!empty($user)){ ?>
<!-- Si lo está... -->
<!-- Muestro el nombre del usuario -->
<p>Buenas <?php echo $user['usuario'] ?></p>

<!--Hago un foreach para recorrer el contenido de la base de datos ya que quiero mostrar todos los datos-->
<?php foreach ($consolas as $key => $value): ?>

<div class="bloque">

<!-- Muestro imagen -->
   <img style="width: 80%"  src="Imagenes_consolas/<?php echo $value["imagen_consola"];?>" alt="imagen">
   
<!-- Muestro nombre de la consola -->
    <p><a href="index.php?ruta=especificaciones&id_consola=<?php echo $value["id_consola"]?>"><?php echo $value["nombre_consola"];?></a></p>
    
</div>

<?php endforeach ?>

<!-- un style para el div -->

<style>
.bloque {
 width:33%;
 display: inline-block;
 font-size: 30px;
  padding:40px;
}

</style>

<?php }else{ ?>
    <?php if(empty($user)){ ?>

<!--Hago un foreach para recorrer el contenido de la base de datos ya que quiero mostrar todos los datos-->
<?php foreach ($consolas as $key => $value): ?>

<div class="bloque">

<!-- Muestro imagen -->
   <img style="width: 80%"  src="Imagenes_consolas/<?php echo $value["imagen_consola"];?>" alt="imagen">
   
<!-- Muestro nombre de la consola -->
    <p><a href="index.php?ruta=especificaciones&id_consola=<?php echo $value["id_consola"]?>"><?php echo $value["nombre_consola"];?></a></p>
    
   
    
    
</div>

<?php endforeach ?>


<!-- un style para el div -->

<style>
.bloque {
 width:33%;
 display: inline-block;
 font-size: 30px;
  padding:40px;
}

</style>

        <?php } ?>    
    <?php } ?> 
<?php } ?>

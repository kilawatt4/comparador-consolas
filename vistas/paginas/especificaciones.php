<?php
//Si 
if(isset($_GET["id_consola"])){

    $item = "id_consola";
    $valor = $_GET["id_consola"];
   
    $respuesta = ConsolasControlador::ctrConsolas($item, $valor);
    $consolas = $respuesta->consola;
    $tienda = $respuesta->tienda;

}



?>

<div class="bloque">
<!--Lado izquierdo-->
<div class="bloque_izquierdo">
  
<img style="width: 70%;" class="zoom"  src="Imagenes_consolas/<?php echo $consolas["imagen_consola"];?>" alt="imagen"><br><br><br><br>
<?php if(!empty($user)){ ?>
<?php foreach ($tienda  as $valor_tienda){ ?>
  
<p><a href="<?php echo $valor_tienda["url"];?>" target="_blank"><img style="width: 20%" src="Imagenes_consolas/<?php echo $valor_tienda["logo"];?>"><a><?php echo $valor_tienda["nombre"];?>: <?php echo $valor_tienda["precio"];?>€</p>

<?php   }  ?>
<p style="font-size:13px"><i>Haga click en el logo de cada empresa para ir a su web</i></p>
<?php }else{ ?>

<a href="index.php?ruta=iniciarSesion" style="margin: 28px"><button type="button" class="btn btn-primary">Inicie sesión para poder ver los precios</button></a>

<?php  }?>

</div>


<!--Lado derecho-->
<div class="bloque_derecho">

<p><?php echo $consolas["nombre_consola"];?>:</p>
<p><?php echo $consolas["especificaciones"];?></p>


</div>
<div class="botones">
<?php if(!empty($user)){ ?>
    <a href="index.php?ruta=inicio" style="margin: 28px"><button type="button" class="btn btn-primary">Volver a la página principal</button></a>
<?php } ?>
</div>
</div>

<style>
 .bloque_ {
 width:100%;
 display: inline-block;
 font-size: 30px;

  padding:30px;

}
.bloque_derecho {
 width:50%;
 display: inline-block;
 font-size: 30px;
float: right;
  padding:30px;
}
.bloque_izquierdo{
    width:50%;
 display: inline-block;
 font-size: 30px;
float: left;
  padding:30px;
}
.botones{
    display: inline-flex;
    width:100%;
}
.zoom{
  transition:transform .5s;
}
.zoom:hover{
  transform: scale(1.5);
}
</style>
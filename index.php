<?php

require_once "controladores/plantilla_controlador.php";
require_once "controladores/formulariosControlador.php";
require_once "modelos/formularios_modelo.php";
require_once "modelos/modeloConsolas.php";
require_once "modelos/modeloTienda.php";
require_once "controladores/consolasControlador.php";
require_once "controladores/tiendasControlador.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();
?>
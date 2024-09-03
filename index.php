<?php  

//controllers
require_once 'controllers/controladorViews.php';
require_once 'controllers/controladorUsuario.php';
require_once 'controllers/controladorInformacionBasica.php';
require_once 'controllers/controladorNosotros.php';
require_once 'controllers/controladorServicio.php';
//Modelo
require_once 'models/conexion.php';
require_once 'models/modeloViews.php';
require_once 'models/modeloUsuario.php';
require_once 'models/modeloInformacionBasica.php';
require_once 'models/modeloNosotros.php';
require_once 'models/modeloServicio.php';
//fpdf


$assets = new controladorViews();
$assets->cargarTemplate();
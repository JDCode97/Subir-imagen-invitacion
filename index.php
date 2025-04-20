<?php  
require_once 'app/config/config.php';
require_once 'app/config/Conexion.php';
require_once 'app/controlador/ControlSesion.php';

Conexion::abrirConexion();

if(ControlSesion::verificarSesion() || (isset($_GET['link']) && $_GET['link'] == 'salon')){//Si la sesion existe
	if(isset($_GET['link']) && file_exists('vistas/' . strtolower($_GET['link']) . '.php')){
		require_once 'vistas/' . strtolower($_GET['link']) . '.php';
	}
	else{
		//require_once 'vistas/panel.php';
		require_once 'vistas/panel.php';
	}
}else{
	require_once 'vistas/indexView.php';
}



?>

<?php  
require_once 'app/controlador/ControlSesion.php';

ControlSesion::cerrarSesion();
header("Location: " . SERVIDOR);
die();
?>
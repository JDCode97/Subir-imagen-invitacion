<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<?php  
		if(!isset($titulo) || empty($titulo)){
			$titulo = "Subir imagenes";
		}
		echo "<title>$titulo</title>";
		?>
		<!-- <link rel="icon" href="vistas/img/ico-logo.png" sizes="32x32" /> -->
				
		<!-- <link rel="stylesheet" href="vistas/css/estilos.css"> -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
	
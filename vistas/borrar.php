<?php

if(!isset($_GET['id'])){
	header('Location: ' .RUTA_IR. 'panel');
}

require_once 'app/controlador/UsuarioControlador.php';
require_once 'app/controlador/ImagenControlador.php';

$i = ImagenControlador::obtenerDatos($_GET['id']);

if($i == false){
	header('Location: ' .RUTA_IR. 'panel');
}else{
	if($_SESSION['admin'] == 0){
		if($i->id_usuario != $_SESSION['id_usuario']){
			header('Location: ' .RUTA_IR. 'panel');
		}

	}
}

$titulo = "Borrar Imagen"; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';

if($i->subcarpeta == 'imagenes'){
	$carpeta = "imagenes";
}
if($i->subcarpeta == 'invitaciones'){
	$carpeta = "invitaciones";
}
if($i->carpeta == 'imagenes' && $i->subcarpeta == 'imagenes'){
	$carpeta = "admin";
}

if(isset($_POST['enviar'])){
	ImagenControlador::eliminarImagen($_GET['id'], $carpeta);
}
?>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<h1 class="text-center">Borrar Imagen</h1>
		<br>

		<form action="" method="POST">
			
			<div class="alert alert-danger text-center" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  ¿Esta seguro de borrar esta imagen?
			</div>
			<div class="row">
			<div class="col-md-2">
				<button class="btn btn-lg btn-primary" type="submit" name="enviar" >Eliminar</button>
		
			</div>
			<div class="col-md-2">
				<a href="<?php echo RUTA_IR ?>misimagenes">
			<button class='btn btn-lg btn-danger' name='cancelar' type="button"><i class='fas fa-trash'></i> Volver</button>
		</a>
			</div>
			<div class="col-md-8"></div>
		</div>
		</form>
	</div>
	<div class="col-md-1"></div>
</div>


<?php require_once 'vistas/plantillas/footer.inc.php';?>
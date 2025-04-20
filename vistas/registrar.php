<?php 
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}


$titulo = "Registrar Usuario"; 
?>
<?php 
require_once 'app/controlador/UsuarioControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php
require_once 'vistas/plantillas/header2.inc.php'; 
require_once 'vistas/plantillas/menu.inc.php';

if(isset($_POST['enviar'])){
	UsuarioControlador::insertar($_POST['usuario'], $_POST['clave'], $_POST['clave-2']);
}

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h1 class="text-center">Registrar Usuario</h1>
	<form role="form" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="usuasrio">Usuario</label>
			<input type="text" class="form-control" id="usuario" name="usuario" required>
		</div>
		<div class="form-group">
			<label for="clave">Contraseña</label>
			<input type="password" class="form-control" id="clave" name="clave" required>
		</div>
		<div class="form-group">
			<label for="clave-2">Repetir Contraseña</label>
			<input type="password" class="form-control" id="clave-2" name="clave-2" required>
		</div>
		<button class="btn btn-lg btn-primary" type="submit" name="enviar" >Enviar</button>
	</form>
	</div>
	<div class="col-md-2"></div>
</div>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
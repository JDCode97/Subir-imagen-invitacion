<?php 
$titulo = "Cambiar Clave"; ?>
<?php 
require_once 'app/controlador/UsuarioControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php
require_once 'vistas/plantillas/header2.inc.php'; 
require_once 'vistas/plantillas/menu.inc.php';

if(isset($_POST['enviar'])){
	UsuarioControlador::cambiarClave($_POST['clave'], $_POST['clave-1'], $_POST['clave-2'], $_SESSION['id_usuario']);
}

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h1 class="text-center">Cambiar Clave</h1>
	<form role="form" method="POST">
		<div class="form-group">
	  			<b><label for="password">Contraseña</label></b>
	  			<input type="password" class="form-control" name="clave" id="clave-1" placeholder="Contraseña" required>
	  	</div>
	  	<div class="form-group">
	  			<b><label for="password">Repetir Contraseña</label></b>
	  			<input type="password" class="form-control" name="clave-1" id="clave-1" placeholder="Contraseña" required>
	  	</div>
	  	<div class="form-group">
	  			<b><label for="password2">Repertir Nueva Contraseña</label></b>
	  			<input type="password" class="form-control" name="clave-2" id="clave-2" placeholder="Repetir Contraseña" required>
	  	</div>
	  	<br>
		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-lg btn-primary" type="submit" name="enviar" >Editar</button>
		
			</div>
			<div class="col-md-2">
				<a href="<?php echo RUTA_IR ?>panel">
			<button class='btn btn-lg btn-danger' name='editar' type="button"><i class='fas fa-trash'></i> Volver</button>
		</a>
			</div>
			<div class="col-md-8"></div>
		</div>
	</form>
	</div>
	<div class="col-md-2"></div>
</div>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
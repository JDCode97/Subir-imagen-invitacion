<?php 
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}



if(!isset($_GET['id'])){
	header('Location: ' .RUTA_IR. 'panel');
}

$titulo = "Editar Usuario"; ?>
<?php 
require_once 'app/controlador/UsuarioControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php
require_once 'vistas/plantillas/header2.inc.php'; 
require_once 'vistas/plantillas/menu.inc.php';

if(UsuarioControlador::obtenerDatos($_GET['id']) != ""){
	$usuario = UsuarioControlador::obtenerDatos($_GET['id']);
}else{
	header('Location: ' .RUTA_IR.'panel');
}

if(isset($_POST['enviar'])){
	UsuarioControlador::editar($_POST['usuario'], $_POST['salon'], $_POST['clave-1'], $_POST['clave-2'], $_POST['editar-clave'], $_GET['id']);
}

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h1 class="text-center">Editar Usuario</h1>
	<form role="form" method="POST">
		<div class="form-group">
			<label for="usuario">Usuario</label>
			<input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario->usuario;?>" required>
		</div>
		<div class="form-group">
			<label for="salon">Salón</label>
			<input type="text" class="form-control" id="salon" name="salon" value="<?php echo $usuario->salon;?>" required>
		</div>
		<div class="form-group">
	  		<b>¿Deseas editar la contraseña? </b><br><br>
			<label class="fancy-radio">
				<input name="editar-clave" value="1" type="radio" id="clave-si" >
				<span><i></i><b>Si</b></span>
			</label>
			<label class="fancy-radio">
				<input name="editar-clave" value="0" type="radio" id="clave-no" checked>
				<span><i></i><b>No</b></span>
			</label>
		</div>
		<div class="form-group">
	  			<b><label for="password">Nueva Contraseña</label></b>
	  			<input type="password" class="form-control" name="clave-1" id="clave-1" placeholder="Contraseña">
	  	</div>
	  	<div class="form-group">
	  			<b><label for="password2">Repertir Nueva Contraseña</label></b>
	  			<input type="password" class="form-control" name="clave-2" id="clave-2" placeholder="Repetir Contraseña">
	  	</div>
	  	<br>
		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-lg btn-primary" type="submit" name="enviar" >Editar</button>
		
			</div>
			<div class="col-md-2">
				<a href="<?php echo RUTA_IR ?>ver&id=<?php echo $_GET['id'] ?>">
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
<?php 
if(!isset($_GET['id'])){
	header('Location: ' .RUTA_IR. 'panel');
}

$titulo = "Nombre Salón"; ?>
<?php 
require_once 'app/controlador/UsuarioControlador.php';


$usuario = UsuarioControlador::obtenerDatos($_GET['id']);

if($usuario == false){
	header('Location: ' .RUTA_IR. 'panel');
}


require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php
require_once 'vistas/plantillas/header2.inc.php'; 
require_once 'vistas/plantillas/menu.inc.php';


if(isset($_POST['enviar'])){
	UsuarioControlador::editarSalon($_POST['salon'], $_GET['id']);
}

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<h1 class="text-center">Editar Nombre del Salón</h1>
	<form role="form" method="POST">
		<div class="form-group">
			<label for="salon">Salón</label>
			<input type="text" class="form-control" id="salon" name="salon" value="<?php echo $usuario->salon;?>" required>
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
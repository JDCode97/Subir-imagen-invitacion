<?php 
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}


$titulo = "Subir imagen" 
?>
<?php 
require_once 'app/controlador/ImagenControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';

if(isset($_POST['subir'])){
	ImagenControlador::guardar($_POST['descripcion'], 'imagen', 'admin');
}

?>

<div class="row">
	<h1 class="text-center">Subir imagen</h1>
	<form role="form" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="imagen">Subir Imagen</label>
			<input type="file" class="form-control-file" name="imagen" id="imagen" >
		</div>
		<div class="form-group">
			<label for="descripcion">Descripción</label>
			<textarea class='form-control' name='descripcion' id='descripcion' cols='1' rows='2' ></textarea>
		</div>
		<button class="btn btn-lg btn-primary" type="submit" name="subir">Enviar</button>
	</form>
</div>


<?php require_once 'vistas/plantillas/footer.inc.php';?>
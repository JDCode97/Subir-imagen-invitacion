<?php $titulo = "Galeria"; ?>
<?php 
require_once 'app/controlador/ImagenControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';

if(isset($_GET['i']) == 'ok'){
	echo "<div class='alert alert-success' role='alert'>Imagen guardada correctamente.</div>";
}else if(isset($_GET['i']) == 'error'){
	echo "<div class='alert alert-danger' role='alert'>Error al guardar la imagen.</div>";
}

?>

<br><br>
<legend>Seleccione una imagen de la galería para hacer una invitación</legend>

<br><br>
<table class="table table-striped table-responsive-md tabla-dinamica">
		  <thead>
		    <tr class="bg-primary">
		      <th scope="col">Imagen</th>
		      <th scope="col" width="450">Descripción</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php  
		      ImagenControlador::mostrar();
		    ?>
		  </tbody>
		  <tfoot>
	        <tr>
	      		<th scope="col">Imagen</th>
	      		<th scope="col" width="450">Descripción</th>
	    	</tr>
		    </tfoot>
		</table>


<?php  
//	ImagenControlador::mostrar();
?>
<br><br>
<?php require_once 'vistas/plantillas/footer.inc.php';?>
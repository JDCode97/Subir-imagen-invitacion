<?php 
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}


$titulo = "Borrar Imagenes"; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';
require_once 'app/controlador/UsuarioControlador.php';
require_once 'app/controlador/ImagenControlador.php';
?>

<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">Borrar imagenes de la galería</h1>

		<br>

		<!-- Tabla -->
		<table class="table table-striped table-responsive-md tabla-dinamica">
		  <thead>
		    <tr class="bg-primary">
		      <th scope="col"  width="50">Imagen</th>
		      <th scope="col" >Descripción</th>
		       <?php  
		      //if($_SESSION['admin'] == 1){
		      ?>
		      <th scope="col" width="80">Acción</th>
		  		<?php //} ?>
		    </tr>
		  </thead>
		  <tbody>
		    <?php  
		      ImagenControlador::mostrarBorrarGaleria($_SESSION['id_usuario']);
		    ?>
		  </tbody>
		  <tfoot>
	        <tr>
	      		<th scope="col"  width="50">Imagen</th>
			    <th scope="col"  >Descripción</th>
			     <?php  
		      //if($_SESSION['admin'] == 1){
		      ?>
		      <th scope="col" width="80">Acción</th>
		  		<?php //} ?>
	    	</tr>
		    </tfoot>
		</table>
	</div>
</div>


<?php require_once 'vistas/plantillas/footer.inc.php';?>
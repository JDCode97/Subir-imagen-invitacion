<?php 
$titulo = "Mis Imagenes"; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';
require_once 'app/controlador/UsuarioControlador.php';
require_once 'app/controlador/ImagenControlador.php';

if(isset($_POST['subir'])){
	ImagenControlador::guardar($_POST['descripcion'], 'imagen', 'imagenes');
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

<div class="row">
	<div class="col-md-12">
		<h1 class="text-center">Mis Imagenes</h1>

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
		      ImagenControlador::mostrarImagenesUsuario($_SESSION['id_usuario']);
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
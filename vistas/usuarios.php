<?php 
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}



$titulo = "Usuarios"; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';
require_once 'app/controlador/UsuarioControlador.php';
?>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<h1 class="text-center">Usuarios</h1>
		<!-- Tabla -->
		<table class="table table-striped table-responsive-md tabla-dinamica">
		  <thead>
		    <tr class="bg-primary">
		      <th scope="col">Usuario</th>
		      <th scope="col"  width="100">Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php  
		      UsuarioControlador::mostrar();
		    ?>
		  </tbody>
		  <tfoot>
	        <tr>
	      		<th scope="col">Usuario</th>
			    <th scope="col"  width="100">Acciones</th>
	    	</tr>
		    </tfoot>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
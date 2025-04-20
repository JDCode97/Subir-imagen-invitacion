<?php
if($_SESSION['admin'] == 0){
	header('Location:' .RUTA_IR. 'panel');
}

if(!isset($_GET['id'])){
	header('Location: ' .RUTA_IR. 'panel');
}

$titulo = "Ver Usuario"; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';
require_once 'vistas/plantillas/menu.inc.php';
require_once 'app/controlador/UsuarioControlador.php';
require_once 'app/controlador/ImagenControlador.php';

if(UsuarioControlador::obtenerDatos($_GET['id']) != ""){
	$usuario = UsuarioControlador::obtenerDatos($_GET['id']);
}else{
	header('Location: ' .RUTA_IR.'panel');
}

if(isset($_POST['estado']))
	UsuarioControlador::cambiarEstado($_GET['id'], $_POST['estado']);
?>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<h1 class="text-center">Ver Usuario</h1>

		<table class="table table-striped">
			  <tbody>
			    <tr>
			      <td align="right" width="160"><b>Usuario:</b></td>
			      <td><?php echo $usuario->usuario; ?></td>
			    </tr>
			     <tr>
			      <td align="right" width="160"><b>Salón:</b></td>
			      <td><?php echo $usuario->salon; ?></td>
			    </tr>
			    <tr>
			      <td align="right" width="160"><b>Es Admin:</b></td>
			      <td><?php if ($usuario->admin == 1){ echo "SI"; }elseif ($usuario->admin == 0) { echo "NO"; } ?></td> 
			    </tr>
			    <tr>
			      <td align="right" width="160"><b>Estado:</b></td>
			      <!-- Operado Ternario -->
			     <td><?php if ($usuario->activo == 1){ echo "ACTIVO"; }elseif ($usuario->activo == 0) { echo "INACTIVO"; } ?></td> 
			    </tr>
			    <tr>
			      <td align="right" width="160"></td>
			      <!-- Operado Ternario -->
			     <td>
				<form action="" method="POST">
					<?php if ($usuario->activo == 1){ 
			     		echo "<button class='btn btn-danger' type='submit' name='estado' value='0'><i class='fas fa-trash'></i> Desactivar</button>";
			     	}elseif ($usuario->activo == 0) { 
			     		echo "<button class='btn btn-success' type='submit' name='estado' value='1'><i class='fas fa-trash'></i> Activar</button>"; 
			    	 } 
			     ?>
				</form>	
				
			     </td> 
			    </tr>
			    <tr>
			      <td align="right" width="160"></td>
			      <!-- Operado Ternario -->
			     <td>
			     	<a href="<?php echo RUTA_IR ?>editar&id=<?php echo $_GET['id'] ?>">
			     		<button class='btn btn-info' name='editar'><i class='fas fa-trash'></i> Editar usuario</button>
			     	</a>
			     	<a target="_blank" href="<?php echo RUTA_IR ?>salon&id=<?php echo $_GET['id'] ?>">
			     		<button class='btn btn-warning' name='salon'><i class='fas fa-trash'></i> Salón</button>
			     	</a>
			     	</td> 
			    </tr>
			  </tbody>
		</table>


	</div>
	<div class="col-md-1"></div>
	<div class="row">
		<div class="col-md-12">
			<br>

		<!-- Tabla -->
		<table class="table table-striped table-responsive-md tabla-dinamica">
		  <thead>
		    <tr class="bg-primary">
		      <th scope="col"  width="50">Imagen</th>
		      <th scope="col" >Descripción</th>
		      <?php  
		      if($_SESSION['admin'] == 1){
		      ?>
		      <th scope="col" width="50">Acción</th>
		  		<?php } ?>
		    </tr>
		  </thead>
		  <tbody>
		    <?php  
		      ImagenControlador::mostrarInvitacionesUsuario($_GET['id']);
		    ?>
		  </tbody>
		  <tfoot>
	        <tr>
	      		<th scope="col"  width="50">Imagen</th>
			    <th scope="col"  >Descripción</th>
			    <?php  
		      if($_SESSION['admin'] == 1){
		      ?>
		      <th scope="col" width="50">Acción</th>
		  		<?php } ?>
	    	</tr>
		    </tfoot>
		</table>
		</div>
	</div>
</div>


<?php require_once 'vistas/plantillas/footer.inc.php';?>
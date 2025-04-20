<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/login.css">
<?php require_once 'vistas/plantillas/header2.inc.php';?>
<?php require_once 'app/controlador/UsuarioControlador.php'; ?>

<div class="row">
	<div class="col-md-12">
		<?php  
		if(isset($_POST['login']))
			UsuarioControlador::login($_POST['usuario'], $_POST['clave']);
		?>
		<form role="form" method="POST" action="" class="form-signin">
			<h1 class="h3 mb-3 font-weight-normal text-center">Iniciar Sesión</h1><br>
			<label for="usuario">Usuario</label>
			<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Nombre de usuario" required autofocus>
			<label for="clave" >Contraseña</label>
			<input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Ingresar</button>
		</form>
	</div>
</div>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
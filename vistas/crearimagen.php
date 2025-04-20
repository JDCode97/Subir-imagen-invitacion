<?php $titulo = "Crear Texto"; ?>
<?php 
require_once 'app/controlador/ImagenControlador.php';
require_once 'vistas/plantillas/header.inc.php';
?>
<link rel="stylesheet" href="vistas/css/panel.css">
<?php 
//require_once 'vistas/plantillas/header2.inc.php';
//require_once 'vistas/plantillas/menu.inc.php';
echo '</head>';
echo '<body>';
echo '<div class="container-fluid">';
echo '<div class="col-md-12">';
?>
<?php 
if(isset($_GET['id'])){
?>
<br>
<h1 class="text-center">Crear Texto</h1>
<br>
<div class="row text-center">
	
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<a href="<?php echo RUTA_IR;?>galeria">
			<button class="btn btn-lg btn-primary">Regresar a Galería</button>
		</a>
	</div>
	<div class="col-md-4"></div>
	
</div>
<br><hr><br>
<div class="row text-center">
	<form role="form" method="POST" enctype="multipart/form-data" id="crear-imagen">
		<div class="col-md-3">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nombre">Texto 1</label>
					<input type="text" class="form-control" id="nombre" name="nombre" value="Nombre" onkeypress="escribir();">
				</div>
				<div class="form-group col-md-6">
					<label for="color-1">Color</label>
					    <select class="form-control" id="color-1" name="color-1" onchange="actualizar(); escribir();">
					      <option value="NEGRO">Negro</option>
					      <option value="ROJO">Rojo</option>
					      <option value="BLANCO">Blanco</option>
					      <option value="AMARILLO">Amarillo</option>
					      <option value="AZUL">Azul</option>
					      <option value="VERDE">Verde</option>
					      <option value="MARRON">Marron</option>
					      <option value="MORADO">Morado</option>
					    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="p-x-1">Horizontal</label>
					<input type="text" class="form-control" id="p-x-1" name="p-x-1" onchange="actualizar();"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="p-y-1">Vertical</label>
					<input type="text" class="form-control" value="100" id="p-y-1" name="p-y-1" onchange="actualizar();"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">	
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tamano-1">Tamaño Letra</label>
					<input type="text" class="form-control" value="100" id="tamano-1" name="tamano-1"  onchange="actualizar();" onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="fuente-1">Fuente</label>
				    <select class="form-control" id="fuente-1" name="fuente-1" onchange="actualizar()">
				      <option value="Andalusia">Andalusia</option>
				      <option value="ChopinScript">Chopin Script</option>
				      <option value="Ganula">Ganula</option>
				      <option value="SansSerif">SansSerif</option>
				      <option value="ComicSans">ComicSans</option>
				    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12"></div>
				<div class="form-group col-md-12"></div>
				<div class="form-group col-md-12"></div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="fecha">Texto 2</label>
					<input type="text" class="form-control" value="¡Te invita a su fiesta de cumpleaños!" id="fecha" name="fecha" onkeypress="escribir()">
				</div>
				<div class="form-group col-md-6">
					<label for="color-2">Color</label>
				    <select class="form-control" id="color-2" name="color-2" onchange="actualizar()">
				      <option value="NEGRO" >Negro</option>
				      <option value="ROJO">Rojo</option>
				      <option value="BLANCO">Blanco</option>
				      <option value="AMARILLO">Amarillo</option>
				      <option value="AZUL">Azul</option>
				      <option value="VERDE">Verde</option>
				      <option value="MARRON">Marron</option>
				      <option value="MORADO">Morado</option>
				    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="p-x-2">Horizontal</label>
					<input type="text" class="form-control" id="p-x-2" name="p-x-2" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="p-y-2">Vertical</label>
					<input type="text" class="form-control" id="p-y-2" name="p-y-2" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tamano-2">Tamaño Letra</label>
					<input type="text" class="form-control" value="100" id="tamano-2" name="tamano-2" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="fuente-2">Fuente</label>
				    <select class="form-control" id="fuente-2" name="fuente-2" onchange="actualizar()">
				      <option value="Andalusia">Andalusia</option>
				      <option value="ChopinScript">Chopin Script</option>
				      <option value="Ganula">Ganula</option>
				      <option value="SansSerif">SansSerif</option>
				      <option value="ComicSans">ComicSans</option>
				    </select>
				</div>
			</div>
		</div>
		<div class="col-md-6" id="mostrar-imagen">
			<?php 

        	$imagen = '<img src ="crearImagen.php?';
		        	$imagen .= 'carpeta=' .$_GET['carpeta']. '&';
		        	$imagen .= 'imagen=' .$_GET['imagen']. '&';
		        	$imagen .= 'nombre=Nombre&';
		        	$imagen .= 'color-1=&';
		        	$imagen .= 'tamano-1=100&';
		        	$imagen .= 'p-x-1=&';
		        	$imagen .= 'p-y-1=100&';
		        	$imagen .= 'fuente-1=Andalusia&';
		        	$imagen .= 'fecha=¡Te invita a su fiesta de cumpleaños!&';
		        	$imagen .= 'color-2=&';
		        	$imagen .= 'tamano-2=100&';
		        	$imagen .= 'p-x-2=&';
		        	$imagen .= 'p-y-2=&';
		        	$imagen .= 'fuente-2=Andalusia&';
		        	$imagen .= 'texto=&';
		        	$imagen .= 'color-3=&';
		        	$imagen .= 'tamano-3=&';
		        	$imagen .= 'p-x-3=&';
		        	$imagen .= 'p-y-3=&';
		        	$imagen .= 'fuente-3=&';
		        	$imagen .= 'texto-2=&';
		        	$imagen .= 'color-4=&';
		        	$imagen .= 'tamano-4=&';
		        	$imagen .= 'p-x-4=&';
		        	$imagen .= 'p-y-4=&';
		        	$imagen .= 'fuente-4="  width="100%" height="100%" />';

			//ImagenControlador::mostrarCrearImagen($_GET['id']); 
        	echo $imagen;

			?>
		</div>
		<div class="col-md-3">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="texto">Texto 3</label>
					<input type="text" class="form-control" id="texto" name="texto" onkeypress="escribir()">
				</div>
				<div class="form-group col-md-6">
					<label for="color-3">Color</label>
				    <select class="form-control" id="color-3" name="color-3" onchange="actualizar()">
				      <option value="NEGRO">Negro</option>
				      <option value="ROJO">Rojo</option>
				      <option value="BLANCO">Blanco</option>
				      <option value="AMARILLO">Amarillo</option>
				      <option value="AZUL">Azul</option>
				      <option value="VERDE">Verde</option>
				      <option value="MARRON">Marron</option>
				      <option value="MORADO">Morado</option>
				    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="p-x-3">Horizontal</label>
					<input type="text" class="form-control" id="p-x-3" name="p-x-3" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="p-y-3">Vertical</label>
					<input type="text" class="form-control" id="p-y-3" name="p-y-3" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tamano-3">Tamaño Letra</label>
					<input type="text" class="form-control" id="tamano-3" name="tamano-3" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="fuente-3">Fuente</label>
				    <select class="form-control" id="fuente-3" name="fuente-3" onchange="actualizar()">
				     <option value="Andalusia">Andalusia</option>
				      <option value="ChopinScript">Chopin Script</option>
				      <option value="Ganula">Ganula</option>
				      <option value="SansSerif">SansSerif</option>
				      <option value="ComicSans">ComicSans</option>
				    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12"></div>
				<div class="form-group col-md-12"></div>
				<div class="form-group col-md-12"></div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="texto">Texto 4</label>
					<input type="text" class="form-control" id="texto-2" name="texto-2" onkeypress="escribir()">
				</div>
				<div class="form-group col-md-6">
					<label for="color-4">Color</label>
				    <select class="form-control" id="color-4" name="color-4" onchange="actualizar()">
				      <option value="NEGRO">Negro</option>
				      <option value="ROJO">Rojo</option>
				      <option value="BLANCO">Blanco</option>
				      <option value="AMARILLO">Amarillo</option>
				      <option value="AZUL">Azul</option>
				      <option value="VERDE">Verde</option>
				      <option value="MARRON">Marron</option>
				      <option value="MORADO">Morado</option>
				    </select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="p-x-4">Horizontal</label>
					<input type="text" class="form-control" id="p-x-4" name="p-x-4" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="p-y-4">Vertical</label>
					<input type="text" class="form-control" id="p-y-4" name="p-y-4" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tamano-4">Tamaño Letra</label>
					<input type="text" class="form-control" id="tamano-4" name="tamano-4" onchange="actualizar()"  onkeypress="escribir(); return soloNumeros(event);" maxlength="3">
				</div>
				<div class="form-group col-md-6">
					<label for="fuente-4">Fuente</label>
				    <select class="form-control" id="fuente-4" name="fuente-4" onchange="actualizar()">
				      <option value="Andalusia">Andalusia</option>
				      <option value="ChopinScript">Chopin Script</option>
				      <option value="Ganula">Ganula</option>
				      <option value="SansSerif">SansSerif</option>
				      <option value="ComicSans">ComicSans</option>
				    </select>
				</div>
			</div>
		</div>
		<input type="hidden" id="carpeta" name="carpeta" value="<?php echo $_GET['carpeta']; ?>">
		<input type="hidden" id="imagen" name="imagen" value="<?php echo $_GET['imagen'];?>">
	</form>
</div>
<div class="row text-center">
	<div class="col-md-12">*Ingrese un nombre en Text1 para poder guardar.</div>
</div>
<div class="row text-center">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form action="redirige.php" method="GET" target="_blank">
			<div class="form-group">
				<label for="descripcion">Ingrese una descripción</label>
				<input type="hidden" name="carpeta" id="carpeta-r" value="<?php echo $_GET['carpeta'];?>">
				<input type="hidden" name="imagen" id="imagen-r" value="<?php echo $_GET['imagen'];?>">
				<input type="hidden" name="nombre" id="nombre-r">
				<input type="hidden" name="color-1" id="color-1-r">
				<input type="hidden" name="tamano-1" id="tamano-1-r">
				<input type="hidden" name="p-x-1" id="p-x-1-r">
				<input type="hidden" name="p-y-1" id="p-y-1-r">
				<input type="hidden" name="fuente-1" id="fuente-1-r">

				<input type="hidden" name="fecha" id="fecha-r">
				<input type="hidden" name="color-2" id="color-2-r">
				<input type="hidden" name="tamano-2" id="tamano-2-r">
				<input type="hidden" name="p-x-2" id="p-x-2-r">
				<input type="hidden" name="p-y-2" id="p-y-2-r">
				<input type="hidden" name="fuente-2" id="fuente-2-r">

				<input type="hidden" name="texto" id="texto-r">
				<input type="hidden" name="color-3" id="color-3-r">
				<input type="hidden" name="tamano-3" id="tamano-3-r">
				<input type="hidden" name="p-x-3" id="p-x-3-r">
				<input type="hidden" name="p-y-3" id="p-y-3-r">
				<input type="hidden" name="fuente-3" id="fuente-3-r">

				<input type="hidden" name="texto-2" id="texto-2-r">
				<input type="hidden" name="color-4" id="color-4-r">
				<input type="hidden" name="tamano-4" id="tamano-4-r">
				<input type="hidden" name="p-x-4" id="p-x-4-r">
				<input type="hidden" name="p-y-4" id="p-y-4-r">
				<input type="hidden" name="fuente-4" id="fuente-4-r">


				<input type="text" class="form-control" id="descripcion" name="descripcion" value="">
			</div>
		<?php if(isset($_GET['carpeta']) && isset($_GET['imagen']) && isset($_GET['id'])){?>
		<button class="btn btn-lg btn-warning" type="submit" name="guardar" id="guardar">Guardar imagen</button>
	<?php } ?>
		</form>
	</div>
	<div class="col-md-3">
	</div>
</div>
<br><br><hr><br><br>

<?php  
}
?>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
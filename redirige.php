<?php  
include_once 'app/libs/class.textPainter.php';
include_once 'app/config/config.php';
include_once 'app/config/Conexion.php';
include_once 'app/modelo/Imagen.php';
include_once 'app/controlador/ImagenControlador.php';
include_once 'app/controlador/ControlSesion.php';


Conexion::abrirConexion();
ControlSesion::verificarSesion();

if(isset($_GET['guardar'])){
	
	if(isset($_GET['nombre']) && !empty($_GET['nombre']))
		$nombre = $_GET['nombre'];
	else
		$nombre = "Nombre";

	if(isset($_GET['fecha']) && !empty($_GET['fecha']))
		$fecha = $_GET['fecha'];
	else
		$fecha = "";

	if(isset($_GET['texto']) && !empty($_GET['texto']))
		$texto = $_GET['texto'];
	else
		$texto = "¡Te invita a su fiesta de cumpleaños!";

	if(isset($_GET['texto-2']) && !empty($_GET['texto-2']))
		$texto2 = $_GET['texto-2'];
	else
		$texto2 = "";

	if(isset($_GET['color-1']))
		$color1 = $_GET['color-1'];
	else
		$color1 = "NEGRO";

	if(isset($_GET['tamano-1']) && !empty($_GET['tamano-1']))
		$tamano1 = $_GET['tamano-1'];
	else
		$tamano1 = 100;

	if(isset($_GET['p-x-1']) && !empty($_GET['p-x-1']))
		$x1 = $_GET['p-x-1'];
	else
		//$x1 = 40;
		$x1 = "center";

	if(isset($_GET['p-y-1']) && !empty($_GET['p-y-1']))
		$y1 = $_GET['p-y-1'];
	else
		//$y1 = 40;
		$y1 = "top";

	if(isset($_GET['fuente-1']) && !empty($_GET['fuente-1']))
		$fuente1 = $_GET['fuente-1'];
	else
		$fuente1 = 'SansSerif';




	if(isset($_GET['color-2']))
		$color2 = $_GET['color-2'];
	else
		$color2 = "MORADO";

	if(isset($_GET['tamano-2']) && !empty($_GET['tamano-2']))
		$tamano2 = $_GET['tamano-2'];
	else
		$tamano2 = 100;

	if(isset($_GET['p-x-2']) && !empty($_GET['p-x-2']))
		$x2 = $_GET['p-x-2'];
	else
		//$x2 = 80;
		$x2 = "center";

	if(isset($_GET['p-y-2']) && !empty($_GET['p-y-2']))
		$y2 = $_GET['p-y-2'];
	else
		//$y2 = 80;
		$y2 = "center";

	if(isset($_GET['fuente-2']) && !empty($_GET['fuente-2']))
		$fuente2 = $_GET['fuente-2'];
	else
		$fuente2 = 'SansSerif';



	if(isset($_GET['color-3']))
		$color3 = $_GET['color-3'];
	else
		$color3 = "AZUL";

	if(isset($_GET['tamano-3']) && !empty($_GET['tamano-3']))
		$tamano3 = $_GET['tamano-3'];
	else
		$tamano3 = 80;

	if(isset($_GET['p-x-3']) && !empty($_GET['p-x-3']))
		$x3 = $_GET['p-x-3'];
	else
		//$x3 = 110;
		$x3 = "center";

	if(isset($_GET['p-y-3']) && !empty($_GET['p-y-3']))
		$y3 = $_GET['p-y-3'];
	else
		//$y3 = 110;
		$y3 = "bottom";

	if(isset($_GET['fuente-3']) && !empty($_GET['fuente-3']))
		$fuente3 = $_GET['fuente-3'];
	else
		$fuente3 = 'SansSerif';




	if(isset($_GET['color-4']))
		$color4 = $_GET['color-4'];
	else
		$color4 = "AZUL";

	if(isset($_GET['tamano-4']) && !empty($_GET['tamano-4']))
		$tamano4 = $_GET['tamano-4'];
	else
		$tamano4 = 80;

	if(isset($_GET['p-x-4']) && !empty($_GET['p-x-4']))
		$x4 = $_GET['p-x-4'];
	else
		//$x4 = 110;
		$x4 = "center";

	if(isset($_GET['p-y-4']) && !empty($_GET['p-y-4']))
		$y4 = $_GET['p-y-4'];
	else
		//$y4 = 110;
		$y4 = "center";

	if(isset($_GET['fuente-4']) && !empty($_GET['fuente-4']))
		$fuente4 = $_GET['fuente-4'];
	else
		$fuente4 = 'SansSerif';




	$hora = new DateTime('now',new DateTimeZone('America/Caracas')); 
	$fecha_actual = $hora->format('d-m-Y-H-i-s');

	$random = rand(1000, 999999);

	$id = $_SESSION['id_usuario'];

	$nombre_archivo = $id.$random.$fecha_actual;

	if(isset($_GET['descripcion'])){
		$descripcion = $_GET['descripcion'];
	}else{
		$descripcion = "";
	}

	ImagenControlador::guardarImagenEditada($nombre_archivo. '.png', $id, $descripcion);

	$imagen = 'crearImagen.php?';
	$imagen .= 'carpeta=' .$_GET['carpeta']. '&';
	$imagen .= 'imagen=' .$_GET['imagen']. '&';
	$imagen .= 'nombre=' .$_GET['nombre']. '&';
	$imagen .= 'color-1=' .$_GET['color-1']. '&';
	$imagen .= 'tamano-1=' .$_GET['tamano-1']. '&';
	$imagen .= 'p-x-1=' .$_GET['p-x-1']. '&';
	$imagen .= 'p-y-1=' .$_GET['p-y-1']. '&';
	$imagen .= 'fuente-1=' .$_GET['fuente-1']. '&';
	$imagen .= 'fecha=' .$_GET['fecha']. '&';
	$imagen .= 'color-2=' .$_GET['color-2']. '&';
	$imagen .= 'tamano-2=' .$_GET['tamano-2']. '&';
	$imagen .= 'p-x-2=' .$_GET['p-x-2']. '&';
	$imagen .= 'p-y-2=' .$_GET['p-y-2']. '&';
	$imagen .= 'fuente-2=' .$_GET['fuente-2']. '&';
	$imagen .= 'texto=' .$_GET['texto']. '&';
	$imagen .= 'color-3=' .$_GET['color-3']. '&';
	$imagen .= 'tamano-3=' .$_GET['tamano-3']. '&';
	$imagen .= 'p-x-3=' .$_GET['p-x-3']. '&';
	$imagen .= 'p-y-3=' .$_GET['p-y-3']. '&';
	$imagen .= 'fuente-3=' .$_GET['fuente-3']. '&';
	$imagen .= 'texto-2=' .$_GET['texto-2']. '&';
	$imagen .= 'color-4=' .$_GET['color-4']. '&';
	$imagen .= 'tamano-4=' .$_GET['tamano-4']. '&';
	$imagen .= 'p-x-4=' .$_GET['p-x-4']. '&';
	$imagen .= 'p-y-4=' .$_GET['p-y-4']. '&';
	$imagen .= 'fuente-4=' .$_GET['fuente-4']. '&';
	$imagen .= 'id-usuario=' .$_SESSION['id_usuario']. '&';
	$imagen .= 'nombre-archivo=' .$nombre_archivo;

	header('Location: ' . $imagen);


}
Conexion::cerrarConexion();
?>
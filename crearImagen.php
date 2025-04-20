<?php  
include_once 'app/libs/class.textPainter.php';

if(isset($_GET['nombre']) && !empty($_GET['nombre']))
	$nombre = $_GET['nombre'];
else
	$nombre = "Nombre";

if(isset($_GET['fecha']) && !empty($_GET['fecha']))
	$fecha = $_GET['fecha'];
else
	$fecha = "¡Te invita a su fiesta de cumpleaños!";

if(isset($_GET['texto']) && !empty($_GET['texto']))
	$texto = $_GET['texto'];
else
	$texto = "";

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



$R1 = 0;
$G1 = 0;
$B1 = 0;
$R2 = 0;
$G2 = 0;
$B2 = 0;
$R3 = 0;
$G3 = 0;
$B3 = 0;
$R4 = 0;
$G4 = 0;
$B4 = 0;


if(isset($_GET['imagen']) && isset($_GET['carpeta'])){
	$ruta_imagen = './imagenes/'.$_GET['carpeta'].'/'.$_GET['imagen'];
}else{
	$ruta_imagen = './imagenes/paisaje.jpg';
}

if($_GET['fuente-1'] == 'Ganula'){
	$fuente1 = './Ganula.ttf';
}else if($_GET['fuente-1'] == 'ComicSans'){
	$fuente1 = './ComicSans.ttf';
}else{
	$fuente1 = './' .$fuente1. '.otf';
}


$img = new textPainter($ruta_imagen, $nombre, $fuente1, $tamano1);

if($color1 == "NEGRO"){
	$R1 = 0; $G1 = 0; $B1 = 0;
}else if($color1 == "ROJO"){
	$R1 = 255; $G1 = 0; $B1 = 0;
}
else if($color1 == "BLANCO"){
	$R1 = 255; $G1 = 255; $B1 = 255;
}
else if($color1 == "AMARILLO"){
	$R1 = 255; $G1 = 255; $B1 = 0;
}
else if($color1 == "AZUL"){
	$R1 = 0; $G1 = 0; $B1 = 255;
}
else if($color1 == "VERDE"){
	$R1 = 0; $G1 = 128; $B1 = 0;
}
else if($color1 == "MARRON"){
	$R1 = 165; $G1 = 42; $B1 = 42;
}
else if($color1 == "MORADO"){
	$R1 = 128; $G1 = 0; $B1 = 128;
}



if($color2 == "ROJO"){
	$R2 = 255; $G2 = 0; $B2 = 0;
}
else if($color2 == "BLANCO"){
	$R2 = 255; $G2 = 255; $B2 = 255;
}
else if($color2 == "AMARILLO"){
	$R2 = 255; $G2 = 255; $B2 = 0;
}
else if($color2 == "AZUL"){
	$R2 = 0; $G2 = 0; $B2 = 255;
}
else if($color2 == "VERDE"){
	$R2 = 0; $G2 = 128; $B2 = 0;
}
else if($color2 == "MARRON"){
	$R2 = 165; $G2 = 42; $B2 = 42;
}
else if($color2 == "MORADO"){
	$R2 = 128; $G2 = 0; $B2 = 128;
}




if($color3 == "ROJO"){
	$R3 = 255; $G3 = 0; $B3 = 0;
}
else if($color3 == "BLANCO"){
	$R3 = 255; $G3 = 255; $B3 = 255;
}
else if($color3 == "AMARILLO"){
	$R3 = 255; $G3 = 255; $B3 = 0;
}
else if($color3 == "AZUL"){
	$R3 = 0; $G3 = 0; $B3 = 255;
}
else if($color3 == "VERDE"){
	$R3 = 0; $G3 = 128; $B3 = 0;
}
else if($color3 == "MARRON"){
	$R3 = 165; $G3 = 42; $B3 = 42;
}
else if($color3 == "MORADO"){
	$R3 = 128; $G3 = 0; $B3 = 128;
}






if($color4 == "ROJO"){
	$R4 = 255; $G4 = 0; $B4 = 0;
}
else if($color4 == "BLANCO"){
	$R4 = 255; $G4 = 255; $B4 = 255;
}
else if($color4 == "AMARILLO"){
	$R4 = 255; $G4 = 255; $B4 = 0;
}
else if($color4 == "AZUL"){
	$R4 = 0; $G4 = 0; $B4 = 255;
}
else if($color4 == "VERDE"){
	$R4 = 0; $G4 = 128; $B4 = 0;
}
else if($color4 == "MARRON"){
	$R4 = 165; $G4 = 42; $B4 = 42;
}
else if($color4 == "MORADO"){
	$R4 = 128; $G4 = 0; $B4 = 128;
}



//Primero texto
$img->setTextColor($R1,$G1,$B1);
$img->setPosition($x1, $y1, 2);
$img->show();




//Segundo texto

if($_GET['fuente-2'] == 'Ganula'){
	$fuente2 = './Ganula.ttf';
}else if($_GET['fuente-2'] == 'ComicSans'){
	$fuente2 = './ComicSans.ttf';
}else{
	$fuente2 = './' .$fuente2. '.otf';
}
$img->setFontFile($fuente2);
$img->setTextColor($R2,$G2,$B2);
$img->setFontSize($tamano2);
$img->setText($fecha);
$img->setPosition($x2, $y2, 2);
$img->show();




//Tercer texto

if($_GET['fuente-3'] == 'Ganula'){
	$fuente3 = './Ganula.ttf';
}else if($_GET['fuente-3'] == 'ComicSans'){
	$fuente3 = './ComicSans.ttf';
}else{
	$fuente3 = './' .$fuente3. '.otf';
}

$img->setFontFile($fuente3);
$img->setTextColor($R3,$G3,$B3);
$img->setFontSize($tamano3);
$img->setText($texto);
$img->setPosition($x3, $y3,2);
$img->show();




//Cuarto texto

if($_GET['fuente-4'] == 'Ganula'){
	$fuente4 = './Ganula.ttf';
}else if($_GET['fuente-4'] == 'ComicSans'){
	$fuente4 = './ComicSans.ttf';
}else{
	$fuente4 = './' .$fuente4. '.otf';
}

$img->setFontFile($fuente4);
$img->setTextColor($R4,$G4,$B4);
$img->setFontSize($tamano4);
$img->setText($texto2);
$img->setPosition($x4, $y4, 2);
$img->show();


$img->show2();
	
if(isset($_GET['nombre-archivo'])){
	$id = $_GET['id-usuario'];
	$nombre_archivo = $_GET['nombre-archivo'];

	$destino = "imagenes/" .$id. "/invitaciones/" .$nombre_archivo;

	$img->save($destino. '.png');
}

?>
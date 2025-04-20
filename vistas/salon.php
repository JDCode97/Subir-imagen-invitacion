<?php
if(!isset($_GET['id'])){
	header('Location: ' .RUTA_IR. 'panel');
}
require_once 'app/controlador/UsuarioControlador.php';
require_once 'app/controlador/ImagenControlador.php';

$usuario = UsuarioControlador::obtenerDatos($_GET['id']);

if($usuario == null){
	header('Location: ' .RUTA_IR. 'panel');
}

$titulo = "Salón " .$usuario->salon; 
?>
<?php require_once 'vistas/plantillas/header.inc.php';?>
<link rel="stylesheet" href="vistas/css/carousel.css">
<?php 
require_once 'vistas/plantillas/header2.inc.php';


$imagen = ImagenControlador::obtenerDatos($_GET['id']);
?>

<div class="row  text-center">
	<div class="col-md-12">
		<div class="jumbotron">
		  <h1><?php echo $usuario->salon ?></h1>
		</div>
	</div>
</div>
<br><hr><br>
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<?php 
		if(isset($_GET['invitacion'])){
			echo '<img src="imagenes/' .$_GET['id']. '/invitaciones/' .$_GET['invitacion']. '" width="100%" height="100%">';
		} 
		?>
	</div>
	<div class="col-md-2"></div>
</div>
<br><hr><br>

<div class="row">
    <legend><h1>Fotos del Salón</h1></legend>
	 <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-sm-6" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                    <?php ImagenControlador::mostrarCarrusel1($_GET['id']); ?>
                </ul>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <?php ImagenControlador::mostrarCarrusel2($_GET['id']); ?>
                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Slider-->
        </div>

    </div>
</div>

<br><br>

<?php require_once 'vistas/plantillas/footer.inc.php';?>
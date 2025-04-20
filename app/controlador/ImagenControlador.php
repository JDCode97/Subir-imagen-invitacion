<?php  
include_once 'app/modelo/Imagen.php';

class ImagenControlador{

	public static function guardar($descripcion, $imagen, $carpeta){
		if(isset($_FILES[$imagen]['name']) && !empty($_FILES[$imagen]['name'])){
			$nombre_archivo = $_FILES[$imagen]['name']; //Nombre del archivo
			$temp = $_FILES[$imagen]['tmp_name']; //Temporal de archivo
			$tam = $_FILES[$imagen]['size']; //Tamañno del archivo
			$ext = substr($nombre_archivo,strrpos($nombre_archivo,'.')); //La variable quedara con .png/.jpeg/.jpg
			$tamMaximo = 5000000; // Tamaño máximo a subir los archivos MB
			$extImagen = array('.jpg','.png','.jpeg');

			if(in_array($ext,$extImagen)){
				if($tam <= $tamMaximo){
					$nombreCarpeta = "imagenes/".$_SESSION['id_usuario']."/";
					if(!file_exists($nombreCarpeta)){
						mkdir($nombreCarpeta,0777); //Se crea la carpeta con el id del usuario	
					}

					$invitaciones = $nombreCarpeta. "invitaciones/";

					if(!file_exists($invitaciones)){
						mkdir($invitaciones,0777); //Se crea la carpeta invitaciones en el id del usuario	
					}

					$imagenes = $nombreCarpeta. "imagenes/";

					if(!file_exists($imagenes)){
						mkdir($imagenes,0777); //Se crea la carpeta imagenes en el id del usuario	
					}
					//mkdir($destino = $nombreCarpeta.$nombre_archivo."/",0777);
					//if(){
							//MENSAJE DE QUE SE SUBIO
						$img = new Imagen(Conexion::obtenerConexion());

						if($carpeta == 'invitaciones'){
							if($img->guardar($descripcion, $_SESSION['id_usuario'], $carpeta, $nombre_archivo)){
								move_uploaded_file($temp,$invitaciones.$nombre_archivo);
								echo "<div class='alert alert-success' role='alert'>";
								echo "Imagen $nombre_archivo subida correctamente!.";
								echo "</div>";
							}
						}

						if($carpeta == 'imagenes'){
							if($img->guardar($descripcion, $_SESSION['id_usuario'], $carpeta, $nombre_archivo)){
								move_uploaded_file($temp,$imagenes.$nombre_archivo);
								echo "<div class='alert alert-success' role='alert'>";
								echo "Imagen $nombre_archivo subida correctamente!.";
								echo "</div>";
							}
						}

						if($carpeta == 'admin'){
							if($img->guardar($descripcion, 'imagenes', "imagenes", $nombre_archivo)){
								$destino = "imagenes/imagenes/";
								move_uploaded_file($temp,$destino.$nombre_archivo);
								echo "<div class='alert alert-success' role='alert'>";
								echo "Imagen $nombre_archivo subida correctamente!.";
								echo "</div>";
							}
						}
						
					//}
				}else{
					echo "<div class='alert alert-danger' role='alert'>";
					echo "Tamaño permitido hasta 5MB.";
					echo "</div>";
				}
				
			}else{
				echo "<div class='alert alert-danger' role='alert'>";
				echo "El formato que ingresa subir no esta permitido.";
				echo "</div>";
			}			
		}else{
			echo "<div class='alert alert-danger' role='alert'>";
			echo "No ha seleccionado ninguna imagen.";
			echo "</div>";
		}
	}

	public static function crearCarpeta(){
		include_once 'app/controlador/ControlSesion.php';

		$nombreCarpeta = "imagenes/".$_SESSION['id_usuario']."/";

		if(!file_exists($nombreCarpeta)){
			mkdir($nombreCarpeta,0777); //Se crea la carpeta con el id del usuario	
		}

		$invitaciones = $nombreCarpeta. "invitaciones/";

		if(!file_exists($invitaciones)){
			mkdir($invitaciones,0777); //Se crea la carpeta invitaciones en el id del usuario	
		}

		$imagenes = $nombreCarpeta. "imagenes/";

		if(!file_exists($imagenes)){
			mkdir($imagenes,0777); //Se crea la carpeta imagenes en el id del usuario	
		}

		
	}

	public static function guardarImagenEditada($nombre_archivo,$carpeta, $descripcion){
		include_once 'app/modelo/Imagen.php';

		$img = new Imagen(Conexion::obtenerConexion());

		if($img->guardar($descripcion, $carpeta, "invitaciones", $nombre_archivo)){
			return true;
		}else{
			return false;
		}
	}

	public static function mostrar(){
		include_once 'app/modelo/Usuario.php';
		
		$usuario = new Usuario(Conexion::obtenerConexion());
		$usuarios = $usuario->obtenerTodosPor('admin', 1);

		foreach($usuarios as $usuario){
			$imagen = new Imagen(Conexion::obtenerConexion());

			$imagenes = $imagen->obtenerTodosPor('id_usuario', $usuario->id);

			foreach($imagenes as $imagen){
				if($imagen->carpeta == "imagenes" && $imagen->subcarpeta == 'imagenes'){
					echo "<tr>";
					echo '<td><a href="' .RUTA_IR. 'crearimagen&id=' .$imagen->id. '&carpeta=' .$imagen->carpeta. '&imagen=' .$imagen->imagen. '"><img src="imagenes/imagenes/' .$imagen->imagen. '" width="300" height="200"></a></td>';

					echo "<td>" . $imagen->descripcion . "</td>";
					echo "</tr>";
				}
			}
		}

		
	}

	public static function mostrarBorrarGaleria($id){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagenes = $imagen->obtenerTodosPor('id_usuario', $id);

		foreach($imagenes as $imagen){
			if($imagen->carpeta == "imagenes" && $imagen->subcarpeta == "imagenes"){
				echo "<tr>";
				echo '<td><a target="_blank" href="imagenes/imagenes/' .$imagen->imagen. '"><img src="imagenes/imagenes/' .$imagen->imagen. '" width="300" height="200"></a></td>';

				echo "<td>" . $imagen->descripcion . "</td>";

				$url = 'imagenes/' .$_SESSION['id_usuario']. '/' .$imagen->imagen;
							

				echo "<td>";
				echo "<a href='" .RUTA_IR. "borrar&id=" .$imagen->id. "'><button class='btn btn-danger'>Borrar</button></a>";
				echo "</td>";
				echo "</tr>";
			}
		}
	}

	public static function mostrarImagenesUsuario($id){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagenes = $imagen->obtenerTodosPor('id_usuario', $id);

		foreach($imagenes as $imagen){
			if($imagen->carpeta == $id && $imagen->subcarpeta == 'imagenes'){
				echo "<tr>";
				echo '<td><a target="_blank" href="imagenes/' .$imagen->id_usuario. '/imagenes/' .$imagen->imagen. '"><img src="imagenes/' .$imagen->id_usuario. '/imagenes/' .$imagen->imagen. '" width="300" height="200"></a></td>';

				echo "<td>" . $imagen->descripcion . "</td>";

				$url = 'imagenes/' .$_SESSION['id_usuario']. '/' .$imagen->imagen;
							

				echo "<td>";
				echo "<a href='" .RUTA_IR. "borrar&id=" .$imagen->id. "'><button class='btn btn-danger'>Borrar</button></a>";
				echo "</td>";
				echo "</tr>";
			}
		}
	}

	public static function mostrarInvitacionesUsuario($id){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagenes = $imagen->obtenerTodosPor('id_usuario', $id);

		foreach($imagenes as $imagen){
			if($imagen->carpeta == $id && $imagen->subcarpeta == 'invitaciones'){
				echo "<tr>";
				echo '<td><a target="_blank" href="imagenes/' .$imagen->id_usuario. '/invitaciones/' .$imagen->imagen. '"><img src="imagenes/' .$imagen->id_usuario. '/invitaciones/' .$imagen->imagen. '" width="300" height="200"></a></td>';

				echo "<td>" . $imagen->descripcion . "</td>";

				//$url = 'imagenes/' .$_SESSION['id_usuario']. '/invitaciones' .$imagen->imagen;
				$url = urlencode(HOME.RUTA_IR. 'salon&id=' .$id. '&invitacion=' .$imagen->imagen);		

				echo "<td>";
				echo "<a target='_blank' href='" .RUTA_IR. "salon&id=" .$id. "&invitacion=" .$imagen->imagen. "'><button class='btn btn-warning'>Ver en salón</button></a>";
				echo "<a href='whatsapp://send?text=Revisa mi nueva tarjeta de invitacion " .$url. "' data-action='share/whatsapp/share'><button class='btn btn-success'>Compartir</button></a>";
				echo "<a href='" .RUTA_IR. "borrar&id=" .$imagen->id. "'><button class='btn btn-danger'>Borrar</button></a>";
				echo "</td>";
				echo "</tr>";
			}
		}
	}

	public static function mostrarCrearImagen($id){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagen = $imagen->obtenerPorId($id);

		echo '<img src="imagenes/' .$imagen->id_usuario. '/' .$imagen->imagen. '" width="100%" height="100%">';		
	}

	public static function eliminarImagen($id, $carpeta){
		$img = new Imagen(Conexion::obtenerConexion());
		$imagen = $img->obtenerPorId($id);

		if($imagen != ""){
			if($img->borrarPorId($id)){
				if($carpeta == 'admin'){
					$ruta = "imagenes/imagenes/$imagen->imagen";
				}

				if($carpeta == 'imagenes'){
					$ruta = "imagenes/$imagen->id_usuario/imagenes/$imagen->imagen";
				}

				if($carpeta == 'invitaciones'){
					$ruta = "imagenes/$imagen->id_usuario/invitaciones/$imagen->imagen";
				}

				if(unlink($ruta)){
					echo "<div class='alert alert-success' role='alert'>La imagen <b>" . $imagen->imagen . "</b> ha sido eliminada correctamente.</div>";
				}
			}else{
				echo "<div class='alert alert-danger' role='alert'><b>¡Ups!</b> No se pudo eliminar la imagen.</div>";
			}
		}else{
			header('Location: ' .RUTA_IR.'panel');
		}
	}

	public static function obtenerDatos($id){
		$imagen = new Imagen(Conexion::obtenerConexion());
		$imagen = $imagen->obtenerPorId($id);

		return $imagen;
	}

	public static function mostrarCarrusel1($id_usuario){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagenes = $imagen->obtenerTodosPor('id_usuario', $id_usuario);                        

		$a = 0;
		foreach($imagenes as $imagen){
			if($imagen->carpeta == $id_usuario && $imagen->subcarpeta == 'imagenes'){
				if($a == 0){
					echo '<li class="col-sm-3">';
					echo '<a class="thumbnail" id="carousel-selector-' .$a. '">';
					echo '<img src="imagenes/' .$id_usuario. '/imagenes/' .$imagen->imagen. '">';
					echo '</a>';
					echo '</li>';
				}else{
					echo '<li class="col-sm-3">';
					echo '<a class="thumbnail" id="carousel-selector-' .$a. '"><img src="imagenes/' .$id_usuario. '/imagenes/' .$imagen->imagen. '"></a>';
					echo '</li>';
				}

				$a++;
			}
		}
	}

	public static function mostrarCarrusel2($id_usuario){
		$imagen = new Imagen(Conexion::obtenerConexion());

		$imagenes = $imagen->obtenerTodosPor('id_usuario', $id_usuario);

         $a = 0;

		foreach($imagenes as $imagen){
			if($imagen->carpeta == $id_usuario && $imagen->subcarpeta == 'imagenes'){
				if($a == 0){
					echo '<div class="active item" data-slide-number="' .$a. '">';
					echo '<img src="imagenes/' .$id_usuario. '/imagenes/' .$imagen->imagen. '"></div>';
				}else{
					echo '<div class="item" data-slide-number="' .$a. '">';
					echo '<img src="imagenes/' .$id_usuario. '/imagenes/' .$imagen->imagen. '"></div>';
				}

				$a++;

				
			}
		}
	}

}

?>
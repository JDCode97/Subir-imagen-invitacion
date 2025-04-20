<?php  
include_once 'app/modelo/Usuario.php';
include_once 'app/controlador/ValidadorUsuario.php';
include_once 'app/controlador/ValidadorLogin.php';
include_once 'app/controlador/ControlSesion.php';

class UsuarioControlador{

	public static function login($usuario, $clave){
		$validador = new ValidadorLogin(Conexion::obtenerConexion(), $usuario, $clave);

		if($validador->obtenerError() == ""){
			$usu = new Usuario(Conexion::obtenerConexion());
			$u = $usu->obtenerPorId($validador->obtenerId());

			ControlSesion::iniciarSesion($u->id, $u->usuario, $u->admin);

			include_once 'app/modelo/Imagen.php';
			include_once 'app/controlador/ImagenControlador.php';

			ImagenControlador::crearCarpeta();
			header("Location: " .SERVIDOR );
		}else{
			$validador->mostrarError();
		}
	}

	public static function mostrar(){
		$usuario = new Usuario(Conexion::obtenerConexion());

		$usuarios = $usuario->obtenerTodos();

		foreach($usuarios as $u){
			echo "<tr>";
			echo "<td>" . $u->usuario . "</td>";
			echo "<td>";
			echo "<a href='" .RUTA_IR. "ver&id=" .$u->id. "'><button class='btn btn-warning'><i class='fas fa-trash'></i> Ver</button></a>";				
			echo "</td>";
			echo "</tr>";
		}
	}

	public static function insertar($usuario, $clave1, $clave2){
		$validador = new ValidadorUsuario(Conexion::obtenerConexion(), $usuario, "Nombre del salon", $clave1, $clave2, 1, 0); //Validamos los campos
		if($validador->registroValido()){ //Si devuelve true es que no hubo errores en las validaciones
			$usu = new Usuario(Conexion::obtenerConexion());

			if($usu->guardar($usuario, password_hash($clave1, PASSWORD_DEFAULT))){ 
				echo "<div class='alert alert-success' role='alert'>El usuario <b>" . $usuario . "</b> ha sido creado.</div>";
			}else{
				echo "<div class='alert alert-danger' role='alert'><b>¡Ups!</b> No se pudo agregar el usuario.</div>";
			}
		}else{
			$validador->mostrarErrores(); //Muestra todos los errores que pueda ocurrir en las validaciones
		}
	}

	public static function editar($usuario, $salon, $clave1, $clave2, $editar_clave, $id){
		$validador = new ValidadorUsuario(Conexion::obtenerConexion(), $usuario, $salon, $clave1, $clave2, $editar_clave, 1);
		
		if($validador->registroValido()){
			$usu = new Usuario(Conexion::obtenerConexion());

			if($editar_clave == 1){
				if($usu->editarClave(password_hash($clave1, PASSWORD_DEFAULT), $id)){
					if($usu->editar($usuario, $salon, $id)){
						echo "<div class='alert alert-success' role='alert'>El usuario <b>" . $usuario . "</b> ha sido editado. Refresque la página para efectuar los cambios.</div>";
					}
				}
			}else{
				if($usu->editar($usuario, $salon, $id)){
						echo "<div class='alert alert-success' role='alert'>El usuario <b>" . $usuario . "</b> ha sido editado. Refresque la página para efectuar los cambios.</div>";
				}
			}
		}else{
			$validador->mostrarErrores(); //Muestra todos los errores que pueda ocurrir en las validaciones
		}
	}

	public static function editarSalon($salon, $id){
		$usu = new Usuario(Conexion::obtenerConexion());

		if(isset($salon) && !empty($salon)){
			if($usu->editarSalon($salon, $id)){
				echo "<div class='alert alert-success' role='alert'>El nombre del salón ha sido editado. Refresque la página para efectuar los cambios.</div>";
			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>Faltan campos por rellenar.</div>";
		}
	}

	public static function cambiarClave($clave, $clave_nueva, $clave_nueva2, $id){
		$usu = new Usuario(Conexion::obtenerConexion());
		$usuario = $usu->obtenerPorId($id);

		if((isset($clave) && !empty($clave)) && (isset($clave_nueva) && !empty($clave_nueva)) && (isset($clave_nueva2) && !empty($clave_nueva2))){
			if($clave_nueva == $clave_nueva2){
				if(password_verify($clave, $usuario->clave)){
					if($usu->editarClave(password_hash($clave_nueva, PASSWORD_DEFAULT), $id)){
						echo "<div class='alert alert-success' role='alert'>Contraseña cambiada. Refresque la página para efectuar cambios</div>";
					}
				}else{
					echo "<div class='alert alert-danger' role='alert'>La contraseña es incorrecta.</div>";
				}
			}else{
				echo "<div class='alert alert-danger' role='alert'>Ambas contraseña deben coincidir.</div>";
			}
		}else{
			echo "<div class='alert alert-danger' role='alert'>Faltan campos por rellenar.</div>";
		}

	}

	public static function obtenerDatos($id){
		$usuario = new Usuario(Conexion::obtenerConexion());
		$usuario = $usuario->obtenerPorId($id);

		return $usuario;
	}

	public static function cambiarEstado($id, $estado){
		$usuario = new Usuario(Conexion::obtenerConexion());

		if($estado == 0){
			if($usuario->desactivar($id, 'activo')){
				echo "<div class='alert alert-success' role='alert'>El usuario ha sido desactivado. Refresque la página para efectuar los cambios.</div>";
			}
		}else if($estado == 1){
			if($usuario->activar($id, 'activo')){
				echo "<div class='alert alert-success' role='alert'>El usuario ha sido activado. Refresque la página para efectuar los cambios.</div>";
			}
		}
	}

}

?>
<?php  

Class ControlSesion{

	public static function iniciarSesion($id_usuario, $usuario, $admin){
		if(session_id() == ''){ //Sí la sesion no existe
			session_start();
		}

		$_SESSION['id_session'] = session_id();
		$_SESSION['id_usuario'] = $id_usuario;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['admin'] = $admin;
	}

	public static function cerrarSesion(){
		if(session_id() == ''){//Sí la sesion no existe
			session_start();
		}

		if(isset($_SESSION['id_session'])){
			unset($_SESSION['id_session']);
		}

		if(isset($_SESSION['id_usuario'])){
			unset($_SESSION['id_usuario']);
		}

		if(isset($_SESSION['usuario'])){
			unset($_SESSION['usuario']);
		}

		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}

		session_destroy();

	}

	public static function verificarSesion(){
		if(session_id() == ''){//Sí la sesion no existe
			session_start();
		}

		if(isset($_SESSION['id_usuario']) && isset($_SESSION['usuario'])){
			return true;
		}else{
			return false;
		}
	}

}

?>
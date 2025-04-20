<?php  
include_once 'Validador.php';

class ValidadorUsuario extends Validador{
	private $usuario;
	private $salon;
	private $clave;

	private $error_usuario;
	private $error_salon;
	private $error_clave1;
	private $error_clave2;

	private $conexion;
	
	public function __construct($conexion, $usuario, $salon, $clave1, $clave2, $validar_clave, $editar_usuario = 1){
		$this->conexion = $conexion;

		$this->usuario = $usuario;
		$this->salon = $salon;
		$this->clave = $clave1;

        $this->error_usuario = "";
        
		if($editar_usuario == 1){
			$this->error_usuario 		= $this->validarUsuario($usuario, 1);
			$this->error_salon			= $this->validarSalon($salon, 1);
		}else{
			$this->error_usuario 		= $this->validarUsuario($usuario);
			$this->error_salon 			= $this->validarSalon($salon);
		}
		
		$this->error_clave1 = $this->validarClave1($clave1);
		$this->error_clave2 = $this->validarClave2($clave1, $clave2);

		if($this->error_clave1 == "" && $this->error_clave2 == ""){
			$this->clave = $clave1;
		}

		if(!$validar_clave){
			$this->error_clave1 = "";
			$this->error_clave2 = "";
		}
	}

	public function validarUsuario($nombre, $editar = 0){
		if(!$this->variableIniciada($nombre)){
			return "Debes escribir un nombre usuario.";
		}

		if(strlen($nombre) < 4){
			return "El nombre de usuario debe ser más de 4 caracteres.";
		}

		if(strlen($nombre) > 50){
			return "El nombre de usuario debe ser menor de 50 caracteres.";
		}

		if($editar == 0){
			$usuario = new Usuario($this->conexion);

			if($usuario->obtenerPor("usuario", $nombre)  != ""){
				return "Este nombre de usuario ya está registrado.";
			}
		}
		return "";
	}

	public function validarSalon($nombre, $editar = 0){
		if(!$this->variableIniciada($nombre)){
			return "Debes escribir un nombre para el salón.";
		}

		if(strlen($nombre) > 60){
			return "El nombre del salón debe ser menor de 60 caracteres.";
		}

		if($editar == 0){
			$usuario = new Usuario($this->conexion);

			if($usuario->obtenerPor("salon", $nombre)  != ""){
				return "Este nombre de salón ya está registrado.";
			}
		}
		return "";
	}

	private function validarClave1($clave1){
		if(!$this->variableIniciada($clave1)){
			return "Debes escribir una contraseña.";
		}

		return "";		
	}

	private function validarClave2($clave1, $clave2){
		if(!$this->variableIniciada($clave1)){
			return "Primero debes rellenar la contraseña.";
		}
		if(!$this->variableIniciada($clave2)){
			return "Debes repetir la contraseña.";
		}

		if($clave1 != $clave2){
			return "Ambas contraseñas deben coincidir.";
		}

		return "";		
	}


	public function mostrarErrorUsuario(){
		if($this->error_usuario != ''){
			echo $this->aviso_inicio . $this->error_usuario . $this->aviso_cierre;
		}
	}

	public function mostrarErrorSalon(){
		if($this->error_salon != ''){
			echo $this->aviso_inicio . $this->error_salon . $this->aviso_cierre;
		}
	}

	public function mostrarErrorClave1(){
		if($this->error_clave1 !== ""){
			echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
		}
	}

	public function mostrarErrorClave2(){
		if($this->error_clave2 !== ""){
			echo $this->aviso_inicio . $this->error_clave2 . $this->aviso_cierre;
		}
	}

	public function mostrarErrores(){
		$this->mostrarErrorUsuario();
		$this->mostrarErrorSalon();
		$this->mostrarErrorClave1();
		$this->mostrarErrorClave2();
	}

	public function registroValido(){
		if($this->error_usuario == "" && $this->error_salon == "" && $this->error_clave1 == "" && $this->error_clave2 == ""){
			return true;
		}else{
			return false;
		}
	}

	public function validarCambios($usuario_original, $salon_original){
		if($this->usuario == $usuario_original){
			$this->error_usuario = "";
		}

		if($this->salon == $salon_original){
			$this->error_salon = "";
		}
		
	}
}

?>
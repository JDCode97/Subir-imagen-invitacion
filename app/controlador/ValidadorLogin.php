<?php  
include_once 'Validador.php';

class ValidadorLogin extends Validador{

	private $id;
	private $error;

	public function __construct($conexion, $nom_usuario, $clave){
		$this->id = "";
		$this->error = "";

		if(!$this->variableIniciada($nom_usuario) || !$this->variableIniciada($clave)){
			$this->error = "Debes introducir tu usuario y tu contraseña.";
		}else{
			$usu = new Usuario($conexion);
			$usuario = $usu->obtenerPor("usuario", $nom_usuario);

			if($usuario == "" || !password_verify($clave, $usuario->clave)){
				$this->error = "Datos incorrectos.";
			}

			if($usuario != ""){
				$this->id = $usuario->id;
				if($usuario->activo == 0){
					$this->error = "Este usuario se encuentra inactivo.";
				}
			}

		}
	}

	public function mostrarError(){
		if($this->error != ""){
			echo $this->aviso_inicio . $this->error . $this->aviso_cierre;
		}
	}

	public function obtenerId(){
		return $this->id;
	}

	public function obtenerError(){
		return $this->error;
	}

}

?>
<?php  
include_once 'BaseModelo.php';

class Usuario extends BaseModelo{

	private $id;
	private $usuario;
	private $clave;
	private $admin;

	public function __construct($conexion){
		$this->tabla = "usuario";
		$this->conexion = $conexion;
		parent::__construct($this->tabla, $this->conexion);
	}

	public function guardar($usuario, $clave){
		$resultado = false;

		if(isset($this->conexion)){
			try{
				$sql = "INSERT INTO $this->tabla (usuario, clave) VALUES(:usuario, :clave)";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":usuario", $usuario, PDO::PARAM_STR);
				$sentencia->bindParam(":clave", $clave, PDO::PARAM_STR);
				$resultado = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function editar($usuario, $salon, $id){
		$usuario_editado = false;
		
		if(isset($this->conexion)){
			try{
				$sql = "UPDATE $this->tabla SET usuario = :usuario, salon = :salon WHERE id = :id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":usuario", $usuario, PDO::PARAM_STR);
				$sentencia->bindParam(":salon", $salon, PDO::PARAM_STR);
				$sentencia->bindParam("id", $id, PDO::PARAM_STR);
				$usuario_editado = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $usuario_editado;
	}

	public function editarSalon($salon, $id){
		$usuario_editado = false;
		
		if(isset($this->conexion)){
			try{
				$sql = "UPDATE $this->tabla SET salon = :salon WHERE id = :id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":salon", $salon, PDO::PARAM_STR);
				$sentencia->bindParam("id", $id, PDO::PARAM_STR);
				$usuario_editado = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $usuario_editado;
	}

	public function editarClave($clave, $id){
		$usuario_editado = false;

		if(isset($this->conexion)){
			try{
				$sql = "UPDATE $this->tabla SET clave = :clave WHERE id = :id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":clave", $clave, PDO::PARAM_STR);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$usuario_editado = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $usuario_editado;
	}

}

?>
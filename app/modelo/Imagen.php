<?php  
include_once 'BaseModelo.php';

class Imagen extends BaseModelo{

	private $id;
	private $usuario;
	private $descripcion;
	private $carpeta;
	private $subcarpeta;
	private $imagen;

	public function __construct($conexion){
		$this->tabla = "imagen";
		$this->conexion = $conexion;
		parent::__construct($this->tabla, $this->conexion);
	}

	public function guardar($descripcion, $carpeta, $subcarpeta, $imagen){
		$resultado = false;

		if(isset($this->conexion)){
			try{
				$sql = "INSERT INTO $this->tabla (id_usuario, descripcion, carpeta, subcarpeta, imagen) VALUES(:id_usuario, :descripcion, :carpeta, :subcarpeta, :imagen)";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id_usuario", $_SESSION['id_usuario'], PDO::PARAM_STR);
				$sentencia->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
				$sentencia->bindParam(":carpeta", $carpeta, PDO::PARAM_STR);
				$sentencia->bindParam(":subcarpeta", $subcarpeta, PDO::PARAM_STR);
				$sentencia->bindParam(":imagen", $imagen, PDO::PARAM_STR);
				$resultado = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

}

?>
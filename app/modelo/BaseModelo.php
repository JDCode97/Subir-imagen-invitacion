<?php  

class BaseModelo{

	protected $tabla;
	protected $conexion;

	public function __construct($tabla, $conexion){
		$this->tabla = $tabla;
		$this->conexion = $conexion;
	}

	public function obtenerTodos(){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT * FROM  $this->tabla ORDER BY id DESC";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function obtenerTodosPorOrden($columna, $orden="ASC"){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT * FROM  $this->tabla ORDER BY $columna $orden";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function obtenerTodosPor($columna, $valor, $columna2 = "id", $orden = "ASC"){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT * FROM $this->tabla WHERE $columna=:valor ORDER BY $columna2 $orden";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":valor", $valor, PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function obtenerPorId($id){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT * FROM $this->tabla WHERE id=:id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function obtenerValorPorId($columna, $id){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT $columna FROM $this->tabla WHERE id=:id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetchColumn(); 
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function obtenerPor($columna, $valor){
		$resultado = "";

		if(isset($this->conexion)){
			try{
				$sql = "SELECT * FROM $this->tabla WHERE $columna=:valor";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":valor", $valor, PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $resultado;
	}

	public function borrarPorId($id){
		$borrado = false;

		if(isset($this->conexion)){
			try{
				$sql = "DELETE FROM $this->tabla WHERE id=:id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$borrado = $sentencia->execute();
			}catch(PDOException $ex){
				//print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $borrado;
	}

	public function borrarPor($columna, $valor){
		$borrado = false;

		if(isset($this->conexion)){
			try{
				$sql = "DELETE FROM $this->tabla WHERE $columna=:valor";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":valor", $valor, PDO::PARAM_STR);
				$borrado = $sentencia->execute();
			}catch(PDOException $ex){
				//print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $borrado;
	}


	public function activar($id, $columna){
		$cambio = "";

		if(isset($this->conexion)){
			try{
				$sql = "UPDATE $this->tabla SET $columna = 1 WHERE id=:id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$cambio = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $cambio;
	}

	public function desactivar($id, $columna){
		$cambio = "";

		if(isset($this->conexion)){
			try{
				$sql = "UPDATE $this->tabla SET $columna = 0 WHERE id=:id";
				$sentencia = $this->conexion->prepare($sql);
				$sentencia->bindParam(":id", $id, PDO::PARAM_STR);
				$cambio = $sentencia->execute();
			}catch(PDOException $ex){
				print 'ERROR ' . $ex->getMessage() . '<br>';
			}
		}

		return $cambio;
	}

}

?>

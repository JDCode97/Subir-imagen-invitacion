<?php  

class Conexion{

	private static $conexion;

	public static function abrirConexion(){
		if(!isset(self::$conexion)){ 
			try{
				self::$conexion = new PDO('mysql:host=' .NOMBRE_SERVIDOR.'; dbname=' .NOMBRE_BD, NOMBRE_USUARIO, PASSWORD );
				self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conexion->exec("SET CHARACTER SET utf8");
			}catch(PDOException $e){
				echo "ERROR: " . $e->getMessage() . "<br>";
				die(); //Termina la conexion en cualquier intento de abrirla
			}
		}
	}

	public static function cerrarConexion(){
		if(isset(self::$conexion)){
			self::$conexion = null;
		}
	}

	public static function obtenerConexion(){
		return self::$conexion;
	}

}

?>
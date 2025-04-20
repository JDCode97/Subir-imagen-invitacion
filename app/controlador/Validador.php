<?php  

class Validador{

	protected $aviso_inicio = "<div class='alert alert-danger' role='alert'>";
	protected $aviso_cierre = "</div>";

	protected $texto;

	public function __construct(){
	}

	protected function variableIniciada($variable){
		if(isset($variable) && !empty($variable)){
			return true;
		}else{
			return false;
		}
	}

	protected function validarTexto($texto){
		if(!$this->variableIniciada($texto)){
			return "El contenido no puede estar vacío.";
		}else{
			$this->texto = $texto;
		}
	}

}

?>
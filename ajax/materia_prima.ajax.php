<?php

require_once "../controladores/materia_prima.controlador.php";
require_once "../modelos/materia_prima.modelo.php";

class AjaxMateriaPrima{

	/*=============================================
	EDITAR MATERIA PRIMA
	=============================================*/	

	public $ID;

	public function ajaxEditarMateriaPrima(){

		$item = "ID";
		$valor = $this->ID;

		$respuesta = ControladorMateriaPrima::ctrMostrarMateriaPrima($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MATERIA PRIMA
=============================================*/	
if(isset($_POST["ID"])){

	$materiaPrima = new AjaxMateriaPrima();
	$materiaPrima -> ID = $_POST["ID"];
	$materiaPrima -> ajaxEditarMateriaPrima();
}

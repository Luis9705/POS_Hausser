<?php

require_once "../controladores/unidad.controlador.php";
require_once "../modelos/unidad.modelo.php";

class AjaxUnidad{

	/*=============================================
	EDITAR UNIDAD
	=============================================*/	

	public $unidadID;
	public $traerUnidades;

	public function ajaxEditarUnidad(){

		$item = "ID";
		$valor = $this->unidadID;

		$respuesta = ControladorUnidad::ctrMostrarUnidades($item, $valor);
		
		echo json_encode($respuesta);



	}

	public function ajaxTreaerUnidades(){

		if($this->traerUnidades == "Ok"){

			$item = null;
			$valor = null;

			$respuesta = ControladorUnidad::ctrMostrarUnidades($item, $valor);

			echo json_encode($respuesta);
		}



	}
}

/*=============================================
EDITAR UNIDAD
=============================================*/	
if(isset($_POST["unidadID"])){
	
	$unidad = new AjaxUnidad();
	$unidad -> unidadID = $_POST["unidadID"];
	$unidad -> ajaxEditarUnidad();
}

/*=============================================
TRAER UNIDADES
=============================================*/ 

if(isset($_POST["traerUnidades"])){

	$traerProductos = new AjaxUnidad();
	$traerProductos -> traerUnidades = $_POST["traerUnidades"];
	$traerProductos -> ajaxTreaerUnidades();

}
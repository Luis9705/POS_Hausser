<?php

require_once "../controladores/tamanio.controlador.php";
require_once "../modelos/tamanio.modelo.php";

class AjaxTamanio{

	/*=============================================
	EDITAR Tamanio
	=============================================*/	

	public $tamanioID;

	public function ajaxEditarTamanio(){

		$item = "ID";
		$valor = $this->tamanioID;

		$respuesta = ControladorTamanio::ctrMostrarTamanios($item, $valor);
		
		echo json_encode($respuesta);



	}
}

/*=============================================
EDITAR Tamanio
=============================================*/	
if(isset($_POST["tamanioID"])){
	
	$tamanio = new AjaxTamanio();
	$tamanio -> tamanioID = $_POST["tamanioID"];
	$tamanio -> ajaxEditarTamanio();
}
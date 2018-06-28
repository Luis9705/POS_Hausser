<?php

require_once "../controladores/uso.controlador.php";
require_once "../modelos/uso.modelo.php";

class AjaxUso{

	/*=============================================
	EDITAR USO
	=============================================*/	

	public $usoID;

	public function ajaxEditarUso(){

		$item = "usoID";
		$valor = $this->usoID;

		$respuesta = ControladorUso::ctrMostrarUsos($item, $valor);
		
		echo json_encode($respuesta);



	}
}

/*=============================================
EDITAR TIENDA
=============================================*/	
if(isset($_POST["usoID"])){
	
	$tienda = new AjaxUso();
	$tienda -> usoID = $_POST["usoID"];
	$tienda -> ajaxEditarUso();
}
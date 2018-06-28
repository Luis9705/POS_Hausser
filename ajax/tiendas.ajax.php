<?php

require_once "../controladores/tiendas.controlador.php";
require_once "../modelos/tiendas.modelo.php";

class AjaxTiendas{

	/*=============================================
	EDITAR TIENAD
	=============================================*/	

	public $tiendaID;

	public function ajaxEditarTiendas(){

		$item = "tiendaID";
		$valor = $this->tiendaID;

		$respuesta = ControladorTiendas::ctrMostrarTiendas($item, $valor);
		
		echo json_encode($respuesta);



	}
}

/*=============================================
EDITAR TIENDA
=============================================*/	
if(isset($_POST["tiendaID"])){
	
	$tienda = new AjaxTiendas();
	$tienda -> tiendaID = $_POST["tiendaID"];
	$tienda -> ajaxEditarTiendas();
}
<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $catID;

	public function ajaxEditarCategoria(){

		$item = "catID";
		$valor = $this->catID;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["catID"])){

	$categoria = new AjaxCategorias();
	$categoria -> catID = $_POST["catID"];
	$categoria -> ajaxEditarCategoria();
}

<?php

class ControladorMateriaPrima{

	/*=============================================
	CREAR MateriaPrima
	=============================================*/

	static public function ctrCrearMateriaPrima(){

		if(isset($_POST["nuevoID"])){


			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["nuevaDescripcion"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["nuevaCat"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["nuevaCantidad"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["nuevaUnidad"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["nuevoPrecio"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["precioUnitario"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["nuevaCantidadMin"]) &&				   			   
				preg_match('/^[0-9.,]+$/', $_POST["nuevoControlCal"])){

				$tabla = "materia_prima";

			$datos = array("ID" => $_POST["nuevoID"],
				"Nombre" => $_POST["nuevoNombre"],
				"Descripcion" => $_POST["nuevaDescripcion"],
				"catID" => $_POST["nuevaCat"],
				"cantidadLote" => $_POST["nuevaCantidad"],
				"unidadID" => $_POST["nuevaUnidad"],
				"precioLote" => $_POST["nuevoPrecio"],
				"precioUnitario" => $_POST["precioUnitario"],
				"cantidadMIN" => $_POST["nuevaCantidadMin"],
				"controlCalidad" => $_POST["nuevoControlCal"]);

			$respuesta = ModeloMateriaPrima::mdlIngresarMateriaPrima($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					type: "success",
					title: "La Materia Prima ha sido guardada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {

							window.location = "materia_prima";

						}
						})

						</script>';

					}


				}else{

					echo'<script>

					swal({
						type: "error",
						title: "¡Los campos no pueden ir vacíos o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

								window.location = "materia_prima";

							}
							})

							</script>';

						}

					}

				}

	/*=============================================
	MOSTRAR MateriaPrima
	=============================================*/

	static public function ctrMostrarMateriaPrima($item, $valor){

		$tabla = "materia_prima";

		$respuesta = ModeloMateriaPrima::mdlMostrarMateriaPrima($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR MateriaPrima
	=============================================*/

	static public function ctrEditarMateriaPrima(){

		if(isset($_POST["editarID"])){


			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["editarDescripcion"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["editarCat"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["editarCantidad"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.,]+$/', $_POST["editarUnidad"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["editarPrecio"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["editarPrecioUnitario"]) &&
				preg_match('/^[0-9.,]+$/', $_POST["editarCantidadMin"]) &&				   			   
				preg_match('/^[0-9.,]+$/', $_POST["editarControlCal"])){

				$tabla = "materia_prima";

			$datos = array("ID" => $_POST["editarID"],
				"Nombre" => $_POST["editarNombre"],
				"Descripcion" => $_POST["editarDescripcion"],
				"catID" => $_POST["editarCat"],
				"cantidadLote" => $_POST["editarCantidad"],
				"unidadID" => $_POST["editarUnidad"],
				"precioLote" => $_POST["editarPrecio"],
				"precioUnitario" => $_POST["editarPrecioUnitario"],
				"cantidadMIN" => $_POST["editarCantidadMin"],
				"controlCalidad" => $_POST["editarControlCal"]);

			$respuesta = ModeloMateriaPrima::mdlEditarMateriaPrima($tabla, $datos);
			var_dump($respuesta);
			if($respuesta == "ok"){

				echo'<script>

				swal({
					type: "success",
					title: "La materia prima ha sido cambiada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {

							window.location = "materia_prima";

						}
						})

						</script>';

					}


				}else{

					echo'<script>

					swal({
						type: "error",
						title: "¡Los campos no pueden ir vacíos o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {

								window.location = "materia_prima";

							}
							})

							</script>';

						}

					}

				}

	/*=============================================
	BORRAR MateriaPrima
	=============================================*/

	static public function ctrBorrarMateriaPrima(){

		if(isset($_GET["ID"])){

			$tabla ="materia_prima";
			$datos = $_GET["ID"];

			$respuesta = ModeloMateriaPrima::mdlBorrarMateriaPrima($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					type: "success",
					title: "La materia prima ha sido borrada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {

							window.location = "materia_prima";

						}
						})

						</script>';
					}
				}

			}
		}

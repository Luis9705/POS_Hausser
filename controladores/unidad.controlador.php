<?php

class ControladorUnidad{

	/*=============================================
	CREAR UNIDAD
	=============================================*/

	static public function ctrCrearUnidad(){

		if(isset($_POST["nuevoID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				$tabla = "unidad";

				$datos = array("ID" => $_POST["nuevoID"],
					           "Nombre" => $_POST["nuevoNombre"]);

				$respuesta = ModeloUnidad::mdlIngresarUnidad($tabla, $datos);



				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La unidad ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "unidad";

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

							window.location = "unidad";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR UNIDAD
	=============================================*/

	static public function ctrMostrarUnidades($item, $valor){

		$tabla = "unidad";

		$respuesta = ModeloUnidad::mdlMostrarUnidades($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TIENDA
	=============================================*/

	static public function ctrEditarUnidad(){

		if(isset($_POST["editarID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "unidad";

				$datos = array("ID" => $_POST["editarID"],
					           "Nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloUnidad::mdlEditarUnidad($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La unidad ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "unidad";

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

							window.location = "unidad";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIENDA
	=============================================*/

	static public function ctrBorrarUnidad(){

		if(isset($_GET["unidadID"])){

			$tabla ="unidad";
			$datos = $_GET["unidadID"];

			$respuesta = ModeloUnidad::mdlBorrarUnidad($tabla, $datos);



			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La unidad ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "unidad";

									}
								})

					</script>';
			}
		}
		
	}
}

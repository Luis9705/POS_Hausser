<?php

class ControladorTamanio{

	/*=============================================
	CREAR Tamanio
	=============================================*/

	static public function ctrCrearTamanio(){

		if(isset($_POST["nuevoID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				$tabla = "Tamanio";

				$datos = array("ID" => $_POST["nuevoID"],
					           "Nombre" => $_POST["nuevoNombre"]);

				$respuesta = ModeloTamanio::mdlIngresarTamanio($tabla, $datos);



				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tamaño ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tamanio";

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

							window.location = "tamanio";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TAMAÑO
	=============================================*/

	static public function ctrMostrarTamanios($item, $valor){

		$tabla = "Tamanio";

		$respuesta = ModeloTamanio::mdlMostrarTamanios($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TAMAÑo
	=============================================*/

	static public function ctrEditarTamanio(){

		if(isset($_POST["editarID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "Tamanio";

				$datos = array("ID" => $_POST["editarID"],
					           "Nombre" => $_POST["editarNombre"]);

				$respuesta = ModeloTamanio::mdlEditarTamanio($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tamaño ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tamanio";

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

							window.location = "tamanio";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIENDA
	=============================================*/

	static public function ctrBorrarTamanio(){

		if(isset($_GET["tamanioID"])){

			$tabla ="tamanio";
			$datos = $_GET["tamanioID"];

			$respuesta = ModeloTamanio::mdlBorrarTamanio($tabla, $datos);



			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tamaño ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tamanio";

									}
								})

					</script>';
			}
		}
		
	}
}

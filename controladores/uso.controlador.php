<?php

class ControladorUso{

	/*=============================================
	CREAR USO
	=============================================*/

	static public function ctrCrearUso(){

		if(isset($_POST["nuevoID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

				$tabla = "uso";

				$datos = array("usoID" => $_POST["nuevoID"],
					           "uNombre" => $_POST["nuevoNombre"],
					           "uDescripcion" => $_POST["nuevaDescripcion"]);

				$respuesta = ModeloUso::mdlIngresarUso($tabla, $datos);



				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El uso ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "uso";

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

							window.location = "uso";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIENDAS
	=============================================*/

	static public function ctrMostrarUsos($item, $valor){

		$tabla = "uso";

		$respuesta = ModeloUso::mdlMostrarUsos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR USO
	=============================================*/

	static public function ctrEditarUso(){

		if(isset($_POST["editarID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "uso";

				$datos = array("usoID" => $_POST["editarID"],
					           "uNombre" => $_POST["editarNombre"],
					           "uDescripcion" => $_POST["editarDescripcion"]);

				$respuesta = ModeloUso::mdlEditarUso($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El uso ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "uso";

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

							window.location = "uso";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USO
	=============================================*/

	static public function ctrBorrarUso(){

		if(isset($_GET["usoID"])){

			$tabla ="uso";
			$datos = $_GET["usoID"];

			$respuesta = ModeloUso::mdlBorrarUso($tabla, $datos);



			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El uso ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "uso";

									}
								})

					</script>';
			}
		}
		
	}
}

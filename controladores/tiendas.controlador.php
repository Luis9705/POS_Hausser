<?php

class ControladorTiendas{

	/*=============================================
	CREAR TIENDAS
	=============================================*/

	static public function ctrCrearTienda(){

		if(isset($_POST["nuevoID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

				$tabla = "tienda";

				$datos = array("tiendaID" => $_POST["nuevoID"],
					           "tNombre" => $_POST["nuevoNombre"],
					           "tDescripcion" => $_POST["nuevaDescripcion"]);

				$respuesta = ModeloTiendas::mdlIngresarTienda($tabla, $datos);



				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La tienda ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiendas";

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

							window.location = "tiendas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR TIENDAS
	=============================================*/

	static public function ctrMostrarTiendas($item, $valor){

		$tabla = "tienda";

		$respuesta = ModeloTiendas::mdlMostrarTiendas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR TIENDA
	=============================================*/

	static public function ctrEditarTienda(){

		if(isset($_POST["editarID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "tienda";

				$datos = array("tiendaID" => $_POST["editarID"],
					           "tNombre" => $_POST["editarNombre"],
					           "tDescripcion" => $_POST["editarDescripcion"]);

				$respuesta = ModeloTiendas::mdlEditarTienda($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La tienda ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiendas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La tienda no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "tiendas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR TIENDA
	=============================================*/

	static public function ctrBorrarTienda(){

		if(isset($_GET["tiendaID"])){

			$tabla ="tienda";
			$datos = $_GET["tiendaID"];

			$respuesta = ModeloTiendas::mdlBorrarTienda($tabla, $datos);



			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La tienda ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tiendas";

									}
								})

					</script>';
			}
		}
		
	}
}

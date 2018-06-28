<?php

class ControladorCategorias{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCategoria(){

		if(isset($_POST["nuevoID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevaTienda"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUso"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

				$tabla = "categoria";
				$nuevoPadre = !empty($_POST['nuevoPadre']) ? $_POST['nuevoPadre'] : NULL;
				$datos = array("catID" => $_POST["nuevoID"],
					           "catNombre" => $_POST["nuevoNombre"],
					           "tiendaID" => $_POST["nuevaTienda"],
					           "usoID" => $_POST["nuevoUso"],
					           "catPadreID" => $nuevoPadre,
					           "catDescripcion" => $_POST["nuevaDescripcion"]);

				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategoriasIngredientes($item, $valor){

		$tabla = "categoria";

		$respuesta = ModeloCategorias::mdlMostrarCategoriasIngredientes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarID"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarID"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarTienda"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUso"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

				$tabla = "categoria";
				$editarPadre = !empty($_POST['editarPadre']) ? $_POST['editarPadre'] : NULL;



				$datos = array("catID" => $_POST["editarID"],
					           "catNombre" => $_POST["editarNombre"],
					           "tiendaID" => $_POST["editarTienda"],
					           "usoID" => $_POST["editarUso"],
					           "catPadreID" => $editarPadre,
					           "catDescripcion" => $_POST["editarDescripcion"]);

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
				var_dump($respuesta);
				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCategoria(){

		if(isset($_GET["catID"])){

			$tabla ="categoria";
			$datos = $_GET["catID"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';
			}
		}
		
	}
}

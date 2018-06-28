<?php

require_once "conexion.php";

class ModeloMateriaPrima{

	/*=============================================
	CREAR MateriaPrima
	=============================================*/

	static public function mdlIngresarMateriaPrima($tabla, $datos){

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


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID, Nombre, Descripcion, catID, cantidadLote, unidadID, precioLote, precioUnitario, cantidadMIN, controlCalidad) VALUES (:ID, :Nombre, :Descripcion, :catID, :cantidadLote, :unidadID, :precioLote, :precioUnitario, :cantidadMIN, :controlCalidad)");

		$stmt->bindParam(":ID", $datos["ID"], PDO::PARAM_STR);
		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":catID", $datos["catID"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidadLote", $datos["cantidadLote"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadID", $datos["unidadID"], PDO::PARAM_STR);
		$stmt->bindParam(":precioLote", $datos["precioLote"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario", $datos["precioUnitario"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidadMIN", $datos["cantidadMIN"], PDO::PARAM_STR);
		$stmt->bindParam(":controlCalidad", $datos["controlCalidad"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MateriaPrima
	=============================================*/

	static public function mdlMostrarMateriaPrima($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR MateriaPrima
	=============================================*/

	static public function mdlEditarMateriaPrima($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre, Descripcion = :Descripcion, catID = :catID, cantidadLote = :cantidadLote, unidadID = :unidadID, precioLote = :precioLote, precioUnitario = :precioUnitario, cantidadMIN = :cantidadMIN, controlCalidad = :controlCalidad WHERE ID = :ID");




		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":catID", $datos["catID"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidadLote", $datos["cantidadLote"], PDO::PARAM_STR);
		$stmt->bindParam(":unidadID", $datos["unidadID"], PDO::PARAM_STR);
		$stmt->bindParam(":precioLote", $datos["precioLote"], PDO::PARAM_STR);
		$stmt->bindParam(":precioUnitario", $datos["precioUnitario"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidadMIN", $datos["cantidadMIN"], PDO::PARAM_STR);
		$stmt->bindParam(":controlCalidad", $datos["controlCalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":ID", $datos["ID"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR MateriaPrima
	=============================================*/

	static public function mdlBorrarMateriaPrima($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}


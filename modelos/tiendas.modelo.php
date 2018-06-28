<?php

require_once "conexion.php";

class ModeloTiendas{

	/*=============================================
	CREAR TIENDA
	=============================================*/

	static public function mdlIngresarTienda($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tiendaID, tNombre, tDescripcion) VALUES (:tiendaID, :tNombre, :tDescripcion)");

		$stmt->bindParam(":tiendaID", $datos["tiendaID"], PDO::PARAM_STR);
		$stmt->bindParam(":tNombre", $datos["tNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tDescripcion", $datos["tDescripcion"], PDO::PARAM_STR);

		var_dump($stmt);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR TIENDA
	=============================================*/

	static public function mdlMostrarTiendas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :id");

			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

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
	EDITAR TIENDA
	=============================================*/

	static public function mdlEditarTienda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tNombre = :tNombre, tDescripcion = :tDescripcion WHERE tiendaID = :tiendaID");

		$stmt -> bindParam(":tNombre", $datos["tNombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":tDescripcion", $datos["tDescripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":tiendaID", $datos["tiendaID"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR TIENDA
	=============================================*/

	static public function mdlBorrarTienda($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE tiendaID = :tiendaID");

		$stmt -> bindParam(":tiendaID", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}



		$stmt -> close();

		$stmt = null;

	}

}


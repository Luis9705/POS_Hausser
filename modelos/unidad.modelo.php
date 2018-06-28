<?php

require_once "conexion.php";

class ModeloUnidad{

	/*=============================================
	CREAR UNIDAD
	=============================================*/

	static public function mdlIngresarUnidad($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID, Nombre) VALUES (:ID, :Nombre)");

		$stmt->bindParam(":ID", $datos["ID"], PDO::PARAM_STR);
		$stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);

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
	MOSTRAR UNIDAD
	=============================================*/

	static public function mdlMostrarUnidades($tabla, $item, $valor){

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

	static public function mdlEditarUnidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :Nombre WHERE ID = :ID");

		$stmt -> bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID", $datos["ID"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR UNIDAD
	=============================================*/

	static public function mdlBorrarUnidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID = :ID");

		$stmt -> bindParam(":ID", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}



		$stmt -> close();

		$stmt = null;

	}

}


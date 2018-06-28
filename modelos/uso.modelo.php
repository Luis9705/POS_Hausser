<?php

require_once "conexion.php";

class ModeloUso{

	/*=============================================
	CREAR USO
	=============================================*/

	static public function mdlIngresarUso($tabla, $datos){



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usoID, uNombre, uDescripcion) VALUES (:usoID, :uNombre, :uDescripcion)");

		$stmt->bindParam(":usoID", $datos["usoID"], PDO::PARAM_STR);
		$stmt->bindParam(":uNombre", $datos["uNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":uDescripcion", $datos["uDescripcion"], PDO::PARAM_STR);

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
	MOSTRAR USO
	=============================================*/

	static public function mdlMostrarUsos($tabla, $item, $valor){

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
	EDITAR USO
	=============================================*/

	static public function mdlEditarUso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET uNombre = :uNombre, uDescripcion = :uDescripcion WHERE usoID = :usoID");

		$stmt -> bindParam(":uNombre", $datos["uNombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":uDescripcion", $datos["uDescripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":usoID", $datos["usoID"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR USO
	=============================================*/

	static public function mdlBorrarUso($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usoID = :usoID");

		$stmt -> bindParam(":usoID", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}



		$stmt -> close();

		$stmt = null;

	}

}


<?php

require_once "conexion.php";

class ModeloCategorias{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(catID, catNombre, tiendaID, usoID, catPadreID, catDescripcion) VALUES (:catID, :catNombre, :tiendaID, :usoID, :catPadreID, :catDescripcion)");

		$stmt->bindParam(":catID", $datos["catID"], PDO::PARAM_STR);
		$stmt->bindParam(":catNombre", $datos["catNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tiendaID", $datos["tiendaID"], PDO::PARAM_STR);
		$stmt->bindParam(":usoID", $datos["usoID"], PDO::PARAM_STR);
		$stmt->bindParam(":catPadreID", $datos["catPadreID"], PDO::PARAM_STR);
		$stmt->bindParam(":catDescripcion", $datos["catDescripcion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

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


		static public function mdlMostrarCategoriasIngredientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item WHERE NOT usoID = 'VE' ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE NOT usoID = 'VE'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET catNombre = :catNombre, tiendaID = :tiendaID, usoID = :usoID, catPadreID = :catPadreID, catDescripcion = :catDescripcion WHERE catID = :catID");


		$stmt->bindParam(":catNombre", $datos["catNombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tiendaID", $datos["tiendaID"], PDO::PARAM_STR);
		$stmt->bindParam(":usoID", $datos["usoID"], PDO::PARAM_STR);
		$stmt->bindParam(":catPadreID", $datos["catPadreID"], PDO::PARAM_STR);
		$stmt->bindParam(":catDescripcion", $datos["catDescripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":catID", $datos["catID"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE catID = :id");

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


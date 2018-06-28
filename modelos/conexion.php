<?php

class Conexion{

	static public function conectar(){

		$dsn = 'mysql:host=localhost;dbname=hausser';
		$username = 'Luis';
		$password = '12345678';
		$options = [];

		$link = new PDO($dsn, $username, $password, $options);
		$link->exec("set names utf8");

		return $link;

	}

}


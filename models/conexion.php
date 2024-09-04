<?php
class Conexion{
    public function conectarPagina(){
		$pdo = new PDO("mysql:host=localhost;dbname=creativepagina","root","");
		// Establece el modo de error de PDO para que las excepciones se lancen en caso de error
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Configura la codificación de caracteres para la conexión
		$pdo->exec("set names utf8mb4");
		return $pdo;
	}
	public function conectar(){
		$pdo = new PDO("mysql:host=localhost;dbname=junior","root","");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// Configura la codificación de caracteres para la conexión
		$pdo->exec("set names utf8mb4");
		return $pdo;
	}
}
<?php
class Conexion{
    public function conectarPagina(){
		$pdo = new PDO("mysql:host=localhost;dbname=creativepagina","root","");
		return $pdo;
	}
	public function conectar(){
		$pdo = new PDO("mysql:host=localhost;dbname=junior","root","");
		return $pdo;
	}
}
<?php
require_once 'conexion.php';
class ModeloMaps
{
    public $tabla = "maps";
    function agregarClienteModleo($dato)
    {
        $sql = "INSERT INTO $this->tabla(name, direccion, logo, lat, lng) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cliente'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['lit'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['long'], PDO::PARAM_STR);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
    function actualizarClienteModleo($dato)
    {
        $sql = "UPDATE $this->tabla SET name=?,direccion=?,logo=?,lat=?,lng=? WHERE id_maps = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cliente'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['lit'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['long'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['id'], PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
    function mostrarClienteModleo()
    {
        $sql = "SELECT * FROM $this->tabla";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        try {
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function obtenerListaPorID($id_maps)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_maps = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_maps, PDO::PARAM_INT);

        try {
            if ($stms->execute()) {
                echo json_encode($stms->fetch(PDO::FETCH_ASSOC));
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}
$ajax = new ModeloMaps();

if (isset($_POST['id_maps'])) {
    $id_maps = $_POST['id_maps'];
    $red = $ajax->obtenerListaPorID($id_maps);
}
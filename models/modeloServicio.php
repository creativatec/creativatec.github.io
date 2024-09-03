<?php
require_once 'conexion.php';
class ModeloServicio
{
    public $tabla = "servicio";
    function agregarServicioModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(logo,titulo,descripcion) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['desc'], PDO::PARAM_STR);
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
    function actualizarServicioModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET logo=?,titulo=?,descripcion=? WHERE id_servicio=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['desc'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['id'], PDO::PARAM_INT);
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

    function mostrarServico()
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

    function obtenerServicoPorID($id_servicio)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_servicio = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_servicio, PDO::PARAM_STR);

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

$ajax = new ModeloServicio();

if (isset($_POST['id_servicio'])) {
    $id_servicio = $_POST['id_servicio'];
    $red = $ajax->obtenerServicoPorID($id_servicio);
}

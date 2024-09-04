<?php

require_once 'conexion.php';
class ModeloClientePagina
{
    public $tabla = "cliente";
    function agregarClienteModleo($dato)
    {
        $sql = "INSERT INTO $this->tabla(logo,nombre_cliente,tel,dire,proyecto) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['cliente'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['proy'], PDO::PARAM_STR);
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
        $sql = "UPDATE $this->tabla SET logo=?,nombre_cliente=?,tel=?,dire=?,proyecto=? WHERE id_cliente = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['cliente'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['proy'], PDO::PARAM_STR);
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

    function obtenerListaPorID($id_cliente)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_cliente = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_cliente, PDO::PARAM_INT);

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
$ajax = new ModeloClientePagina();

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    $red = $ajax->obtenerListaPorID($id_cliente);
}
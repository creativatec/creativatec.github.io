<?php

require_once 'conexion.php';

class ModeloPrecio
{
    public $tabla = "precio";
    public $tabla1 = "lis_precio";
    function agregarPrecioModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(etiqueta,nombre_etiqueta,estilo,descripcion_estilo,precio,duracion) VALUES (?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['etiqueta'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nomEtiqueta'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['estilo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['precio'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['dura'], PDO::PARAM_STR);
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

    function actualzarPrecioModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET etiqueta=?,nombre_etiqueta=?,estilo=?,descripcion_estilo=?,precio=?,duracion=? WHERE id_precio=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['etiqueta'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nomEtiqueta'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['estilo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['precio'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['dura'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['id'], PDO::PARAM_INT);
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

    function mostrarPrecioModelo()
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

    function obtenerPrecioPorID($id_categoria_portafolio)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_precio = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_categoria_portafolio, PDO::PARAM_STR);

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
    ////LISTA PRECIO

    function agregarListaModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla1(descripcion,id_precio) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descripcionPrecio'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['id_precio'], PDO::PARAM_INT);
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
    function actualziarListaModelo($dato)
    {
        $sql = "UPDATE $this->tabla1 SET descripcion=?,id_precio=? WHERE id_lis_precio=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descripcionPrecio'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['id_precio'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['id'], PDO::PARAM_INT);
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

    function mostrarListaModelo()
    {
        $sql = "SELECT * FROM $this->tabla1 INNER JOIN precio ON precio.id_precio = lis_precio.id_precio";
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

    function obtenerListaPorID($id_lis_precio)
    {
        $sql = "SELECT * FROM $this->tabla1 WHERE id_lis_precio = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_lis_precio, PDO::PARAM_INT);

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
$ajax = new ModeloPrecio();

if (isset($_POST['id_preci'])) {
    $id_precio = $_POST['id_preci'];
    $red = $ajax->obtenerPrecioPorID($id_precio);
}
if (isset($_POST['id_lis_preci'])) {
    $id_lis_precio = $_POST['id_lis_preci'];
    $red = $ajax->obtenerListaPorID($id_lis_precio);
}
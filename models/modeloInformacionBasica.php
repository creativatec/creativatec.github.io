<?php
require_once 'conexion.php';
class ModeloInformacionBasica
{
    public $tabla = "info";
    

    function agregarInformacionBasicaModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(nombre_empresa, logo, correo, telefono1, telefono2, telefono3, direccion, footer_descripcion) VALUES (?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['correo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tel1'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['tel2'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['tel3'], PDO::PARAM_INT);
            $stms->bindParam(7, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['footer'], PDO::PARAM_STR);
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

    function ModeloInformacionBasicaModelo()
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

    function actualizarInformacionBasicaModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre_empresa=?,logo=?,correo=?,telefono1=?,telefono2=?,telefono3=?,direccion=?,footer_descripcion=? WHERE id_info=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['correo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tel1'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['tel2'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['tel3'], PDO::PARAM_INT);
            $stms->bindParam(7, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['footer'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['id'], PDO::PARAM_INT);
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

    //REDES

    public $tabla1 = "redes";
    function agregarRedesModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla1(logo, url) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['url'], PDO::PARAM_STR);
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

    function mostrarRedesModelo()
    {
        $sql = "SELECT * FROM $this->tabla1";
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

    function obtenerRedSocialPorID($id_redes)
    {
        $sql = "SELECT * FROM $this->tabla1 WHERE id_redes = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_redes, PDO::PARAM_STR);

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

    function actualizarRedesModelo($dato)
    {
        $sql = "UPDATE $this->tabla1 SET logo=?,url=? WHERE id_redes=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['url'], PDO::PARAM_STR);
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
}

$ajax = new ModeloInformacionBasica();

if (isset($_POST['id_rede'])) {
    $id_redes = $_POST['id_rede'];
    $red = $ajax->obtenerRedSocialPorID($id_redes);
}

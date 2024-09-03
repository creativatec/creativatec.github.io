<?php

require_once 'conexion.php';

class ModeloNosotros
{
    public $tabla = "sobre_nosotros";
    public $tabla1 = "info_nosotros";
    public $tabla2 = "info_sobre_nosotros";
    function agregarNosotrosModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(descripcion, titulo) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descri'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
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

    function actualizarNosotrosModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET descripcion=?, titulo=? WHERE id_sobre_nosotros=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descri'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
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

    function mostrarNosotros()
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

    function obtenerNotrosoPorID($id_sobre_nosotros)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_sobre_nosotros = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_sobre_nosotros, PDO::PARAM_STR);

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

    //INFO_NOSOTROS

    function agregarInfoNosotrosModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla1(cabecera, titulo1,titulo2,descripcion) VALUES (?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cabezera'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['Subtitulo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['descripcion'], PDO::PARAM_STR);
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

    function actualizarInfoNosotrosModelo($dato)
    {
        $sql = "UPDATE $this->tabla1 SET cabecera=?, titulo1=?,titulo2=?,descripcion=? WHERE id_info_nosotros=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cabezera'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['Subtitulo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['id'], PDO::PARAM_INT);
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

    function mostrarInfoNosotros()
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

    function obtenerInfoNotrosoPorID($id_sobre_nosotros)
    {
        $sql = "SELECT * FROM $this->tabla1 WHERE id_info_nosotros = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_sobre_nosotros, PDO::PARAM_STR);

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
    //INFO_SOBRE_NOSOTROS

    function agregarInfoSobreNosotrosModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla2(logo, titulo,descripcion) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['descripcion'], PDO::PARAM_STR);
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
    function actualizarInfoSobreNosotrosModelo($dato)
    {
        $sql = "UPDATE $this->tabla2 SET logo=?, titulo=?,descripcion=? WHERE id_info_sobre_nosotros=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['titulo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['descripcion'], PDO::PARAM_STR);
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
    function mostrarInfoSobreNosotros()
    {
        $sql = "SELECT * FROM $this->tabla2";
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

    function obtenerInfoSobreNotrosoPorID($id_info_sobre_nosotros)
    {
        $sql = "SELECT * FROM $this->tabla2 WHERE id_info_sobre_nosotros = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_info_sobre_nosotros, PDO::PARAM_STR);

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
$ajax = new ModeloNosotros();

if (isset($_POST['id_sobre_nosotros'])) {
    $id_sobre_nosotros = $_POST['id_sobre_nosotros'];
    $red = $ajax->obtenerNotrosoPorID($id_sobre_nosotros);
}

if (isset($_POST['id_info_nosotros'])) {
    $id_info_nosotros = $_POST['id_info_nosotros'];
    $red = $ajax->obtenerInfoNotrosoPorID($id_info_nosotros);
}

if (isset($_POST['id_info_sobre_nosotros'])) {
    $id_info_sobre_nosotros = $_POST['id_info_sobre_nosotros'];
    $red = $ajax->obtenerInfoSobreNotrosoPorID($id_info_sobre_nosotros);
}

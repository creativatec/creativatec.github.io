<?php

class ModeloCategoria
{
    public $tabla = "categoria";
    function agregarCategoriaModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (nombre_categoria, id_activo,id_local) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cate'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['activo'], PDO::PARAM_INT);
            $stms->bindParam(3, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function listarCategoriaModelo()
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN activo ON activo.id_activo = categoria.id_activo WHERE id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function consultarCategoriaAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE nombre_categoria like ? AND id_local = ? ORDER BY id_categoria ";
        } else {
            $sql = "SELECT * FROM $this->tabla WHERE id_local = ? ORDER BY id_categoria";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
                $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
            } else {
                $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function listarCategoriaIdModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN activo ON activo.id_activo = categoria.id_activo WHERE id_categoria = ? AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $id, PDO::PARAM_STR);
        $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function actualizarCategoriaModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre_categoria=?,id_activo=? WHERE id_categoria=? AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['cate'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['activo'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['id'], PDO::PARAM_INT);
            $stms->bindParam(4, $_SESSION['id_local'], PDO::PARAM_INT);
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


    ///tienda

    function agregarCategoria($nom)
    {
        $sql = "INSERT INTO $this->tabla (nombre) VALUE (?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $nom, PDO::PARAM_STR);
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

    function listarCategoria()
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

    function actualizarCategoria($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre = ? WHERE id_categoria = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $dato['nom'], PDO::PARAM_STR);
        $stms->bindParam(2, $dato['id'], PDO::PARAM_INT);
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

    function consultarCategoriaAjaxModeloTienda($dato)
    {
        $sql = "SELECT * FROM $this->tabla WHERE nombre like ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $nom = "%" . $dato . "%";
        $stms->bindParam(1, $nom, PDO::PARAM_STR);
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

    function eliminarCategoriaModelo($id)
    {
        $sql = "DELETE FROM $this->tabla WHERE id_categoria = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id, PDO::PARAM_INT);
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

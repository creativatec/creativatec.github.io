<?php
require_once 'conexion.php';
class ModeloPortafolio
{
    public $tabla = "portafolio";
    public $tabla1 = "categoria_portafolio";
    public $tabla2 = "proyectos";
    function agregarPortafolioModleo($dato)
    {
        $sql = "INSERT INTO $this->tabla(descripcion,nota) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nota'], PDO::PARAM_STR);
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
    function actualizarPortafolioModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET descripcion=?,nota=? WHERE id_portafolio=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nota'], PDO::PARAM_STR);
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

    function mostrarPortafolioModelo()
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

    function obtenerPortafolioPorID($id_portafolio)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_portafolio = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_portafolio, PDO::PARAM_STR);

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

    //Categoria Portafolio

    function agregarCategoriaPortafolioModleo($dato)
    {
        $sql = "INSERT INTO $this->tabla1(nombre,datafilter) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['data'], PDO::PARAM_STR);
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

    function actualizarCategoriaPortafolioModelo($dato)
    {
        $sql = "UPDATE $this->tabla1 SET nombre=?,datafilter=? WHERE id_categoria_portafolio=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['data'], PDO::PARAM_STR);
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

    function mostrarCategoriaPortafolioModelo()
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

    function obtenerCategoriaPortafolioPorID($id_categoria_portafolio)
    {
        $sql = "SELECT * FROM $this->tabla1 WHERE id_categoria_portafolio = ?";
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

    //Proyecto

    function agregarProyectoModleo($dato)
    {
        $sql = "INSERT INTO $this->tabla2(logo, nombre, descripcion, foto1, descripcion1, descripcion2, descripcion3, foto2, Origen, Finalización_Proyecto, Valor, Disenador, id_categoria_portafolio) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['foto1'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['descripcion1'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['descripcion2'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['descripcion3'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['foto2'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['Origen'], PDO::PARAM_STR);
            $stms->bindParam(10, $dato['Finalización_Proyecto'], PDO::PARAM_STR);
            $stms->bindParam(11, $dato['Valor'], PDO::PARAM_INT);
            $stms->bindParam(12, $dato['Disenador'], PDO::PARAM_STR);
            $stms->bindParam(13, $dato['id_categoria_portafolio'], PDO::PARAM_INT);
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

    function actualziarProyectoModleo($dato)
    {
        $sql = "UPDATE $this->tabla2 SET logo=?, nombre=?, descripcion=?, foto1=?, descripcion1=?, descripcion2=?, descripcion3=?, foto2=?, Origen=?, Finalización_Proyecto=?, Valor=?, Disenador=?, id_categoria_portafolio=? WHERE id_proyecto=?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['logo'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['descripcion'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['foto1'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['descripcion1'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['descripcion2'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['descripcion3'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['foto2'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['Origen'], PDO::PARAM_STR);
            $stms->bindParam(10, $dato['Finalización_Proyecto'], PDO::PARAM_STR);
            $stms->bindParam(11, $dato['Valor'], PDO::PARAM_INT);
            $stms->bindParam(12, $dato['Disenador'], PDO::PARAM_STR);
            $stms->bindParam(13, $dato['id_categoria_portafolio'], PDO::PARAM_INT);
            $stms->bindParam(14, $dato['id'], PDO::PARAM_INT);
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

    function mostrarProyectoModelo()
    {
        $sql = "SELECT *, proyectos.nombre AS proyecto FROM $this->tabla2 INNER JOIN categoria_portafolio ON categoria_portafolio.id_categoria_portafolio = proyectos.id_categoria_portafolio";
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

    function obtenerProyectoPorID($id_categoria_portafolio)
    {
        $sql = "SELECT * FROM $this->tabla2 WHERE id_proyecto = ?";
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
}
$ajax = new ModeloPortafolio();

if (isset($_POST['id_portafoli'])) {
    $id_portafolio = $_POST['id_portafoli'];
    $red = $ajax->obtenerPortafolioPorID($id_portafolio);
}
if (isset($_POST['id_categoria_portafoli'])) {
    $id_categoria_portafolio = $_POST['id_categoria_portafoli'];
    $red = $ajax->obtenerCategoriaPortafolioPorID($id_categoria_portafolio);
}
if (isset($_POST['id_proyect'])) {
    $id_proyecto = $_POST['id_proyect'];
    $red = $ajax->obtenerProyectoPorID($id_proyecto);
}

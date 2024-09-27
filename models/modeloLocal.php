<?php
require_once 'conexion.php';
class ModeloLocal
{
    public $tabla = "local";
    public $tabla2 = "sistema";
    public $tabla3 = "establecimiento";
    function agregarLocalModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (nombre_local, nit, direccion, telefono, inicio, fin, plazo,id_sistema,id_establecimiento) VALUES (?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['local'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nit'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tel'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['inicio'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['fin'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['plazo'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['sistema'], PDO::PARAM_INT);
            $stms->bindParam(9, $dato['estable'], PDO::PARAM_INT);
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

    function obtenerUltimoID()
    {
        $sql = "SELECT MAX(id_local) FROM $this->tabla;";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function listarModeloModelo()
    {
        if (isset($_SESSION['id_local'])) {
            $sql = "SELECT * FROM $this->tabla WHERE id_local = ?";
        } else {
            $sql = "SELECT * FROM $this->tabla";
        }

        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if (isset($_SESSION['id_local'])) {
            $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
        }
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

    function consultarLocalModelo($id)
    {

        $sql = "SELECT * FROM $this->tabla WHERE id_local = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($id != '') {
                $stms->bindParam(1, $id, PDO::PARAM_INT);
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

    function consultarModeloAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE nombre_local like ? ORDER BY id_local ";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY id_local";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
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

    function actualizarLocalAdminModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre_local=?,nit=?,direccion=?,telefono=?,inicio=?,fin=?,plazo=?,id_sistema=?,id_establecimiento=? WHERE id_local=?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['local'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nit'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tel'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['inicio'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['fin'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['plazo'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['sistema'], PDO::PARAM_INT);
            $stms->bindParam(9, $dato['estable'], PDO::PARAM_INT);
            $stms->bindParam(10, $dato['id'], PDO::PARAM_INT);
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
    
    function actualizarLocalModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre_local=?,nit=?,direccion=?,telefono=?,ip=? WHERE id_local=?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['local'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nit'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tel'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['ip'], PDO::PARAM_STR);
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

    function eliminarLocalIdModelo($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=1";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                $sql = "DELETE FROM $this->tabla WHERE id_local = ?";

                try {
                    $conn = new Conexion();
                    $stms = $conn->conectar()->prepare($sql);
                    $stms->bindParam(1, $id, PDO::PARAM_INT);
                    if ($stms->execute()) {
                        return true;
                    } else {
                        return false;
                    }
                } catch (PDOException $e) {
                    print_r($e->getMessage());
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function obtenerLocalPorID($id_local)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $id_local, PDO::PARAM_STR);

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

    function listarTablasLocal()
    {
        $sql = "SELECT table_name FROM information_schema.columns WHERE column_name = 'id_local' AND table_schema = 'junior'";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);

        try {
            if ($stms->execute()) {
                return $stms->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function obtenerTablasPorID($tabla, $id_local)
    {
        $sql = "DELETE FROM $tabla WHERE id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $id_local, PDO::PARAM_INT);

        try {
            if ($stms->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al eliminar']);
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function listarSistemaModelo()
    {
        $sql = "SELECT * FROM $this->tabla2";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);

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

    function listarEstablecimientoModelo()
    {
        $sql = "SELECT * FROM $this->tabla3";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);

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
}
$ajax = new ModeloLocal();

if (isset($_POST['id_loca'])) {
    $id_local = $_POST['id_loca'];
    $red = $ajax->obtenerLocalPorID($id_local);
}

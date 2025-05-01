<?php
require_once 'conexion.php';
class ModeloUsuario
{
    public $tabla = "usuario";
    public $tabla1 = "usuariotienda";

    function ModeloLoginIngresarPagina($dato)
    {
        $sql = "SELECT * FROM $this->tabla WHERE nombre = ? AND clave = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['user'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['clave'], PDO::PARAM_STR);
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

    function ModeloLoginIngresar($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo WHERE usuario = ? AND clave = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['user'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['clave'], PDO::PARAM_STR);
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

    function ModeloLoginIngresarTienda($dato)
    {
        $sql = "SELECT * FROM $this->tabla1 WHERE usuario = ? AND clave = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['user'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['clave'], PDO::PARAM_STR);
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

    function agregarUsuarioModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, usuario, clave, id_rol, id_activo, id_local) VALUES (?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            if (isset($_SESSION['rol'])) {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['user'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['clave'], PDO::PARAM_STR);
                $stms->bindParam(7, $dato['rol'], PDO::PARAM_INT);
                $stms->bindParam(8, $dato['activo'], PDO::PARAM_INT);
                $stms->bindParam(9, $_SESSION['id_local'], PDO::PARAM_INT);
            } else {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['user'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['clave'], PDO::PARAM_STR);
                $stms->bindParam(7, $dato['rol'], PDO::PARAM_INT);
                $stms->bindParam(8, $dato['activo'], PDO::PARAM_INT);
                $stms->bindParam(9, $dato['local'], PDO::PARAM_INT);
            }
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

    function listarModeloUsuario()
    {
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == "Administrador") {
                $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE local.id_local = ?";
            } else {
                $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE local.id_local = ?";
            }
        } else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local";
        }

        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if (isset($_SESSION['rol'])) {
            if ($_SESSION['rol'] == "Administrador") {
                $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
            } else {
                $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
            }
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

    function consultarUsuarioPerfilModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE id_usuario = ? AND usuario.id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($id != '') {
            $stms->bindParam(1, $id, PDO::PARAM_INT);
            $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function listarUsuarioNominaModelo()
    {
        if ($_SESSION['rol'] == "Administrador") {
            $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE local.id_local = ?";
        } else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE local.id_local = ?";
        }
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($_SESSION['rol'] == "Administrador") {
            $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
        } else {
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

    function listarUsuarioIdModelo($id)
    {
        if (isset($_SESSION['rol'])) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE id_usuario = ? AND usuario.id_local = ?";
        } else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN rol ON rol.id_rol = usuario.id_rol INNER JOIN activo ON activo.id_activo = usuario.id_activo INNER JOIN local ON local.id_local = usuario.id_local WHERE id_usuario = ?";
        }
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if (isset($_SESSION['rol'])) {
            if ($id != '') {
                $stms->bindParam(1, $id, PDO::PARAM_INT);
                $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
            }
        } else {
            $stms->bindParam(1, $id, PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                if (isset($_SESSION['rol'])) {
                    return $stms->fetchAll();
                } else {
                    echo json_encode($stms->fetch(PDO::FETCH_ASSOC));
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarUsuarioModelo($dato)
    {
        if (isset($_SESSION['rol'])) {
            $sql = "UPDATE $this->tabla SET primer_nombre=?,segundo_nombre=?,primer_apellido=?,segundo_apellido=?,usuario=?,clave=?,id_rol=?,id_activo=?,id_local= ? WHERE id_usuario = ? AND id_local = ?";
        } else {
            $sql = "UPDATE $this->tabla SET primer_nombre=?,segundo_nombre=?,primer_apellido=?,segundo_apellido=?,usuario=?,clave=?,id_rol=?,id_activo=?,id_local= ? WHERE id_usuario = ?";
        }
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            if (isset($_SESSION['rol'])) {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['user'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['clave'], PDO::PARAM_STR);
                $stms->bindParam(7, $dato['rol'], PDO::PARAM_INT);
                $stms->bindParam(8, $dato['activo'], PDO::PARAM_INT);
                $stms->bindParam(9, $_SESSION['id_local'], PDO::PARAM_INT);
                $stms->bindParam(10, $dato['id'], PDO::PARAM_INT);
                $stms->bindParam(11, $_SESSION['id_local'], PDO::PARAM_INT);
            } else {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['user'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['clave'], PDO::PARAM_STR);
                $stms->bindParam(7, $dato['rol'], PDO::PARAM_INT);
                $stms->bindParam(8, $dato['activo'], PDO::PARAM_INT);
                $stms->bindParam(9, $dato['local'], PDO::PARAM_INT);
                $stms->bindParam(10, $dato['id'], PDO::PARAM_INT);
            }
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

    function eliminarUsuarioIdModelo($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=1";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                $sql = "DELETE FROM $this->tabla WHERE id_usuario = ? AND id_local = ?";

                try {
                    $conn = new Conexion();
                    $stms = $conn->conectar()->prepare($sql);
                    $stms->bindParam(1, $id, PDO::PARAM_INT);
                    $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
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
}
$ajax = new ModeloUsuario();

if (isset($_POST['id_usuari'])) {
    $id_usuario = $_POST['id_usuari'];
    $red = $ajax->listarUsuarioIdModelo($id_usuario);
}

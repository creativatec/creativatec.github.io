
<?php

class ModeloNavegacion
{
    public $tabla  = "navegacion";

    function agregarNavegacionModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (nombre_empresa, correo, tel1, tel2, direccion, ubicacion, info, logo) VALUES (?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['correo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel1'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['tel2'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['ubi'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['footer'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['logo'], PDO::PARAM_STR);
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

    function listarNavegacionModelo()
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

    function actualizarNavegacionModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET nombre_empresa = ?, correo = ?, tel1 = ?, tel2 = ?, direccion = ?, ubicacion = ?, info = ?, logo = ? WHERE id_navegacion = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['correo'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['tel1'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['tel2'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['dire'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['ubi'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['footer'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['logo'], PDO::PARAM_STR);
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
}

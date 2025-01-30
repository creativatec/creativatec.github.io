<?php

class ModeloCliente
{
    public $tabla = 'cliente';

    function agregarClienteModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_cc, correo, id_local) VALUES (?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            if (isset($_SESSION['rol'])) {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['cc'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['email'], PDO::PARAM_STR);
                $stms->bindParam(7, $_SESSION['id_local'], PDO::PARAM_INT);
            } else {
                $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['cc'], PDO::PARAM_STR);
                $stms->bindParam(6, $dato['email'], PDO::PARAM_STR);
                $stms->bindParam(7, $dato['local'], PDO::PARAM_INT);
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

    function listarModeloCliente()
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN local ON local.id_local = cliente.id_local WHERE cliente.id_local = ?";
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

    function consultarClienteAjaxModelo($dato)
    {
        if ($dato != '') {
            $sql = "SELECT * FROM $this->tabla WHERE numero_cc like '%$dato%' AND id_local = ? ORDER BY id_cliente";
        } else {
            $sql = "SELECT * FROM $this->tabla WHERE id_local = ? ORDER BY id_cliente";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function mostrarClienteFacturaVentaModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_cliente = ? AND id_local = ?";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($id != null) {
                $stms->bindParam(1, $id, PDO::PARAM_INT);
                $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarClienteModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET primer_nombre=?,segundo_nombre=?,primer_apellido=?,segundo_apellido=?,numero_cc=?,correo=?,id_local=? WHERE id_cliente=? AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['priNombre'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['segNombre'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['priApellido'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['segApellido'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['cc'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['email'], PDO::PARAM_STR);
            $stms->bindParam(7, $_SESSION['id_local'], PDO::PARAM_INT);
            $stms->bindParam(8, $dato['id'], PDO::PARAM_INT);
            $stms->bindParam(9, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function consumidorFinalCompraModelo()
    {
        $sql = "SELECT * FROM $this->tabla WHERE numero_cc LIKE '1111%' AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $_SESSION['id_local'], PDO::PARAM_INT);
        try {
            if ($stms->execute()) {
                return $stms->fetchAll();;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function eliminarClienteIdModelo($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=1";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                $sql = "DELETE FROM $this->tabla WHERE id_cliente = ? AND id_local = ?";

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

    function actualizarCLienteAjax($dato)
    {
        $sql = "UPDATE $this->tabla SET nombres = ?, apellidos = ?, correo = ?, tel = ?, dire1 = ?, dire2 = ?, ciudad = ?, barrio = ?, codigo_postal = ? WHERE id_cliente = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $dato['nombres'], PDO::PARAM_STR);
        $stms->bindParam(2, $dato['apellidos'], PDO::PARAM_STR);
        $stms->bindParam(3, $dato['correo'], PDO::PARAM_STR);
        $stms->bindParam(4, $dato['telefono'], PDO::PARAM_INT);
        $stms->bindParam(5, $dato['direccion1'], PDO::PARAM_STR);
        $stms->bindParam(6, $dato['direccion2'], PDO::PARAM_STR);
        $stms->bindParam(7, $dato['ciudad'], PDO::PARAM_STR);
        $stms->bindParam(8, $dato['barrio'], PDO::PARAM_STR);
        $stms->bindParam(9, $dato['codigoPostal'], PDO::PARAM_INT);
        $stms->bindParam(10, $dato['id_cliente'], PDO::PARAM_INT);
        try {
            if ($stms->execute()) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
////////////////
    function registrarConsultarCLienteAjax($dato)
    {

        $sql = "SELECT * FROM $this->tabla WHERE nombres = ? AND apellidos = ? AND correo = ? AND tel = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);

        // Asociamos los parámetros con los valores del array $dato
        $stms->bindParam(1, $dato['nombres'], PDO::PARAM_STR);
        $stms->bindParam(2, $dato['apellidos'], PDO::PARAM_STR);
        $stms->bindParam(3, $dato['correo'], PDO::PARAM_STR);
        $stms->bindParam(4, $dato['telefono'], PDO::PARAM_INT);

        try {
            // Ejecutar la consulta y verificar si fue exitosa
            if ($stms->execute()) {
                $cliente = $stms->fetch(PDO::FETCH_ASSOC);
                if ($cliente) {
                    // Si se encuentra el cliente, devolvemos los datos del cliente
                    echo json_encode([
                        'found' => true,
                        'id_cliente' => $cliente['id_cliente'],  // Devolver el id_cliente encontrado
                        'direccion1' => $cliente['dire1'],
                        'direccion2' => $cliente['dire2'],
                        'ciudad' => $cliente['ciudad'],
                        'barrio' => $cliente['barrio'],
                        'codigoPostal' => $cliente['codigo_postal'],
                        'correo' => $cliente['correo'],
                        'tel' => $cliente['tel'],
                        'buyerFullName' => $dato['nombres'] . " " . $dato['apellidos']
                    ]);
                } else {
                    $sql = "INSERT INTO $this->tabla (nombres, apellidos, correo, tel) VALUES (?,?,?,?)";
                    $conn = new Conexion();
                    $stms = $conn->conectar()->prepare($sql);

                    // Asociamos los parámetros con los valores del array $dato
                    $stms->bindParam(1, $dato['nombres'], PDO::PARAM_STR);
                    $stms->bindParam(2, $dato['apellidos'], PDO::PARAM_STR);
                    $stms->bindParam(3, $dato['correo'], PDO::PARAM_STR);
                    $stms->bindParam(4, $dato['telefono'], PDO::PARAM_INT);

                    try {
                        // Ejecutar la consulta y verificar si fue exitosa
                        if ($stms->execute()) {
                            $sql = "SELECT MAX(id_cliente) FROM $this->tabla";
                            $conn = new Conexion();
                            $stms = $conn->conectar()->prepare($sql);
                            try {
                                if ($stms->execute()) {
                                    $id_cliente = $stms->fetchAll();
                                } else {
                                    return false;
                                }
                            } catch (PDOException $e) {
                                print_r($e->getMessage());
                            }
                            // Devolver el ID del cliente recién creado
                            echo json_encode([
                                'found' => false,  // Indicar que no se encontró un cliente previamente
                                'id_cliente' => $id_cliente[0]['MAX(id_cliente)']  // Devolver el ID del cliente recién creado
                            ]);
                        } else {
                            echo json_encode(['success' => false]);
                        }
                    } catch (PDOException $e) {
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                }
            } else {
                echo json_encode(['success' => false]);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    function listarClientes()
    {
        $sql = "SELECT * FROM $this->tabla";
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

    function eliminarClienteIdMasivo($dato){
        $sql = "DELETE FROM $this->tabla WHERE id_cliente = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        $stms->bindParam(1, $dato, PDO::PARAM_INT);
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

<?php

class ModeloProducto
{
    public $tabla = "producto";
    public $tabla1 = "productos";
    function agregarProductoModelo($id_proeevedor, $codigo, $nombre, $precio, $cantidad, $id_categoria, $id_medida, $id_impuesto, $id_local)
    {
        $sql = "INSERT INTO $this->tabla (id_proeevedor, codigo_producto, nombre_producto, precio_unitario, cantidad_producto, id_categoria, id_medida,id_impuesto, id_local) VALUES (?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($codigo != '') {
            $stms->bindParam(1, $id_proeevedor, PDO::PARAM_INT);
            $stms->bindParam(2, $codigo, PDO::PARAM_INT);
            $stms->bindParam(3, $nombre, PDO::PARAM_STR);
            $stms->bindParam(4, $precio, PDO::PARAM_INT);
            $stms->bindParam(5, $cantidad, PDO::PARAM_INT);
            $stms->bindParam(6, $id_categoria, PDO::PARAM_INT);
            $stms->bindParam(7, $id_medida, PDO::PARAM_INT);
            $stms->bindParam(8, $id_impuesto, PDO::PARAM_INT);
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

    function listarProductoModelo()
    {
        if ($_SESSION['rol'] == "Administrador") {
            $id = $_SESSION['id_local'];
            $sql = "SELECT * FROM $this->tabla INNER JOIN proeevedor ON proeevedor.id_proeevedor = producto.id_proeevedor INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE producto.id_local = $id";
        } else {
            $id = $_SESSION['id_local'];
            $sql = "SELECT * FROM $this->tabla INNER JOIN proeevedor ON proeevedor.id_proeevedor = producto.id_proeevedor INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE producto.id_local = $id";
        }
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

    function listarProductoExcelModelo()
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN proeevedor ON proeevedor.id_proeevedor = producto.id_proeevedor INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE producto.id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
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

    function consultarModeloProductoAjaxModelo($dato,$id)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE nombre_producto like ? AND producto.id_local = ? ORDER BY id_producto";
        } else {
            $sql = "SELECT * FROM $this->tabla WHERE id_local = ? ORDER BY id_producto";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($id == null) {
                $local = $_SESSION['id_local'];
            }else{
                $local = $id;
            }
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
                $stms->bindParam(2, $local, PDO::PARAM_INT);
            }else{
                $stms->bindParam(1, $local, PDO::PARAM_INT);
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

    function consultarProductoModelo($id)
    {

        $sql = "SELECT * FROM $this->tabla WHERE id_producto = ? AND id_local=?";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $id, PDO::PARAM_INT);
            $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultarAritucloProeevedoridAjaxModelo($nit)
    {

        $sql = "SELECT * FROM $this->tabla WHERE nombre_producto like ? AND id_local = ?";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($nit != null) {
                $nombre = '%' . $nit . '%';
                $nit = $nit . '%';
                $stms->bindParam(1, $nombre, PDO::PARAM_STR);
                $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function consultarAritucloProeevedornitAjaxModelo($nit){
        $sql = "SELECT * FROM $this->tabla WHERE codigo_producto like ? AND id_local = ?";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($nit != null) {
                $nombre = '%' . $nit . '%';
                $nit = $nit . '%';
                $stms->bindParam(1, $nombre, PDO::PARAM_STR);
                $stms->bindParam(2, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function consultarAritucloProeevedorAjaxModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla WHERE id_producto = ? AND id_local = ?";

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
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function mostrarArticuloModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla  WHERE id_producto = ? AND id_local = ?";

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
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarProductoFacturaModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET cantidad_producto=? WHERE id_producto=? AND id_local = ?";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['cantidad'], PDO::PARAM_INT);
                $stms->bindParam(2, $dato['id_producto'], PDO::PARAM_INT);
                $stms->bindParam(3, $_SESSION['id_local'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarProductoModelo($id, $id_proeevedor, $codigo, $nombre, $precio, $cantidad, $id_categoria, $id_medida, $id_impuesto, $id_local)
    {
        $sql = "UPDATE $this->tabla SET id_proeevedor=?,codigo_producto=?,nombre_producto=?,precio_unitario=?,cantidad_producto=?,id_categoria=?,id_medida=?,id_impuesto=?, id_local=? WHERE id_producto=? AND id_local = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($codigo != '') {
            $stms->bindParam(1, $id_proeevedor, PDO::PARAM_INT);
            $stms->bindParam(2, $codigo, PDO::PARAM_INT);
            $stms->bindParam(3, $nombre, PDO::PARAM_STR);
            $stms->bindParam(4, $precio, PDO::PARAM_INT);
            $stms->bindParam(5, $cantidad, PDO::PARAM_INT);
            $stms->bindParam(6, $id_categoria, PDO::PARAM_INT);
            $stms->bindParam(7, $id_medida, PDO::PARAM_INT);
            $stms->bindParam(8, $id_impuesto, PDO::PARAM_INT);
            $stms->bindParam(9, $id_local, PDO::PARAM_INT);
            $stms->bindParam(10, $id, PDO::PARAM_INT);
            $stms->bindParam(11, $_SESSION['id_local'], PDO::PARAM_INT);
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

    function alertarProductosFaltanteModelo()
    {
        if ($_SESSION['rol'] == "Administrador") {
            $id = $_SESSION['id_local'];
            $sql = "SELECT * FROM $this->tabla INNER JOIN proeevedor ON proeevedor.id_proeevedor = producto.id_proeevedor INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE producto.id_local = $id";
        } else {
            $id = $_SESSION['id_local'];
            $sql = "SELECT * FROM $this->tabla INNER JOIN proeevedor ON proeevedor.id_proeevedor = producto.id_proeevedor INNER JOIN categoria ON categoria.id_categoria = producto.id_categoria INNER JOIN medida ON medida.id_medida = producto.id_medida INNER JOIN local ON local.id_local = producto.id_local WHERE producto.id_local = $id";
        }
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

    function eliminaProductoIdModelo($id)
    {
        $sql = "SET FOREIGN_KEY_CHECKS=1";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                $sql = "DELETE FROM $this->tabla WHERE id_producto = ? AND id_local=?";

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
////////////////
    function agregarProductoModeloTienda($dato)
    {
        $sql = "INSERT INTO $this->tabla1(nombre,precio,precio_descuento,cantidad,id_categoria) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nom'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['precio'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['precioPromo'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['cant'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['id_categoria'], PDO::PARAM_INT);
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

    function obtenerUltimoIdProducto()
    {
        $sql = "SELECT MAX(id_producto) FROM $this->tabla1";
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

    function listarProductosModelo()
    {
        $sql = "SELECT *, categoria.nombre AS categoria, productos.nombre AS producto FROM $this->tabla1 INNER JOIN categoria ON categoria.id_categoria = productos.id_categoria INNER JOIN fotos_producto ON fotos_producto.id_producto = productos.id_producto";
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

    function consultarProductoAjaxModelo($dato)
    {
        $sql = "SELECT *, categoria.nombre AS categoria, productos.nombre AS producto FROM $this->tabla1 INNER JOIN categoria ON categoria.id_categoria = productos.id_categoria INNER JOIN fotos_producto ON fotos_producto.id_producto = productos.id_producto INNER JOIN descripcion_producto ON descripcion_producto.id_producto = productos.id_producto WHERE productos.nombre like ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $nom = "%" . $dato . "%";
            $stms->bindParam(1, $nom, PDO::PARAM_STR);
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

    function actualizarProductoModeloTienda($dato)
    {
        $sql = "UPDATE $this->tabla1 SET nombre= ?,precio= ?,precio_descuento= ?,cantidad= ?,id_categoria= ? WHERE id_producto = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['nom'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['precio'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['precioPromo'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['cant'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['id_categoria'], PDO::PARAM_INT);
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

    function listarTablasProducto()
    {
        $sql = "SELECT table_name FROM information_schema.columns WHERE column_name = 'id_producto' AND table_schema = 'proverpe_tienaproverpet'";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);

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

    function obtenerTablasPorID($tabla, $id_producto)
    {
        $sql = "DELETE FROM $tabla WHERE id_producto = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id_producto, PDO::PARAM_INT);

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

    function listarProductoIdModelo($id)
    {
        $sql = "SELECT *, categoria.nombre AS categoria, productos.nombre AS producto FROM $this->tabla1 INNER JOIN categoria ON categoria.id_categoria = productos.id_categoria INNER JOIN fotos_producto ON fotos_producto.id_producto = productos.id_producto INNER JOIN descripcion_producto ON descripcion_producto.id_producto = productos.id_producto WHERE productos.id_producto = ?";
        $conn = new Conexion();
        $stms = $conn->conectarPagina()->prepare($sql);
        $stms->bindParam(1, $id, PDO::PARAM_STR);

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

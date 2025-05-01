<?php

class ControladorCategoria
{
    function agregarCategoria()
    {
        if (isset($_POST['agregarCategoria'])) {
            $dato = array('cate' => $_POST['cate'], 'activo' => $_POST['activo']);
            $agregar = new ModeloCategoria();
            $res = $agregar->agregarCategoriaModelo($dato);
            if ($res == true) {
                echo '<script>window.location="agregarCategoria"</script>';
            }
        } elseif (isset($_POST['actualizarCategoria'])) {
            $dato = array('cate' => $_POST['cate'], 'activo' => $_POST['activo'], 'id' => $_GET['id']);
            $agregar = new ModeloCategoria();
            $res = $agregar->actualizarCategoriaModelo($dato);
            if ($res == true) {
                echo '<script>window.location="actualizarCategoria"</script>';
            }
        }
    }

    function listarCategoria()
    {
        $listar = new ModeloCategoria();
        $res = $listar->listarCategoriaModelo();
        return $res;
    }

    function consultarCategoriaAjaxControlador($dato)
    {
        $consultar = new ModeloCategoria();
        $res = $consultar->consultarCategoriaAjaxModelo($dato);
        return $res;
    }

    function listarCategoriaId()
    {
        $id = $_GET['id'];
        $listar = new ModeloCategoria();
        $res = $listar->listarCategoriaIdModelo($id);
        return $res;
    }

    //Tienda

    function agregarCategoriaTienda()
    {
        if (isset($_POST['agregarCategoria'])) {
            if ($_POST['id'] > 0) {
                $dato = array(
                    'id' => $_POST['id'],
                    'nom' => $_POST['nombre']
                );
                $agregar = new ModeloCategoria();
                $res = $agregar->actualizarCategoria($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'actualizarCategoria';</script>";
                }
            } else {
                $nombre = $_POST['nombre'];
                $agregar = new ModeloCategoria();
                $res = $agregar->agregarCategoria($nombre);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'agregarCategoria';</script>";
                }
            }
        }
        $lis = new ModeloCategoria();
        $res = $lis->listarCategoria();
        return $res;
    }

    function consultarCategoriaAjaxControladorTienda($dato)
    {
        $lis = new ModeloCategoria();
        $res = $lis->consultarCategoriaAjaxModelo($dato);
        return $res;
    }

    function eliminarCategoria()
    {
        if (isset($_GET['id'])) {
            $lis = new ModeloCategoria();
            $res = $lis->eliminarCategoriaModelo($_GET['id']);
            if ($res == true) {
                echo "<script type='text/javascript'>window.location.href = 'eliminarCategoria';</script>";
            }
        }
    }
}
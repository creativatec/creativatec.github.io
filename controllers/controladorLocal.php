<?php

class ControladorLocal
{
    function agregarLocal()
    {
        if (isset($_POST['agregarLocal'])) {
            $dato = array(
                'local' => $_POST['local'],
                'nit' => $_POST['nit'],
                'dire' => $_POST['dire'],
                'tel' => $_POST['tel'],
                'inicio' => (isset($_POST['inicio'])) ? $_POST['inicio'] : null,
                'fin' => (isset($_POST['fin'])) ? $_POST['fin'] : null,
                'plazo' => (isset($_POST['diasHabiles'])) ? $_POST['diasHabiles'] : null
            );
            $agregar = new ModeloLocal();
            $res = $agregar->agregarLocalModelo($dato);
            $resIDLocal = $agregar->obtenerUltimoID();
            $dato = array(
                'priNombre' => 'NNNN',
                'segNombre' => '',
                'priApellido' => 'NNNN',
                'segApellido' => '',
                'cc' => '111111',
                'email' => 'feliperenjifoz@gmail.com',
                'local' => $resIDLocal[0]['MAX(id_local)']
            );
            $cliente = new ModeloCliente();
            $resClient = $cliente->agregarClienteModelo($dato);
            if ($resClient == true) {
                echo '<script>window.location="agregarLocal"</script>';
            }
        } elseif (isset($_POST['actualizarLocal'])) {
            $dato = array(
                'id' => $_POST['id'],
                'local' => $_POST['localEdit'],
                'nit' => $_POST['nitEdit'],
                'dire' => $_POST['direEdit'],
                'tel' => $_POST['telEdit'],
                'inicio' => (isset($_POST['inicio'])) ? $_POST['inicio'] : null,
                'fin' => (isset($_POST['fin'])) ? $_POST['fin'] : null,
                'plazo' => (isset($_POST['diasHabiles'])) ? $_POST['diasHabiles'] : null
            );
            $agregar = new ModeloLocal();
            $res = $agregar->actualizarLocalModelo($dato);
            if ($res == true) {
                echo '<script>window.location="actualizarLocal"</script>';
            }
        }
    }

    function listarLocal()
    {
        $listar = new ModeloLocal();
        $res = $listar->listarModeloModelo();
        return $res;
    }

    function consultarLocal($id)
    {
        $consultar = new ModeloLocal();
        $res = $consultar->consultarLocalModelo($id);
        return $res;
    }

    function consultarLocalAjaxControlador($dato)
    {
        $consultar = new ModeloLocal();
        $res = $consultar->consultarModeloAjaxModelo($dato);
        return $res;
    }

    function eliminarLocalId()
    {
        $id = $_GET['id'];
        $listar = new ModeloLocal();
        $res = $listar->eliminarLocalIdModelo($id);
        if ($res == true) {
            echo '<script>window.location="eliminarLocal"</script>';
        }
    }

    
}
<?php

class ControladorServicio
{
    function agregarServicio()
    {
        if (isset($_POST['servicio'])) {
            if ($_POST['id_servicio'] > 0) {
                //actualizar
                $dato = array(
                    'id' => $_POST['id_servicio'],
                    'titulo' => $_POST['titulo'],
                    'desc' => $_POST['desc'],
                    'logo' => $_POST['logo']
                );
                $actualziar = new ModeloServicio();
                $res = $actualziar->actualizarServicioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'servicio';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'titulo' => $_POST['titulo'],
                    'desc' => $_POST['desc'],
                    'logo' => $_POST['logo']
                );
                $agregar = new ModeloServicio();
                $res = $agregar->agregarServicioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'servicio';</script>";
                }
            }
        }
        $mostrar = new ModeloServicio();
        $res = $mostrar->mostrarServico();
        return $res;
    }
}

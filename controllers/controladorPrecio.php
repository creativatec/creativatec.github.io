<?php

class ControaldorPrecio
{
    function agregarPrecio()
    {
        if (isset($_POST['precio'])) {
            if ($_POST['id_precio'] > 0) {
                //actualziar
                $dato = array(
                    'id' => $_POST['id_precio'],
                    'etiqueta' => $_POST['etiqueta'],
                    'nomEtiqueta' => $_POST['nomEtiqueta'],
                    'estilo' => $_POST['estilo'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => str_replace(',', '', $_POST['precioValor']),
                    'dura' => $_POST['dura']
                );
                $actualizar = new ModeloPrecio();
                $res = $actualizar->actualzarPrecioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'precio';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'etiqueta' => $_POST['etiqueta'],
                    'nomEtiqueta' => $_POST['nomEtiqueta'],
                    'estilo' => $_POST['estilo'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => str_replace(',', '', $_POST['precioValor']),
                    'dura' => $_POST['dura']
                );
                $agregar = new ModeloPrecio();
                $res = $agregar->agregarPrecioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'precio';</script>";
                }
            }
        }
        $mostrar = new ModeloPrecio();
        $res = $mostrar->mostrarPrecioModelo();
        return $res;
    }

    function agregarListaPrecio()
    {
        if (isset($_POST['listPrecio'])) {
            if ($_POST['id_lista'] > 0) {
                //actualziar
                $dato = array(
                    'id' => $_POST['id_lista'],
                    'descripcionPrecio' => $_POST['descripcionPrecio'],
                    'id_precio' => $_POST['id_precio']
                );
                $actualizar = new ModeloPrecio();
                $res = $actualizar->actualziarListaModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'precio';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'descripcionPrecio' => $_POST['descripcionPrecio'],
                    'id_precio' => $_POST['id_precio']
                );
                $agregar = new ModeloPrecio();
                $res = $agregar->agregarListaModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'precio';</script>";
                }
            }
        }
        $mostrar = new ModeloPrecio();
        $res = $mostrar->mostrarListaModelo();
        return $res;
    }
}

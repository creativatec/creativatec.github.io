<?php

class ControladorNosotros
{
    function agregarNosotros()
    {
        if (isset($_POST['nosotros'])) {
            if ($_POST['id_nosotros'] > 0) {
                //actualizarNosotros
                $dato = array(
                    'id' => $_POST['id_nosotros'],
                    'descri' => $_POST['descripcion'],
                    'titulo' => $_POST['tituloNosotros']
                );
                $actualizar = new ModeloNosotros();
                $res = $actualizar->actualizarNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'descri' => $_POST['descripcion'],
                    'titulo' => $_POST['tituloNosotros']
                );
                $agregar = new ModeloNosotros();
                $res = $agregar->agregarNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            }
        }
        $mostrar = new ModeloNosotros();
        $res = $mostrar->mostrarNosotros();
        return $res;
    }

    //agreagr Info_nosotros

    function agregarInfoNosotros()
    {
        if (isset($_POST['infonosotros'])) {
            if ($_POST['id_info_nosotros'] > 0) {
                //actualizarNosotros
                $dato = array(
                    'id' => $_POST['id_info_nosotros'],
                    'cabezera' => $_POST['cabezera'],
                    'titulo' => $_POST['titulo'],
                    'Subtitulo' => $_POST['Subtitulo'],
                    'descripcion' => $_POST['descripcionNosotro']
                );
                $actualizar = new ModeloNosotros();
                $res = $actualizar->actualizarInfoNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'cabezera' => $_POST['cabezera'],
                    'titulo' => $_POST['titulo'],
                    'Subtitulo' => $_POST['Subtitulo'],
                    'descripcion' => $_POST['descripcionNosotro']
                );
                $agregar = new ModeloNosotros();
                $res = $agregar->agregarInfoNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            }
        }
        $mostrar = new ModeloNosotros();
        $res = $mostrar->mostrarInfoNosotros();
        return $res;
    }

    //Agregar INFO_SOBRE_NOSOTROS

    function agregarInfoSobreNosotros()
    {
        if (isset($_POST['infosobrenosotros'])) {
            if ($_POST['id_info_sobre_nosotros'] > 0) {
                //actualizarNosotros
                $dato = array(
                    'id' => $_POST['id_info_sobre_nosotros'],
                    'logo' => $_POST['logonosotros'],
                    'titulo' => $_POST['tituloNosotro'],
                    'descripcion' => $_POST['descripcionNosotros']
                );
                $actualizar = new ModeloNosotros();
                $res = $actualizar->actualizarInfoSobreNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'logo' => $_POST['logonosotros'],
                    'titulo' => $_POST['tituloNosotro'],
                    'descripcion' => $_POST['descripcionNosotros']
                );
                $agregar = new ModeloNosotros();
                $res = $agregar->agregarInfoSobreNosotrosModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info_nosotros';</script>";
                }
            }
        }
        $mostrar = new ModeloNosotros();
        $res = $mostrar->mostrarInfoSobreNosotros();
        return $res;
    }
}

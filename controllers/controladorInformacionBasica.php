<?php

class ControladorInformacionBasica
{
    function agregarInformacionBasica()
    {
        if (isset($_POST['info'])) {
            if ($_POST['id_info'] > 0) {
                //actualizar informacion basica
                $archivo = $_FILES['logoinfo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($archivo) && $archivo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logoinfo']['type'];
                    $tamano = $_FILES['logoinfo']['size'];
                    $temp = $_FILES['logoinfo']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $archivo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $archivo, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            //echo '<p><img src="assets/images/web/' . $archivo . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
                }
                if ($_FILES['logoinfo']['name'] != null) {
                    $file = 'assets/images/web/' . $archivo . '';
                }else{
                    $file = $_POST['foto'];
                }
                $dato = array(
                    'id' => $_POST['id_info'],
                    'nombre' => $_POST['nombre'],
                    'correo' => $_POST['correo'],
                    'dire' => $_POST['dire'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel2'],
                    'tel3' => $_POST['tel3'],
                    'logo' => $file,
                    'footer' => $_POST['footer']
                );
                $actualizar = new ModeloInformacionBasica();
                $res = $actualizar->actualizarInformacionBasicaModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info';</script>";
                }
            } else {
                //agregar Informacion Basica
                $archivo = $_FILES['logoinfo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($archivo) && $archivo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logoinfo']['type'];
                    $tamano = $_FILES['logoinfo']['size'];
                    $temp = $_FILES['logoinfo']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $archivo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $archivo, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            //echo '<p><img src="assets/images/web/' . $archivo . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
                }
                $dato = array(
                    'nombre' => $_POST['nombre'],
                    'correo' => $_POST['correo'],
                    'dire' => $_POST['dire'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel2'],
                    'tel3' => $_POST['tel3'],
                    'logo' => 'assets/images/web/' . $archivo . '',
                    'footer' => $_POST['footer']
                );
                $agregar = new ModeloInformacionBasica();
                $res = $agregar->agregarInformacionBasicaModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info';</script>";
                }
            }
        }
        $consultar = new ModeloInformacionBasica();
        $mostrar = $consultar->ModeloInformacionBasicaModelo();
        return $mostrar;
    }

    function agregarRedes()
    {
        if (isset($_POST['redes'])) {
            if ($_POST['id_redes'] > 0) {
                //actualziar redes
                $dato = array(
                    'id' => $_POST['id_redes'],
                    'logo' => $_POST['logo'],
                    'url' => $_POST['url']
                );
                $agregar = new ModeloInformacionBasica();
                $res = $agregar->actualizarRedesModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info';</script>";
                }
            } else {
                //agregar redes
                $dato = array(
                    'logo' => $_POST['logo'],
                    'url' => $_POST['url']
                );
                $agregar = new ModeloInformacionBasica();
                $res = $agregar->agregarRedesModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info';</script>";
                }
            }
        }
        $consultar = new ModeloInformacionBasica();
        $mostrar = $consultar->mostrarRedesModelo();
        return $mostrar;
    }
}

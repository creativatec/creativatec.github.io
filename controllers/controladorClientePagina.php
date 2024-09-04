<?php

class ControladorClientePagina
{
    function agregarCliente()
    {
        if (isset($_POST['cliente'])) {
            if ($_POST['id_cliente'] > 0) {
                //actualizar
                $archivo = $_FILES['logo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($archivo) && $archivo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logo']['type'];
                    $tamano = $_FILES['logo']['size'];
                    $temp = $_FILES['logo']['tmp_name'];
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
                if ($_FILES['logo']['name'] != null) {
                    $file = 'assets/images/web/' . $archivo;
                } else {
                    $file = $_POST['uploadImage1'];
                }
                $dato = array(
                    'id' => $_POST['id_cliente'],
                    'cliente' => $_POST['Nomcliente'],
                    'tel' => $_POST['tel'],
                    'dire' => $_POST['dire'],
                    'proy' => $_POST['proy'],
                    'logo' => $file
                );
                $actaulziar = new ModeloClientePagina();
                $res = $actaulziar->actualizarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'cliente';</script>";
                }
            } else {
                //agreagr
                $archivo = $_FILES['logo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($archivo) && $archivo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logo']['type'];
                    $tamano = $_FILES['logo']['size'];
                    $temp = $_FILES['logo']['tmp_name'];
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
                    'cliente' => $_POST['Nomcliente'],
                    'tel' => $_POST['tel'],
                    'dire' => $_POST['dire'],
                    'proy' => $_POST['proy'],
                    'logo' => 'assets/images/web/' . $archivo
                );
                var_dump($dato);
                $agregar = new ModeloClientePagina();
                $res = $agregar->agregarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'cliente';</script>";
                }
            }
        }
        $mostrar = new ModeloClientePagina();
        $res = $mostrar->mostrarClienteModleo();
        return $res;
    }
}

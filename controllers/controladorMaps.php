<?php
//controlador
foreach (glob("../controllers/*.php") as $filename) {
    require_once $filename;
}

// Requiere todos los archivos en la carpeta 'models'
foreach (glob("../models/*.php") as $filename) {
    require_once $filename;
}
class ControladorMaps
{
    function agregarClienteMaps()
    {
        if (isset($_POST['cliente'])) {
            if ($_POST['id_maps'] > 0) {
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
                        $destino = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/web/' . $archivo;
                        if (move_uploaded_file($temp, $destino)) {
                            chmod($destino, 0777);
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        } else {
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
                    'id' => $_POST['id_maps'],
                    'cliente' => $_POST['Nomcliente'],
                    'dire' => $_POST['dire'],
                    'lit' => $_POST['lit'],
                    'long' => $_POST['long'],
                    'logo' => $file
                );
                $actaulziar = new ModeloMaps();
                $res = $actaulziar->actualizarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>history.back();</script>";
                }
            } else {
                //agreagr
                $archivo = $_FILES['logo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($archivo) && $archivo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logo']['type'];
                    $tamano = $_FILES['logo']['size'];
                    print $temp = $_FILES['logo']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        $destino = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/web/' . $archivo;
                        if (move_uploaded_file($temp, $destino)) {
                            chmod($destino, 0777);
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        } else {
                            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
                }
                $dato = array(
                    'cliente' => $_POST['Nomcliente'],
                    'dire' => $_POST['dire'],
                    'lit' => $_POST['lit'],
                    'long' => $_POST['long'],
                    'logo' => 'assets/images/web/' . $archivo
                );
                $agregar = new ModeloMaps();
                $res = $agregar->agregarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>history.back();</script>";
                }
            }
        }
        $mostrar = new ModeloMaps();
        $res = $mostrar->mostrarClienteModleo();
        return $res;
    }
}
if (isset($_POST['cliente'])) {
    $agregar = new ControladorMaps();
    $res = $agregar->agregarClienteMaps();
}
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
        if (isset($_POST['clienteMaps'])) {
            $archivo = isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK ? $_FILES['logo']['name'] : null;
            $file = $archivo ? 'assets/images/web/' . $archivo : (isset($_POST['uploadImage1']) ? $_POST['uploadImage1'] : '');

            if (isset($_POST['id_maps']) && $_POST['id_maps'] > 0) {
                // Actualizar
                if ($archivo) {
                    $tipo = $_FILES['logo']['type'];
                    $tamano = $_FILES['logo']['size'];
                    $temp = $_FILES['logo']['tmp_name'];

                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        $destino = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/web/' . $archivo;
                        if (move_uploaded_file($temp, $destino)) {
                            chmod($destino, 0777);
                        }
                    }
                }
                
                $dato = array(
                    'id' => $_POST['id_maps'],
                    'cliente' => $_POST['Nomcliente'],
                    'dire' => $_POST['dire'],
                    'lit' => $_POST['lit'],
                    'long' => $_POST['long'],
                    'logo' => $file
                );
                
                $actualizar = new ModeloMaps();
                $res = $actualizar->actualizarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>history.back();</script>";
                }
            } else {
                // Agregar
                if ($archivo) {
                    $tipo = $_FILES['logo']['type'];
                    $tamano = $_FILES['logo']['size'];
                    $temp = $_FILES['logo']['tmp_name'];

                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        $destino = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/web/' . $archivo;
                        if (move_uploaded_file($temp, $destino)) {
                            chmod($destino, 0777);
                        }
                    }
                }
                
                $dato = array(
                    'cliente' => $_POST['Nomcliente'],
                    'dire' => $_POST['dire'],
                    'lit' => $_POST['lit'],
                    'long' => $_POST['long'],
                    'logo' => $file
                );
                
                $agregar = new ModeloMaps();
                $res = $agregar->agregarClienteModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>history.back();</script>";
                }
            }
        }
        
        $mostrar = new ModeloMaps();
        return $mostrar->mostrarClienteModleo();
    }
}

if (isset($_POST['cliente'])) {
    $agregar = new ControladorMaps();
    $agregar->agregarClienteMaps();
}

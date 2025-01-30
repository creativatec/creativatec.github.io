
<?php

class ControladorNavegacion
{
    function agregarNavegacion()
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
                        if (move_uploaded_file($temp, 'views/img/web/' . $archivo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('views/img/web/' . $archivo, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            //echo '<p><img src="views/img/web/' . $archivo . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
                }
                if ($_FILES['logoinfo']['name'] != null) {
                    $file = 'views/img/web/' . $archivo . '';
                } else {
                    $file = $_POST['foto'];
                }
                $dato = array(
                    'id' => $_POST['id_info'],
                    'nombre' => $_POST['nombre'],
                    'correo' => $_POST['correo'],
                    'dire' => $_POST['dire'],
                    'ubi' => $_POST['ubi'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel2'],
                    'logo' => $file,
                    'footer' => $_POST['footer']
                );
                $actualizar = new ModeloNavegacion();
                $res = $actualizar->actualizarNavegacionModelo($dato);
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
                        if (move_uploaded_file($temp, 'views/img/web/' . $archivo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('views/img/web/' . $archivo, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            //echo '<p><img src="views/img/web/' . $archivo . '"></p>';
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
                    'ubi' => $_POST['ubi'],
                    'tel1' => $_POST['tel1'],
                    'tel2' => $_POST['tel2'],
                    'logo' => 'views/img/web/' . $archivo . '',
                    'footer' => $_POST['footer']
                );
                $agregar = new ModeloNavegacion();
                $res = $agregar->agregarNavegacionModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'info';</script>";
                }
            }
        }
        $listar = new ModeloNavegacion();
        $res = $listar->listarNavegacionModelo();
        return $res;
    }
}

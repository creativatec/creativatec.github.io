<?php

class ControladorPortafolio
{
    function agregarPortafolio()
    {
        if (isset($_POST['portafolio'])) {
            if ($_POST['id_portafolio'] > 0) {
                //actualizar
                $dato = array(
                    'id' => $_POST['id_portafolio'],
                    'descripcion' => $_POST['descripcionporta'],
                    'nota' => $_POST['descripcionnota']
                );
                $actualziar = new ModeloPortafolio();
                $res = $actualziar->actualizarPortafolioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'descripcion' => $_POST['descripcionporta'],
                    'nota' => $_POST['descripcionnota']
                );
                $agregar = new ModeloPortafolio();
                $res = $agregar->agregarPortafolioModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            }
        }
        $mostrar = new ModeloPortafolio();
        $res = $mostrar->mostrarPortafolioModelo();
        return $res;
    }

    //agreagr cateogira portafolio

    function agregarCategoriaPortafolio()
    {
        if (isset($_POST['categoriaPorta'])) {
            if ($_POST['id_categoria_portafolio'] > 0) {
                //actualizar
                $dato = array(
                    'id' => $_POST['id_categoria_portafolio'],
                    'nombre' => $_POST['nombre'],
                    'data' => $_POST['data']
                );
                $actualziar = new ModeloPortafolio();
                $res = $actualziar->actualizarCategoriaPortafolioModelo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            } else {
                //agregar
                $dato = array(
                    'nombre' => $_POST['nombre'],
                    'data' => $_POST['data']
                );
                $agregar = new ModeloPortafolio();
                $res = $agregar->agregarCategoriaPortafolioModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            }
        }
        $mostrar = new ModeloPortafolio();
        $res = $mostrar->mostrarCategoriaPortafolioModelo();
        return $res;
    }

    function agregarProyecto()
    {
        if (isset($_POST['proyecto'])) {
            if ($_POST['id_proyecto'] > 0) {
                //actualizar
                $logo = $_FILES['logoporta']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($logo) && $logo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logoporta']['type'];
                    $tamano = $_FILES['logoporta']['size'];
                    $temp = $_FILES['logoporta']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $logo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $logo, 0777);
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
                $foto1 = $_FILES['foto1']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($foto1) && $foto1 != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['foto1']['type'];
                    $tamano = $_FILES['foto1']['size'];
                    $temp = $_FILES['foto1']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $foto1)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $foto1, 0777);
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
                $foto2 = $_FILES['foto2']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($foto2) && $foto2 != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['foto2']['type'];
                    $tamano = $_FILES['foto2']['size'];
                    $temp = $_FILES['foto2']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $foto2)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $foto2, 0777);
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
                if ($_FILES['logoporta']['name'] != null) {
                    $archivo1 = 'assets/images/web/' . $logo . '';
                } else {
                    $archivo1 = $_POST['uploadImage1'];
                }
                if ($_FILES['foto1']['name'] != null) {
                    $archivo2 = 'assets/images/web/' . $foto1 . '';
                } else {
                    $archivo2 = $_POST['uploadImage2'];
                }
                if ($_FILES['foto2']['name'] != null) {
                    $archivo3 = 'assets/images/web/' . $foto2 . '';
                } else {
                    $archivo3 = $_POST['uploadImage3'];
                }
                $dato = array(
                    'id' => $_POST['id_proyecto'],
                    'logo' => $archivo1,
                    'nombre' => $_POST['nombreProyecto'],
                    'descripcion' => $_POST['descripcion'],
                    'foto1' => $archivo2,
                    'descripcion1' => $_POST['descripcionParr1'],
                    'descripcion2' => $_POST['descripcionParr2'],
                    'descripcion3' => $_POST['descripcionParr3'],
                    'foto2' => $archivo3,
                    'Origen' => $_POST['origen'],
                    'Finalización_Proyecto' => $_POST['finalizacion'],
                    'Valor' => str_replace(',', '', $_POST['valor']),
                    'Disenador' => $_POST['dise'],
                    'id_categoria_portafolio' => $_POST['id_categoria_portafolio']
                );
                var_dump($dato);
                $actualizar = new ModeloPortafolio();
                $res = $actualizar->actualziarProyectoModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            } else {
                $logo = $_FILES['logoporta']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($logo) && $logo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['logoporta']['type'];
                    $tamano = $_FILES['logoporta']['size'];
                    $temp = $_FILES['logoporta']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $logo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $logo, 0777);
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
                $foto1 = $_FILES['foto1']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($foto1) && $foto1 != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['foto1']['type'];
                    $tamano = $_FILES['foto1']['size'];
                    $temp = $_FILES['foto1']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $foto1)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $foto1, 0777);
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
                $foto2 = $_FILES['foto2']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if (isset($foto2) && $foto2 != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['foto2']['type'];
                    $tamano = $_FILES['foto2']['size'];
                    $temp = $_FILES['foto2']['tmp_name'];
                    //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, 'assets/images/web/' . $foto2)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('assets/images/web/' . $foto2, 0777);
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
                //agregar
                $dato = array(
                    'logo' => 'assets/images/web/' . $logo . '',
                    'nombre' => $_POST['nombreProyecto'],
                    'descripcion' => $_POST['descripcion'],
                    'foto1' => 'assets/images/web/' . $foto1 . '',
                    'descripcion1' => $_POST['descripcionParr1'],
                    'descripcion2' => $_POST['descripcionParr2'],
                    'descripcion3' => $_POST['descripcionParr3'],
                    'foto2' => 'assets/images/web/' . $foto2 . '',
                    'Origen' => $_POST['origen'],
                    'Finalización_Proyecto' => $_POST['finalizacion'],
                    'Valor' => str_replace(',', '', $_POST['valor']),
                    'Disenador' => $_POST['dise'],
                    'id_categoria_portafolio' => $_POST['id_categoria_portafolio']
                );
                $agregar = new ModeloPortafolio();
                $res = $agregar->agregarProyectoModleo($dato);
                if ($res == true) {
                    echo "<script type='text/javascript'>window.location.href = 'portafolio';</script>";
                }
            }
        }
        $mostrar = new ModeloPortafolio();
        $res = $mostrar->mostrarProyectoModelo();
        return $res;
    }
}

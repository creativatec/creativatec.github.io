<?php
class ControladorUsuario
{
    function loginControlador()
    {

        if (isset($_POST['login'])) {

            $dato = array(
                'user' => $_POST['user'],
                'clave' => $_POST['clave']
            );
            $consultarUsuario = new ModeloUsuario();
            $resPagina = $consultarUsuario->ModeloLoginIngresarPagina($dato);
            if ($resPagina != []) {
                if ($resPagina[0]['nombre'] == $_POST['user'] && $resPagina[0]['clave'] == $_POST['clave']) {

                    $_SESSION['id_usuario'] = $resPagina[0]['id_usuario'];
                    $_SESSION['usuario'] = $resPagina[0]['nombre'];
                    $_SESSION['validarPagina'] = true;
                    echo "<script type='text/javascript'>window.location.href = 'inicio';</script>";
                } else {
                    header('location:loginFallido');
                }
            } else {
                $res = $consultarUsuario->ModeloLoginIngresar($dato);
                if ($res != []) {
                    if ($res[0]['nombre_activo'] != 'Inactivo') {
                        if ($res[0]['usuario'] == $_POST['user'] && $res[0]['clave'] == $_POST['clave']) {
                            $local = new ModeloLocal();
                            $reslocal = $local->consultarLocalModelo($res[0]['id_local']);
                            //dias restantes
                            $fechaFin = $reslocal[0]['fin'];
                            $fechaPlazo = $reslocal[0]['plazo'];
                            $fechaActual = new DateTime();
                            $fechaFinDate = new DateTime($fechaFin);
                            $fechaFinDatePlazo = new DateTime($fechaPlazo);
                            $diferencia = $fechaActual->diff($fechaFinDate);
                            $diferenciaPlazo = $fechaActual->diff($fechaFinDatePlazo);
                            $diasRestantes = (int)$diferencia->format("%r%a");
                            $Restantes = (int)$diferenciaPlazo->format("%r%a");
                            if ($reslocal[0]['cuota'] > 0 && $Restantes > 0) {
                                $local = new ControladorLocal();
                                $resLocal = $local->consultarLocal($res[0]['id_local']);
                                $_SESSION['sistema'] = $resLocal[0]['id_sistema'];
                                $_SESSION['estable'] = $resLocal[0]['id_establecimiento'];
                                $_SESSION['fin'] = $diasRestantes;
                                $_SESSION['restamte'] = $Restantes;
                                $_SESSION['id_usuario'] = $res[0]['id_usuario'];
                                $_SESSION['id_local'] = $res[0]['id_local'];
                                $_SESSION['usuario'] = $res[0]['usuario'];
                                $_SESSION['rol'] = $res[0]['nombre_rol'];
                                $_SESSION['validar'] = true;
                                $funcion = new ControladorFuncion();
                                $funcion->listarFunciones();
                            } else {
                                if ($diasRestantes <= 0) {
                                    if ($Restantes <= 0) {
                                        if ($reslocal[0]['cuota'] <= 0) {
                                            $local = new ControladorLocal();
                                            $resLocal = $local->consultarLocal($res[0]['id_local']);
                                            $_SESSION['sistema'] = $resLocal[0]['id_sistema'];
                                            $_SESSION['estable'] = $resLocal[0]['id_establecimiento'];
                                            $_SESSION['fin'] = $diasRestantes;
                                            $_SESSION['restamte'] = $Restantes;
                                            $_SESSION['id_usuario'] = $res[0]['id_usuario'];
                                            $_SESSION['id_local'] = $res[0]['id_local'];
                                            $_SESSION['usuario'] = $res[0]['usuario'];
                                            $_SESSION['rol'] = $res[0]['nombre_rol'];
                                            $_SESSION['validar'] = true;
                                            $funcion = new ControladorFuncion();
                                            $funcion->listarFunciones();
                                        } else {
                                            echo "<script type='text/javascript'>window.location.href = 'index.php?action=LoginSuspendidoPorPago&id_local=" . $res[0]['id_local'] . "';</script>";
                                        }
                                    } else {
                                        $local = new ControladorLocal();
                                        $resLocal = $local->consultarLocal($res[0]['id_local']);
                                        $_SESSION['sistema'] = $resLocal[0]['id_sistema'];
                                        $_SESSION['estable'] = $resLocal[0]['id_establecimiento'];
                                        $_SESSION['fin'] = $diasRestantes;
                                        $_SESSION['restamte'] = $Restantes;
                                        $_SESSION['id_usuario'] = $res[0]['id_usuario'];
                                        $_SESSION['id_local'] = $res[0]['id_local'];
                                        $_SESSION['usuario'] = $res[0]['usuario'];
                                        $_SESSION['rol'] = $res[0]['nombre_rol'];
                                        $_SESSION['validar'] = true;
                                        $funcion = new ControladorFuncion();
                                        $funcion->listarFunciones();
                                    }
                                } else {
                                    $local = new ControladorLocal();
                                    $resLocal = $local->consultarLocal($res[0]['id_local']);
                                    $_SESSION['sistema'] = $resLocal[0]['id_sistema'];
                                    $_SESSION['estable'] = $resLocal[0]['id_establecimiento'];
                                    $_SESSION['fin'] = $diasRestantes;
                                    $_SESSION['restamte'] = $Restantes;
                                    $_SESSION['id_usuario'] = $res[0]['id_usuario'];
                                    $_SESSION['id_local'] = $res[0]['id_local'];
                                    $_SESSION['usuario'] = $res[0]['usuario'];
                                    $_SESSION['rol'] = $res[0]['nombre_rol'];
                                    $_SESSION['validar'] = true;
                                    $funcion = new ControladorFuncion();
                                    $funcion->listarFunciones();
                                }
                            }
                        } else {
                            echo "<script type='text/javascript'>window.location.href = 'loginFallido';</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>window.location.href = 'loginInactivo';</script>";
                    }
                } else {
                    $resPagina = $consultarUsuario->ModeloLoginIngresarTienda($dato);
                    if ($resPagina != []) {
                        if ($resPagina[0]['usuario'] == $_POST['user'] && $resPagina[0]['clave'] == $_POST['clave']) {

                            $_SESSION['id_usuario'] = $resPagina[0]['id_usuario'];
                            $_SESSION['usuario'] = $resPagina[0]['nombre'];
                            $_SESSION['validarTienda'] = true;
                            echo "<script type='text/javascript'>window.location.href = 'inicio';</script>";
                        } else {
                            echo "<script type='text/javascript'>window.location.href = 'loginFallido';</script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>window.location.href = 'loginFallido';</script>";
                    }
                }
            }
        }
    }

    function agregarUsuario()
    {
        if (isset($_POST['agregarUsuario'])) {
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == "Administrador") {
                    $dato = array(
                        'priNombre' => $_POST['priNombre'],
                        'segNombre' => $_POST['segNombre'],
                        'priApellido' => $_POST['priApellido'],
                        'segApellido' => $_POST['segApellido'],
                        'user' => $_POST['user'],
                        'clave' => $_POST['clave'],
                        'rol' => $_POST['rol'],
                        'activo' => $_POST['activo'],
                        'local' => $_SESSION['id_local']
                    );
                } else {
                    $dato = array(
                        'priNombre' => $_POST['priNombre'],
                        'segNombre' => $_POST['segNombre'],
                        'priApellido' => $_POST['priApellido'],
                        'segApellido' => $_POST['segApellido'],
                        'user' => $_POST['user'],
                        'clave' => $_POST['clave'],
                        'rol' => $_POST['rol'],
                        'activo' => $_POST['activo'],
                        'local' => $_SESSION['id_local']
                    );
                }
            } else {
                $dato = array(
                    'priNombre' => $_POST['priNombre'],
                    'segNombre' => $_POST['segNombre'],
                    'priApellido' => $_POST['priApellido'],
                    'segApellido' => $_POST['segApellido'],
                    'user' => $_POST['user'],
                    'clave' => $_POST['clave'],
                    'rol' => $_POST['rol'],
                    'activo' => $_POST['activo'],
                    'local' => $_POST['id']
                );
            }

            $agregar = new ModeloUsuario();
            $res = $agregar->agregarUsuarioModelo($dato);
            if ($res == true) {
                echo '<script>window.location="agregarUsuario"</script>';
            }
        } elseif (isset($_POST['ActualizarUsuario'])) {
            if (isset($_SESSION['rol'])) {
                if ($_SESSION['rol'] == "Administrador") {
                    $dato = array(
                        'id' => $_GET['id_usuario'],
                        'priNombre' => $_POST['priNombreEdit'],
                        'segNombre' => $_POST['segNombreEdit'],
                        'priApellido' => $_POST['priApellidoEdit'],
                        'segApellido' => $_POST['segApellidoEdit'],
                        'user' => $_POST['userEdit'],
                        'clave' => $_POST['claveEdit'],
                        'rol' => $_POST['rolEdit'],
                        'activo' => $_POST['activoEdit'],
                        'local' => $_SESSION['id_local']
                    );
                } else {
                    $dato = array(
                        'id' => $_GET['id_usuario'],
                        'priNombre' => $_POST['priNombreEdit'],
                        'segNombre' => $_POST['segNombreEdit'],
                        'priApellido' => $_POST['priApellidoEdit'],
                        'segApellido' => $_POST['segApellidoEdit'],
                        'user' => $_POST['userEdit'],
                        'clave' => $_POST['claveEdit'],
                        'rol' => $_POST['rolEdit'],
                        'activo' => $_POST['activoEdit'],
                        'local' => $_SESSION['id_local']
                    );
                }
            } else {
                $dato = array(
                    'id' => $_POST['id_usuario'],
                    'priNombre' => $_POST['priNombreEdit'],
                    'segNombre' => $_POST['segNombreEdit'],
                    'priApellido' => $_POST['priApellidoEdit'],
                    'segApellido' => $_POST['segApellidoEdit'],
                    'user' => $_POST['userEdit'],
                    'clave' => $_POST['claveEdit'],
                    'rol' => $_POST['rolEdit'],
                    'activo' => $_POST['activoEdit'],
                    'local' => $_POST['id']
                );
            }

            $actualizr = new ModeloUsuario();
            $res = $actualizr->actualizarUsuarioModelo($dato);
            if ($res == true) {
                echo '<script>window.location="actualizarUsuario"</script>';
            }
        }
    }

    function listarUsuario()
    {
        $listar = new ModeloUsuario();
        $res = $listar->listarModeloUsuario();
        return $res;
    }

    function consultarUsuarioPerfil()
    {
        $listar = new ModeloUsuario();
        $res = $listar->consultarUsuarioPerfilModelo($_SESSION['id_usuario']);
        return $res;
    }

    function listarUsuarioNomina()
    {
        $listar = new ModeloUsuario();
        $res = $listar->listarUsuarioNominaModelo();
        return $res;
    }

    function listarUsuarioId()
    {
        $id = $_GET['id_usuario'];
        $listar = new ModeloUsuario();
        $res = $listar->listarUsuarioIdModelo($id);
        return $res;
    }

    function eliminarUsuarioId()
    {
        $id = $_GET['id'];
        $listar = new ModeloUsuario();
        $res = $listar->eliminarUsuarioIdModelo($id);
        if ($res == true) {
            echo '<script>window.location="eliminarUsuario"</script>';
        }
    }
}

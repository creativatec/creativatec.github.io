<?php

class ControladorProducto
{
    function agregarProducto()
    {
        if (isset($_POST['agregarProducto'])) {
            $id = $_POST['id_producto'];
            $id_proeevedor = $_POST['id_proeevedor'];
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $precio = str_replace(',', '', $_POST['precio']);
            $precioUnita = str_replace(',', '', $_POST['precioUnita']);
            $total = str_replace(',', '', $_POST['total']);
            $cantidad = $_POST['cantidad'];
            $cant = $_POST['cant'];
            $id_categoria = $_POST['id_categoria'];
            $id_medida = $_POST['id_medida'];
            $id_impuesto = ($_POST['id_impuesto'] > 0 ? $_POST['id_impuesto'] : 1);
            $totalFactura = str_replace(',', '', $_POST['totalFactura']);
            if ($_SESSION['rol'] == "Administrador") {
                $id_local = $_SESSION['id_local'];
                for ($i = 0; $i < count($codigo); $i++) {
                    if ($id[$i] != null) {
                        $cantidad_producto = $cant[$i] + $cantidad[$i];
                        $agreagr = new ModeloProducto();
                        $res = $agreagr->actualizarProductoModelo($id[$i], $id_proeevedor, $codigo[$i], $nombre[$i], $precio[$i], $cantidad_producto, $id_categoria[$i], $id_medida[$i], $id_impuesto[$i], $id_local);
                        if ($res == true) {
                            $agregarFactura = new ControladorFacturaProeevedor();
                            $resFactura = $agregarFactura->agregarFacturaProeevedor($id_categoria[$i], $id_proeevedor, $_SESSION['id_usuario'], $id_medida[$i], $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_local, $totalFactura, $precioUnita[$i], $total[$i]);
                            if ($resFactura == true) {
                                if (isset($_SESSION['envioCorreo'])) {
                                    if ($_SESSION['envioCorreo'] == 'true') {

                                        date_default_timezone_set('America/Mexico_City');
                                        $fechaActal = date('Y-m-d');
                                        $enviarCorreo = new ModeloFacturaProeevedor();
                                        $resEnvioCorreo = $enviarCorreo->listarFacturaProductoModelo($id_proeevedor, $fechaActal);
                                        $mostrar = new ModeloProeevedor();
                                        $enviarProe = $mostrar->consultarProeevedorModelo($id_proeevedor);
                                        $htmlContent = '<html>
                                    <head>
                                        <style>
                                            table {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }
                                            th, td {
                                                border: 1px solid #ddd;
                                                padding: 8px;
                                            }
                                            th {
                                                background-color: #f4f4f4;
                                            }
                                            .table-responsive {
                                                overflow-x: auto;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                        <div class="form-row mt-2" style="text-align: center;">
                                            <div class="form-group col-md-3"></div>
                                            <div class="form-group col-md-6">
                                                Proveedor: <span id="nom_proveedor">' . htmlspecialchars($enviarProe[0]['nombre_proeevedor']) . '</span><br>
                                                NIT: <span id="nit_proveedor">' . htmlspecialchars($enviarProe[0]['nit_proeevedor']) . '</span><br>
                                                Teléfono: <span id="tel_proveedor">' . htmlspecialchars($enviarProe[0]['telefono_proeevedor']) . '</span><br>
                                                Dirección: <span id="dir_proveedor">' . htmlspecialchars($enviarProe[0]['direccion_proeevedor']) . '</span>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table mt-2" id="producto">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Categoría</th>
                                                        <th>Medida</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Costo * Prod</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';

                                        foreach ($resEnvioCorreo as $key => $value) {
                                            $htmlContent .= '<tr>
                                            <td>' . htmlspecialchars($value['codigo_producto']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_producto']) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['precio_unitario'], 0)) . '</td>
                                            <td>' . htmlspecialchars($value['cantidad_producto']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_categoria']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_medida']) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['unitario'], 0)) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['total'], 0)) . '</td>
                                        </tr>';
                                        }

                                        $htmlContent .= '</tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" style="text-align: right;"><strong>Total</strong></td>
                                                    <td>' . htmlspecialchars(number_format($resEnvioCorreo[0]['pago_factura'], 0)) . '</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </body>
                                    </html>';

                                        // Configuración del correo
                                        $to = 'feliperenjifoz@gmail.com'; // Cambia esto por la dirección del destinatario
                                        $subject = 'Informe de Proveedor y Productos';
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                        $headers .= 'From: no-reply@example.com' . "\r\n"; // Cambia esto por la dirección del remitente

                                        // Enviar el correo
                                        if (mail($to, $subject, $htmlContent, $headers)) {
                                            echo '<script>window.location="actualizarProducto"</script>';
                                        } else {
                                            echo 'Hubo un error al enviar el correo.';
                                        }
                                    } else {
                                        echo '<script>window.location="actualizarProducto"</script>';
                                    }
                                }
                            }
                        }
                    } else {
                        $agreagr = new ModeloProducto();
                        $res = $agreagr->agregarProductoModelo($id_proeevedor, $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_categoria[$i], $id_medida[$i], $id_impuesto[$i], $id_local);
                        if ($res == true) {
                            $agregarFactura = new ControladorFacturaProeevedor();
                            $resFactura = $agregarFactura->agregarFacturaProeevedor($id_categoria[$i], $id_proeevedor, $_SESSION['id_usuario'], $id_medida[$i], $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_local, $totalFactura, $precioUnita[$i], $total[$i]);
                            if ($resFactura == true) {
                                if (isset($_SESSION['envioCorreo'])) {
                                    if ($_SESSION['envioCorreo'] == 'true') {

                                        date_default_timezone_set('America/Mexico_City');
                                        $fechaActal = date('Y-m-d');
                                        $enviarCorreo = new ModeloFacturaProeevedor();
                                        $resEnvioCorreo = $enviarCorreo->listarFacturaProductoModelo($id_proeevedor, $fechaActal);
                                        $mostrar = new ModeloProeevedor();
                                        $enviarProe = $mostrar->consultarProeevedorModelo($id_proeevedor);
                                        $htmlContent = '<html>
                                    <head>
                                        <style>
                                            table {
                                                width: 100%;
                                                border-collapse: collapse;
                                            }
                                            th, td {
                                                border: 1px solid #ddd;
                                                padding: 8px;
                                            }
                                            th {
                                                background-color: #f4f4f4;
                                            }
                                            .table-responsive {
                                                overflow-x: auto;
                                            }
                                        </style>
                                    </head>
                                    <body>
                                        <div class="form-row mt-2" style="text-align: center;">
                                            <div class="form-group col-md-3"></div>
                                            <div class="form-group col-md-6">
                                                Proveedor: <span id="nom_proveedor">' . htmlspecialchars($enviarProe[0]['nombre_proeevedor']) . '</span><br>
                                                NIT: <span id="nit_proveedor">' . htmlspecialchars($enviarProe[0]['nit_proeevedor']) . '</span><br>
                                                Teléfono: <span id="tel_proveedor">' . htmlspecialchars($enviarProe[0]['telefono_proeevedor']) . '</span><br>
                                                Dirección: <span id="dir_proveedor">' . htmlspecialchars($enviarProe[0]['direccion_proeevedor']) . '</span>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table mt-2" id="producto">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Producto</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Categoría</th>
                                                        <th>Medida</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Costo * Prod</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';

                                        foreach ($resEnvioCorreo as $key => $value) {
                                            $htmlContent .= '<tr>
                                            <td>' . htmlspecialchars($value['codigo_producto']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_producto']) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['precio_unitario'], 0)) . '</td>
                                            <td>' . htmlspecialchars($value['cantidad_producto']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_categoria']) . '</td>
                                            <td>' . htmlspecialchars($value['nombre_medida']) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['unitario'], 0)) . '</td>
                                            <td>' . htmlspecialchars(number_format($value['total'], 0)) . '</td>
                                        </tr>';
                                        }

                                        $htmlContent .= '</tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" style="text-align: right;"><strong>Total</strong></td>
                                                    <td>' . htmlspecialchars(number_format($resEnvioCorreo[0]['pago_factura'], 0)) . '</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </body>
                                    </html>';

                                        // Configuración del correo
                                        $to = 'feliperenjifoz@gmail.com'; // Cambia esto por la dirección del destinatario
                                        $subject = 'Informe de Proveedor y Productos';
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                        $headers .= 'From: no-reply@example.com' . "\r\n"; // Cambia esto por la dirección del remitente

                                        // Enviar el correo
                                        if (mail($to, $subject, $htmlContent, $headers)) {
                                            echo '<script>window.location="agregarProducto"</script>';
                                        } else {
                                            echo 'Hubo un error al enviar el correo.';
                                        }
                                    } else {
                                        echo '<script>window.location="agregarProducto"</script>';
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $id_local = $_SESSION['id_local'];
                for ($i = 0; $i < count($codigo); $i++) {
                    if ($id[$i] != null) {
                        $cantidad_producto = $cant[$i] + $cantidad[$i];
                        $agreagr = new ModeloProducto();
                        $res = $agreagr->actualizarProductoModelo($id[$i], $id_proeevedor, $codigo[$i], $nombre[$i], $precio[$i], $cantidad_producto, $id_categoria[$i], $id_medida[$i], $id_impuesto[$i], $id_local[$i]);
                        if ($res == true) {
                            $agregarFactura = new ControladorFacturaProeevedor();
                            $resFactura = $agregarFactura->agregarFacturaProeevedor($id_categoria[$i], $id_proeevedor, $_SESSION['id_usuario'], $id_medida[$i], $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_local, $totalFactura, $precioUnita[$i], $total[$i]);
                            if ($resFactura == true) {
                                echo '<script>window.location="actualizarProducto"</script>';
                            }
                        }
                    } else {
                        $agreagr = new ModeloProducto();
                        $res = $agreagr->agregarProductoModelo($id_proeevedor, $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_categoria[$i], $id_medida[$i], $id_impuesto[$i], $id_local[$i]);
                        if ($res == true) {
                            $agregarFactura = new ControladorFacturaProeevedor();
                            $resFactura = $agregarFactura->agregarFacturaProeevedor($id_categoria[$i], $id_proeevedor, $_SESSION['id_usuario'], $id_medida[$i], $codigo[$i], $nombre[$i], $precio[$i], $cantidad[$i], $id_local, $totalFactura, $precioUnita[$i], $total[$i]);
                            if ($resFactura == true) {
                                echo '<script>window.location="agregarProducto"</script>';
                            }
                        }
                    }
                }
            }
        }
    }

    function listarProducto()
    {
        $listar = new ModeloProducto();
        $res = $listar->listarProductoModelo();
        return $res;
    }

    function listarProductoExcel()
    {
        $listar = new ModeloProducto();
        $res = $listar->listarProductoExcelModelo();
        return $res;
    }

    function consultarProductoAjaxControlador($dato, $id)
    {
        $consultar = new ModeloProducto();
        $res = $consultar->consultarModeloProductoAjaxModelo($dato, $id);
        return $res;
    }

    function consultarProducto()
    {
        $consultar = new ModeloProducto();
        $res = $consultar->consultarProductoModelo($_GET['id']);
        return $res;
    }

    function consultarAritucloProeevedoridAjax($nit)
    {
        $conusltar = new ModeloProducto();
        $res = $conusltar->consultarAritucloProeevedoridAjaxModelo($nit);
        return $res;
    }

    function consultarAritucloProeevedornitAjax($nit)
    {
        $conusltar = new ModeloProducto();
        $res = $conusltar->consultarAritucloProeevedornitAjaxModelo($nit);
        return $res;
    }

    function consultarAritucloProeevedorAjax($id)
    {
        $conusltar = new ModeloProducto();
        $res = $conusltar->consultarAritucloProeevedorAjaxModelo($id);
        return $res;
    }

    function mostrarArticulo($dato)
    {
        $buscar = new ModeloProducto();
        $res = $buscar->mostrarArticuloModelo($dato);
        return $res;
    }

    function actualizarProductoFactura($dato)
    {
        $buscar = new ModeloProducto();
        $res = $buscar->actualizarProductoFacturaModelo($dato);
        return $res;
    }

    function alertarProductosFaltante()
    {
        $alert = new ModeloProducto();
        $res = $alert->alertarProductosFaltanteModelo();
        return $res;
    }

    function eliminaProductoId()
    {
        $id = $_GET['id'];
        $listar = new ModeloProducto();
        $res = $listar->eliminaProductoIdModelo($id);
        if ($res == true) {
            echo '<script>window.location="eliminarProducto"</script>';
        }
    }
    //////////////
    function agregarProductoTienda()
    {
        if (isset($_POST['agregarProducto'])) {
            if ($_POST['id'] > 0) {
                $datoTienda = array(
                    'id' => $_POST['id'],
                    'nom' => $_POST['nombre'],
                    'precio' => str_replace(',', '', $_POST['precio']),
                    'precioPromo' => str_replace(',', '', $_POST['precioPromo']),
                    'cant' => $_POST['cant'],
                    'id_categoria' => $_POST['id_categoria']
                );
                $agregar = new ModeloProducto();
                $res = $agregar->actualizarProductoModeloTienda($datoTienda);
                if ($res == true) {
                    $datoInfo = array(
                        'id_producto' => $_POST['id'],
                        'descrip' => $_POST['descrip'],
                        'infoAdd' => $_POST['infoAdd']
                    );
                    $agregarDescripcion = new ControladorDescripcionProducto();
                    $resDescrip = $agregarDescripcion->actualizarDescripcionProducto($datoInfo);
                    if ($resDescrip == true) {
                        $targetDir = 'views/img/productos/';
                        // Inicializar el array de imágenes
                        $datoImagenes = [
                            'id_producto' => $_POST['id'],
                            'portada' => $_POST['portadaEdit'] ?? null,
                            'foto1' => $_POST['foto1Edit'] ?? null,
                            'foto2' => $_POST['foto2Edit'] ?? null,
                            'foto3' => $_POST['foto3Edit'] ?? null,
                        ];

                        // Campos de archivo
                        $files = ['portada', 'foto1', 'foto2', 'foto3'];

                        foreach ($files as $fileKey) {
                            if (isset($_FILES[$fileKey]['name']) && $_FILES[$fileKey]['name'] != "") {
                                // Obtenemos información del archivo
                                $archivo = $_FILES[$fileKey]['name'];
                                $tipo = $_FILES[$fileKey]['type'];
                                $tamano = $_FILES[$fileKey]['size'];
                                $temp = $_FILES[$fileKey]['tmp_name'];

                                // Validar tipo y tamaño
                                if ((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000)) {
                                    // Generar un nombre único para evitar conflictos
                                    $nombreUnico = uniqid($fileKey . '_') . '.' . pathinfo($archivo, PATHINFO_EXTENSION);

                                    // Intentar subir el archivo
                                    if (move_uploaded_file($temp, $targetDir . $nombreUnico)) {
                                        chmod($targetDir . $nombreUnico, 0777); // Cambiar permisos
                                        $datoImagenes[$fileKey] = 'views/img/productos/' . $nombreUnico; // Guardar el nombre en el array
                                    } else {
                                        echo '<div><b>Error al subir el archivo "' . $archivo . '".</b></div>';
                                    }
                                } else {
                                    echo '<div><b>Error: El archivo "' . $archivo . '" no cumple con los requisitos.</b></div>';
                                }
                            } else {
                                // Si no se subió un archivo, usar el valor existente
                                //echo '<div><b>Usando imagen preexistente para "' . $fileKey . '".</b></div>';
                            }
                            $agregarFotos = new ControladorFotosProductos();
                            $resFotos = $agregarFotos->actualizarFotosProductos($datoImagenes);
                            if ($resFotos == true) {
                                echo "<script type='text/javascript'>window.location.href = 'agctualizarProductp';</script>";
                            } else {
                                echo "<script type='text/javascript'>window.location.href = 'falloProducto';</script>";
                            }
                        }
                    }
                }
            } else {
                $dato = array(
                    'nom' => $_POST['nombre'],
                    'precio' => str_replace(',', '', $_POST['precio']),
                    'precioPromo' => str_replace(',', '', $_POST['precioPromo']),
                    'cant' => $_POST['cant'],
                    'id_categoria' => $_POST['id_categoria']
                );
                $agregar = new ModeloProducto();
                var_dump($dato);
                $res = $agregar->agregarProductoModeloTienda($dato);
                if ($res == true) {
                    $ultimoId = $agregar->obtenerUltimoIdProducto();
                    $datoInfo = array(
                        'id_producto' => $ultimoId[0]['MAX(id_producto)'],
                        'descrip' => $_POST['descrip'],
                        'infoAdd' => $_POST['infoAdd']
                    );
                    $agregarDescripcion = new ControladorDescripcionProducto();
                    $resDescrip = $agregarDescripcion->agregarDescripcionProducto($datoInfo);
                    if ($resDescrip == true) {
                        $targetDir = 'views/img/productos/';
                        // Inicializar el array de imágenes
                        $datoImagenes = [
                            'id_producto' => $ultimoId[0]['MAX(id_producto)'],
                            'portada' => null,
                            'foto1' => null,
                            'foto2' => null,
                            'foto3' => null,
                        ];

                        // Campos de archivo
                        $files = ['portada', 'foto1', 'foto2', 'foto3'];

                        foreach ($files as $fileKey) {
                            if (isset($_FILES[$fileKey]['name']) && $_FILES[$fileKey]['name'] != "") {
                                // Obtenemos información del archivo
                                $archivo = $_FILES[$fileKey]['name'];
                                $tipo = $_FILES[$fileKey]['type'];
                                $tamano = $_FILES[$fileKey]['size'];
                                $temp = $_FILES[$fileKey]['tmp_name'];

                                // Validar tipo y tamaño
                                if ((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000)) {
                                    // Generar un nombre único para evitar conflictos
                                    $nombreUnico = uniqid($fileKey . '_') . '.' . pathinfo($archivo, PATHINFO_EXTENSION);

                                    // Intentar subir el archivo
                                    if (move_uploaded_file($temp, $targetDir . $nombreUnico)) {
                                        chmod($targetDir . $nombreUnico, 0777); // Cambiar permisos
                                        $datoImagenes[$fileKey] = 'views/img/productos/' . $nombreUnico; // Guardar el nombre en el array
                                    } else {
                                        echo '<div><b>Error al subir el archivo "' . $archivo . '".</b></div>';
                                    }
                                } else {
                                    echo '<div><b>Error: El archivo "' . $archivo . '" no cumple con los requisitos.</b></div>';
                                }
                            } else {
                                echo '<div><b>No se seleccionó ningún archivo para el campo "' . $fileKey . '".</b></div>';
                            }
                        }
                        $agregarFotos = new ControladorFotosProductos();
                        $resFotos = $agregarFotos->agregarFotosProductos($datoImagenes);
                        if ($resFotos == true) {
                            echo "<script type='text/javascript'>window.location.href = 'agregarProductp';</script>";
                        } else {
                            echo "<script type='text/javascript'>window.location.href = 'falloProducto';</script>";
                        }
                    }
                }
            }
        }
        $listar = new ModeloProducto();
        $res = $listar->listarProductosModelo();
        return $res;
    }

    function consultarProductoAjaxControladorTienda($dato)
    {
        $lis = new ModeloProducto();
        $res = $lis->consultarProductoAjaxModelo($dato);
        return $res;
    }

    function listarProductoIdControlador()
    {
        if (isset($_GET['id'])) {
            $lis = new ModeloProducto();
            $res = $lis->listarProductoIdModelo($_GET['id']);
            return $res;
        }
    }
}

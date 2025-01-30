<?php
session_start();
if (isset($_SESSION['validarPagina'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Creativetec Deveopment & Tecnology <?php if (isset($_GET['action'])) {
                                                        print "|" . $_GET['action'];
                                                    } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="layout" content="main" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpg" />

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>

        <script src="views/js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
        <link href="views/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

        <style>
            #body-content {
                padding-top: 40px;
            }
        </style>
    </head>

    <body>
        <?php
        include("views/moduls/admin/narvar.php");
        ?>
        <section class="page container">
            <?php
            $mvc = new controladorViews();
            $mvc->enlacesPaginaControlador();
            ?>
        </section>
        <?php
        include("views/moduls/admin/footer.php");
        ?>

        <script src="views/js/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-alert.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-tab.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-tooltip.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-popover.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-button.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-collapse.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-carousel.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-typeahead.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-affix.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="views/js/jquery/jquery-tablesorter.js" type="text/javascript"></script>
        <script src="views/js/jquery/jquery-chosen.js" type="text/javascript"></script>
        <script src="views/js/jquery/virtual-tour.js" type="text/javascript"></script>
        <script src="views/js/pagina.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#sample-table').tablesorter();
                $('#datepicker').datepicker();
                $(".chosen").chosen();
            });
        </script>

    </body>

    </html>
<?php
} elseif (isset($_SESSION['validar'])) {
    $local = new ControladorLocal();
    $res = $local->consultarLocal($_SESSION['id_local']);
    if ($res != null) {
        $nombreSistema = $res[0]['nombre_local'];
        $nit = $res[0]['nit'];
        $tel = $res[0]['telefono'];
        $dire = $res[0]['direccion'];
        $ip = $res[0]['ip'];
    } else {
        $nombreSistema = "Inventario";
        $nit = "1111";
        $tel = "1111";
        $dire = "NNNN";
    }
    ob_start();
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $nombreSistema ?></title>
        <link rel="stylesheet" href="views/css/bootstrap.min.css" />
        <link rel="stylesheet" href="views/css/bootstrap.css" />
        <link rel="stylesheet" href="views/css/dataTables.bootstrap4.min.css" />
        <script src="views/js/jquery-3.3.1.js"></script>
        <script src="views/js/jquery.dataTables.min.js"></script>
        <script src="views/js/dataTables.bootstrap4.min.js"></script>
        <script src="views/js/sweetalert.min.js"></script>
        <link rel="stylesheet" href="views/css/login.css" />
        <link rel="stylesheet" href="views/css/perfil.css" />
        <link rel="stylesheet" href="views/css/cocina.css" />
        <link rel="stylesheet" href="views/css/config.css" />
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link rel="icon" href="views/img/logo.jpg" />
        <link rel="stylesheet" href="views/css/jquery-ui.css" />

    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php

            if (isset($_SESSION['validar'])) {
                include("views/moduls/sistema/narvar.php");
            }
            ?>
            <?php
            $mvc = new controladorViews();
            $mvc->enlacesPaginaControlador();

            $caja  = new ControladorAbrirCaja();
            $caja->abrirYCerrarCaja();
            ?>
        </div>
        <?php
        if (isset($_SESSION['validar'])) {
            include("views/moduls/sistema/footer.php");
        }
        ?>

        <div class="container">
            <div class="columns">
                <div class="column">
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="select is-rounded">
                        <select hidden id="listaDeImpresoras"></select>
                    </div>
                    <div class="field">
                        <!--<label class="label">Separador</label>-->
                        <div class="control">
                            <input hidden id="separador" value=" " class="input" type="text" maxlength="1" placeholder="El separador de columnas">
                        </div>
                    </div>
                    <div class="field">
                        <!--<label class="label">Relleno</label>-->
                        <div class="control">
                            <input hidden id="relleno" value=" " class="input" type="text" maxlength="1" placeholder="El relleno de las celdas">
                        </div>
                    </div>
                    <div class="field">
                        <!--<label class="label">Máxima longitud para el nombre</label>-->
                        <div class="control">
                            <input hidden id="maximaLongitudNombre" value="20" class="input" type="number">
                        </div>
                    </div>
                    <div class="field">
                        <!--<label class="label">Máxima longitud para la cantidad</label>-->
                        <div class="control">
                            <input hidden id="maximaLongitudCantidad" value="5" class="input" type="number">
                        </div>
                    </div>
                    <div class="field">
                        <!--<label class="label">Máxima longitud para el precio</label>-->
                        <div class="control">
                            <input hidden id="maximaLongitudPrecio" value="20" class="input" type="number">
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['estable'])) {
                        if ($_SESSION['estable'] == 1) {
                    ?>
                            <div class="field">
                                <div class="">
                                    <input type="hidden" id="<?php if ($_SESSION['estable'] == 1) { ?>btnImprimir<?php } ?>">
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                    <div class="field">
                        <div class="">
                            <input type="hidden" id="btnImprimirDomicilio">
                            <input type="hidden" id="reproducirAudio">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Recordatorio</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $evento = new ControladorEvento();
                        $res = $evento->consultarEventoVentanaControlador();
                        if (empty($res)) {
                        ?>
                            <h4 style="text-align: center;">No tienes eventos para hoy</h4>
                        <?php
                        } else {
                        ?>
                            <div class="table-responsive">
                                <table class="table" id="usuario">
                                    <thead>
                                        <tr>
                                            <th>Evento</th>
                                            <th>Descripcion</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($res as $key => $value) {
                                            $matriz = explode(" ", $value['start']);
                                        ?>
                                            <tr>
                                                <td><?php echo $value['title'] ?></td>
                                                <td><?php echo $value['descripcion'] ?></td>
                                                <td><?php echo $matriz[0] ?></td>
                                                <td><?php echo $matriz[1] ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <?php

        if (isset($_SESSION['estable'])) {
            if ($_SESSION['estable'] == 1) {
                $nombreSistema = "Comanda de Cocina";
                $mesa = "1111";
                $usuario = "1111";
        ?>
                <script>
                    var print = 0;
                    var id_mesa = 0;
                    document.addEventListener("click", async () => {
                        $.ajax({
                            url: 'views/ajax.php',
                            type: 'get',
                            dataType: 'json',
                            data: {
                                print: print
                            },
                            success: function(response) {
                                //console.log(response.nombre);

                                // Las siguientes 3 funciones fueron tomadas de: https://parzibyte.me/blog/2023/02/28/javascript-tabular-datos-limite-longitud-separador-relleno/
                                // No tienen que ver con el plugin, solo son funciones de JS creadas por mí para tabular datos y enviarlos
                                // a cualquier lugar
                                const separarCadenaEnArregloSiSuperaLongitud = (cadena, maximaLongitud) => {
                                    const resultado = [];
                                    let indice = 0;
                                    while (indice < cadena.length) {
                                        const pedazo = cadena.substring(indice, indice + maximaLongitud);
                                        indice += maximaLongitud;
                                        resultado.push(pedazo);
                                    }
                                    return resultado;
                                }
                                const dividirCadenasYEncontrarMayorConteoDeBloques = (contenidosConMaximaLongitud) => {
                                    let mayorConteoDeCadenasSeparadas = 0;
                                    const cadenasSeparadas = [];
                                    for (const contenido of contenidosConMaximaLongitud) {
                                        const separadas = separarCadenaEnArregloSiSuperaLongitud(contenido.contenido, contenido.maximaLongitud);
                                        cadenasSeparadas.push({
                                            separadas,
                                            maximaLongitud: contenido.maximaLongitud
                                        });
                                        if (separadas.length > mayorConteoDeCadenasSeparadas) {
                                            mayorConteoDeCadenasSeparadas = separadas.length;
                                        }
                                    }
                                    return [cadenasSeparadas, mayorConteoDeCadenasSeparadas];
                                }
                                const tabularDatos = (cadenas, relleno, separadorColumnas) => {
                                    const [arreglosDeContenidosConMaximaLongitudSeparadas, mayorConteoDeBloques] = dividirCadenasYEncontrarMayorConteoDeBloques(cadenas)
                                    let indice = 0;
                                    const lineas = [];
                                    while (indice < mayorConteoDeBloques) {
                                        let linea = "";
                                        for (const contenidos of arreglosDeContenidosConMaximaLongitudSeparadas) {
                                            let cadena = "";
                                            if (indice < contenidos.separadas.length) {
                                                cadena = contenidos.separadas[indice];
                                            }
                                            if (cadena.length < contenidos.maximaLongitud) {
                                                cadena = cadena + relleno.repeat(contenidos.maximaLongitud - cadena.length);
                                            }
                                            linea += cadena + separadorColumnas;
                                        }
                                        lineas.push(linea);
                                        indice++;
                                    }
                                    return lineas;
                                }


                                const obtenerListaDeImpresoras = async () => {
                                    return await ConectorPluginV3.obtenerImpresoras();
                                }
                                const URLPlugin = "http://localhost:8000"
                                const $listaDeImpresoras = document.querySelector("#listaDeImpresoras"),
                                    $btnImprimir = document.querySelector("#btnImprimir"),
                                    $separador = document.querySelector("#separador"),
                                    $relleno = document.querySelector("#relleno"),
                                    $maximaLongitudNombre = document.querySelector("#maximaLongitudNombre"),
                                    $maximaLongitudCantidad = document.querySelector("#maximaLongitudCantidad"),
                                    $maximaLongitudPrecio = document.querySelector("#maximaLongitudPrecio");
                                $maximaLongitudPrecioTotal = document.querySelector("#maximaLongitudPrecio");

                                const init = async () => {
                                    /*const impresoras = await ConectorPluginV3.obtenerImpresoras();
                                    for (const impresora of impresoras) {
                                        $listaDeImpresoras.appendChild(Object.assign(document.createElement("option"), {
                                            value: impresora,
                                            text: impresora,
                                        }));
                                    }*/
                                    $btnImprimir.addEventListener("click", () => {
                                        const nombreImpresora = "caja";
                                        if (!nombreImpresora) {
                                            return alert("Por favor seleccione una impresora. Si no hay ninguna, asegúrese de haberla compartido como se indica en: https://parzibyte.me/blog/2017/12/11/instalar-impresora-termica-generica/")
                                        }
                                        imprimirTabla("caja");
                                    });
                                }


                                const imprimirTabla = async (nombreImpresora) => {
                                    const maximaLongitudNombre = parseInt($maximaLongitudNombre.value),
                                        maximaLongitudCantidad = parseInt($maximaLongitudCantidad.value),
                                        maximaLongitudPrecio = parseInt($maximaLongitudPrecio.value),
                                        relleno = $relleno.value,
                                        separadorColumnas = $separador.value;
                                    const obtenerLineaSeparadora = () => {
                                        const lineasSeparador = tabularDatos(
                                            [{
                                                    contenido: "-",
                                                    maximaLongitud: maximaLongitudNombre
                                                },
                                                {
                                                    contenido: "-",
                                                    maximaLongitud: maximaLongitudCantidad
                                                },
                                                {
                                                    contenido: "-",
                                                    maximaLongitud: maximaLongitudPrecio
                                                },
                                            ],
                                            "-",
                                            "+",
                                        );
                                        let separadorDeLineas = "";
                                        if (lineasSeparador.length > 0) {
                                            separadorDeLineas = lineasSeparador[0]
                                        }
                                        return separadorDeLineas;
                                    }
                                    // Simple lista de ejemplo. Obviamente tú puedes traerla de cualquier otro lado,
                                    // definir otras propiedades, etcétera
                                    // Filtrar los productos por categoría
                                    const listaDeProductos = response;
                                    const bebidas = listaDeProductos.filter(producto => producto.categoria === 'Bebidas');
                                    const otrosProductos = listaDeProductos.filter(producto => producto.categoria !== 'Bebidas');
                                    //console.log(bebidas);
                                    //console.log(otrosProductos);
                                    // Comenzar a diseñar la tabla
                                    let tabla = obtenerLineaSeparadora() + "\n";
                                    let tabla1 = obtenerLineaSeparadora() + "\n";


                                    const lineasEncabezado = tabularDatos([

                                            {
                                                contenido: "Nombre",
                                                maximaLongitud: maximaLongitudNombre
                                            },
                                            {
                                                contenido: "Cantidad",
                                                maximaLongitud: maximaLongitudCantidad
                                            },
                                            {
                                                contenido: "Descripcion",
                                                maximaLongitud: maximaLongitudPrecio
                                            },
                                        ],
                                        relleno,
                                        separadorColumnas,
                                    );

                                    for (const linea of lineasEncabezado) {
                                        tabla += linea + "\n";
                                        tabla1 += linea + "\n";
                                    }
                                    tabla += obtenerLineaSeparadora() + "\n";
                                    if (bebidas.length > 0) {
                                        for (const producto of bebidas) {
                                            const lineas = tabularDatos(
                                                [{
                                                        contenido: producto.nombre,
                                                        maximaLongitud: maximaLongitudNombre
                                                    },
                                                    {
                                                        contenido: producto.cantidad.toString(),
                                                        maximaLongitud: maximaLongitudCantidad
                                                    },
                                                    {
                                                        contenido: producto.descripcion.toString(),
                                                        maximaLongitud: maximaLongitudPrecio
                                                    },
                                                ],
                                                relleno,
                                                separadorColumnas
                                            );
                                            for (const linea of lineas) {
                                                tabla += linea + "\n";
                                            }
                                            tabla += obtenerLineaSeparadora() + "\n";
                                        }
                                        console.log(tabla);
                                    }
                                    if (otrosProductos.length > 0) {
                                        for (const producto of otrosProductos) {
                                            const lineas = tabularDatos(
                                                [{
                                                        contenido: producto.nombre,
                                                        maximaLongitud: maximaLongitudNombre
                                                    },
                                                    {
                                                        contenido: producto.cantidad.toString(),
                                                        maximaLongitud: maximaLongitudCantidad
                                                    },
                                                    {
                                                        contenido: producto.descripcion.toString(),
                                                        maximaLongitud: maximaLongitudPrecio
                                                    },
                                                ],
                                                relleno,
                                                separadorColumnas
                                            );
                                            for (const linea of lineas) {
                                                tabla1 += linea + "\n";
                                            }
                                            tabla1 += obtenerLineaSeparadora() + "\n";
                                        }
                                        console.log(tabla1);
                                    }
                                    const conector = new ConectorPluginV3(URLPlugin);

                                    $.ajax({
                                        url: 'views/ajax.php',
                                        type: 'GET',
                                        dataType: 'json',
                                        data: {
                                            printUsuario: print
                                        },
                                        success: async function(response) {
                                            const listarPedido = response;
                                            for (const producto of listarPedido) {
                                                if (bebidas.length > 0) {

                                                    // Extraer el valor específico del array devuelto
                                                    const respuesta = await conector
                                                        .Iniciar()
                                                        .EstablecerTamañoFuente(1, 1)
                                                        .DeshabilitarElModoDeCaracteresChinos()
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_CENTRO)
                                                        //.DescargarImagenDeInternetEImprimir("", 0, 216)
                                                        .Feed(1)
                                                        .EscribirTexto("<?php echo $nombreSistema ?>\n")
                                                        .TextoSegunPaginaDeCodigos(2, "cp850", producto.mesa + "\n")
                                                        .EscribirTexto("Fecha: " + (new Intl.DateTimeFormat("es-MX").format(new Date())) + "\n")
                                                        .TextoSegunPaginaDeCodigos(2, "cp850", " Atendido por:" + producto.nombre + " " + producto.apellido + "\n")
                                                        .Feed(1)
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_IZQUIERDA)
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_DERECHA)
                                                        .EscribirTexto(tabla)
                                                        .EscribirTexto("------------------------------------------------\n")
                                                        .Feed(3)
                                                        .Corte(1)
                                                        .Pulso(48, 60, 120)
                                                        .imprimirEn("caja");
                                                    //.imprimirEnImpresoraRemota("cocina", "http://<?php echo $ip ?>:8000" + "/imprimir");
                                                    if (respuesta === true) {
                                                        $.ajax({
                                                            url: 'views/ajax.php',
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            data: {
                                                                respuestaPrint: print,
                                                                id: id_mesa
                                                            },
                                                            success: async function(response) {
                                                                if (response == true) {
                                                                    location.reload();
                                                                }
                                                            },
                                                            error: function(xhr, status, error) {
                                                                // Mostrar error si hay algún problema con la solicitud AJAX
                                                                $('#valorEspecifico').text('Error: ' + error);
                                                            }
                                                        });

                                                    } else {
                                                        alert("Error: " + respuesta);
                                                    }

                                                }
                                                if (otrosProductos.length > 0) {
                                                    // Extraer el valor específico del array devuelto
                                                    const respuesta = await conector
                                                        .Iniciar()
                                                        .DeshabilitarElModoDeCaracteresChinos()
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_CENTRO)
                                                        //.DescargarImagenDeInternetEImprimir("", 0, 216)
                                                        .Feed(1)
                                                        .EscribirTexto("<?php echo $nombreSistema ?>\n")
                                                        .TextoSegunPaginaDeCodigos(2, "cp850", producto.mesa + "\n")
                                                        .EscribirTexto("Fecha: " + (new Intl.DateTimeFormat("es-MX").format(new Date())) + "\n")
                                                        .TextoSegunPaginaDeCodigos(2, "cp850", " Atendido por:" + producto.nombre + " " + producto.apellido + "\n")
                                                        .Feed(1)
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_IZQUIERDA)
                                                        .EstablecerAlineacion(ConectorPluginV3.ALINEACION_DERECHA)
                                                        .EscribirTexto(tabla1)
                                                        .EscribirTexto("------------------------------------------------\n")
                                                        .Feed(3)
                                                        .Corte(1)
                                                        .Pulso(48, 60, 120)
                                                        //.imprimirEn("caja");
                                                        .imprimirEnImpresoraRemota("cocina", "http://<?php echo $ip ?>:8000" + "/imprimir");
                                                    if (respuesta === true) {
                                                        $.ajax({
                                                            url: 'views/ajax.php',
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            data: {
                                                                respuestaPrint: print,
                                                                id: id_mesa
                                                            },
                                                            success: async function(response) {
                                                                if (response == true) {
                                                                    location.reload();
                                                                }
                                                            },
                                                            error: function(xhr, status, error) {
                                                                // Mostrar error si hay algún problema con la solicitud AJAX
                                                                $('#valorEspecifico').text('Error: ' + error);
                                                            }
                                                        });

                                                    } else {
                                                        alert("Error: " + respuesta);
                                                    }

                                                }
                                            }

                                        },
                                        error: function(xhr, status, error) {
                                            // Mostrar error si hay algún problema con la solicitud AJAX
                                            $('#valorEspecifico').text('Error: ' + error);
                                        }
                                    });
                                }
                                init();


                            },
                            error: function(xhr, status, error) {
                                // Mostrar error si hay algún problema con la solicitud AJAX
                                $('#respuestaServidor').text('Error: ' + error);
                            }
                        });
                    });
                </script>
        <?php
            }
        }
        //impresion DOmicilio
        ?>
        <script>
            var printDomicilio = 0;
            var id_mesa = 0;
            document.addEventListener("click", async () => {
                $.ajax({
                    url: 'views/ajax.php',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        printDomicilio: printDomicilio
                    },
                    success: function(response) {
                        //console.log(response);

                        // Las siguientes 3 funciones fueron tomadas de: https://parzibyte.me/blog/2023/02/28/javascript-tabular-datos-limite-longitud-separador-relleno/
                        // No tienen que ver con el plugin, solo son funciones de JS creadas por mí para tabular datos y enviarlos
                        // a cualquier lugar
                        const separarCadenaEnArregloSiSuperaLongitud = (cadena, maximaLongitud) => {
                            const resultado = [];
                            let indice = 0;
                            while (indice < cadena.length) {
                                const pedazo = cadena.substring(indice, indice + maximaLongitud);
                                indice += maximaLongitud;
                                resultado.push(pedazo);
                            }
                            return resultado;
                        }
                        const dividirCadenasYEncontrarMayorConteoDeBloques = (contenidosConMaximaLongitud) => {
                            let mayorConteoDeCadenasSeparadas = 0;
                            const cadenasSeparadas = [];
                            for (const contenido of contenidosConMaximaLongitud) {
                                const separadas = separarCadenaEnArregloSiSuperaLongitud(contenido.contenido, contenido.maximaLongitud);
                                cadenasSeparadas.push({
                                    separadas,
                                    maximaLongitud: contenido.maximaLongitud
                                });
                                if (separadas.length > mayorConteoDeCadenasSeparadas) {
                                    mayorConteoDeCadenasSeparadas = separadas.length;
                                }
                            }
                            return [cadenasSeparadas, mayorConteoDeCadenasSeparadas];
                        }
                        const tabularDatos = (cadenas, relleno, separadorColumnas) => {
                            const [arreglosDeContenidosConMaximaLongitudSeparadas, mayorConteoDeBloques] = dividirCadenasYEncontrarMayorConteoDeBloques(cadenas)
                            let indice = 0;
                            const lineas = [];
                            while (indice < mayorConteoDeBloques) {
                                let linea = "";
                                for (const contenidos of arreglosDeContenidosConMaximaLongitudSeparadas) {
                                    let cadena = "";
                                    if (indice < contenidos.separadas.length) {
                                        cadena = contenidos.separadas[indice];
                                    }
                                    if (cadena.length < contenidos.maximaLongitud) {
                                        cadena = cadena + relleno.repeat(contenidos.maximaLongitud - cadena.length);
                                    }
                                    linea += cadena + separadorColumnas;
                                }
                                lineas.push(linea);
                                indice++;
                            }
                            return lineas;
                        }


                        const obtenerListaDeImpresoras = async () => {
                            return await ConectorPluginV3.obtenerImpresoras();
                        }
                        const URLPlugin = "http://localhost:8000"
                        const $listaDeImpresoras = document.querySelector("#listaDeImpresoras"),
                            $btnImprimir = document.querySelector("#btnImprimirDomicilio"),
                            $separador = document.querySelector("#separador"),
                            $relleno = document.querySelector("#relleno"),
                            $maximaLongitudNombre = document.querySelector("#maximaLongitudNombre"),
                            $maximaLongitudCantidad = document.querySelector("#maximaLongitudCantidad"),
                            $maximaLongitudPrecio = document.querySelector("#maximaLongitudPrecio");
                        $maximaLongitudPrecioTotal = document.querySelector("#maximaLongitudPrecio");

                        const init = async () => {
                            /*const impresoras = await ConectorPluginV3.obtenerImpresoras();
                            for (const impresora of impresoras) {
                                $listaDeImpresoras.appendChild(Object.assign(document.createElement("option"), {
                                    value: impresora,
                                    text: impresora,
                                }));
                            }*/
                            $btnImprimir.addEventListener("click", () => {
                                const nombreImpresora = "caja";
                                if (!nombreImpresora) {
                                    return alert("Por favor seleccione una impresora. Si no hay ninguna, asegúrese de haberla compartido como se indica en: https://parzibyte.me/blog/2017/12/11/instalar-impresora-termica-generica/")
                                }
                                imprimirTabla("caja");
                            });
                        }


                        const imprimirTabla = async (nombreImpresora) => {
                            const maximaLongitudNombre = parseInt($maximaLongitudNombre.value),
                                maximaLongitudCantidad = parseInt($maximaLongitudCantidad.value),
                                maximaLongitudPrecio = parseInt($maximaLongitudPrecio.value),
                                relleno = $relleno.value,
                                separadorColumnas = $separador.value;
                            const obtenerLineaSeparadora = () => {
                                const lineasSeparador = tabularDatos(
                                    [{
                                            contenido: "-",
                                            maximaLongitud: maximaLongitudNombre
                                        },
                                        {
                                            contenido: "-",
                                            maximaLongitud: maximaLongitudCantidad
                                        },
                                        {
                                            contenido: "-",
                                            maximaLongitud: maximaLongitudPrecio
                                        },
                                    ],
                                    "-",
                                    "+",
                                );
                                let separadorDeLineas = "";
                                if (lineasSeparador.length > 0) {
                                    separadorDeLineas = lineasSeparador[0]
                                }
                                return separadorDeLineas;
                            }
                            // Simple lista de ejemplo. Obviamente tú puedes traerla de cualquier otro lado,
                            // definir otras propiedades, etcétera
                            // Filtrar los productos por categoría
                            const listaDeProductos = response;
                            const bebidas = listaDeProductos.filter(producto => producto.categoria === 'Bebidas');
                            const otrosProductos = listaDeProductos.filter(producto => producto.categoria !== 'Bebidas');
                            //console.log(bebidas);
                            //console.log(otrosProductos);
                            // Comenzar a diseñar la tabla
                            let tabla = obtenerLineaSeparadora() + "\n";
                            let tabla1 = obtenerLineaSeparadora() + "\n";


                            const lineasEncabezado = tabularDatos([

                                    {
                                        contenido: "Nombre",
                                        maximaLongitud: maximaLongitudNombre
                                    },
                                    {
                                        contenido: "Cantidad",
                                        maximaLongitud: maximaLongitudCantidad
                                    },
                                    {
                                        contenido: "Descripcion",
                                        maximaLongitud: maximaLongitudPrecio
                                    },
                                ],
                                relleno,
                                separadorColumnas,
                            );

                            for (const linea of lineasEncabezado) {
                                tabla += linea + "\n";
                                tabla1 += linea + "\n";
                            }
                            tabla += obtenerLineaSeparadora() + "\n";
                            if (bebidas.length > 0) {
                                for (const producto of bebidas) {
                                    const lineas = tabularDatos(
                                        [{
                                                contenido: producto.nombre,
                                                maximaLongitud: maximaLongitudNombre
                                            },
                                            {
                                                contenido: producto.cantidad.toString(),
                                                maximaLongitud: maximaLongitudCantidad
                                            },
                                            {
                                                contenido: producto.descripcion.toString(),
                                                maximaLongitud: maximaLongitudPrecio
                                            },
                                        ],
                                        relleno,
                                        separadorColumnas
                                    );
                                    for (const linea of lineas) {
                                        tabla += linea + "\n";
                                    }
                                    tabla += obtenerLineaSeparadora() + "\n";
                                }
                                console.log(tabla);
                            }
                            if (otrosProductos.length > 0) {
                                for (const producto of otrosProductos) {
                                    const lineas = tabularDatos(
                                        [{
                                                contenido: producto.nombre,
                                                maximaLongitud: maximaLongitudNombre
                                            },
                                            {
                                                contenido: producto.cantidad.toString(),
                                                maximaLongitud: maximaLongitudCantidad
                                            },
                                            {
                                                contenido: producto.descripcion.toString(),
                                                maximaLongitud: maximaLongitudPrecio
                                            },
                                        ],
                                        relleno,
                                        separadorColumnas
                                    );
                                    for (const linea of lineas) {
                                        tabla1 += linea + "\n";
                                    }
                                    tabla1 += obtenerLineaSeparadora() + "\n";
                                }
                                console.log(tabla1);
                            }
                            const conector = new ConectorPluginV3(URLPlugin);

                            $.ajax({
                                url: 'views/ajax.php',
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    printCliente: printDomicilio
                                },
                                success: async function(response) {
                                    const listarPedido = response;
                                    for (const producto of listarPedido) {
                                        if (bebidas.length > 0) {

                                            // Extraer el valor específico del array devuelto
                                            const respuesta = await conector
                                                .Iniciar()
                                                .EstablecerTamañoFuente(1, 1)
                                                .DeshabilitarElModoDeCaracteresChinos()
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_CENTRO)
                                                //.DescargarImagenDeInternetEImprimir("", 0, 216)
                                                .Feed(1)
                                                .EscribirTexto("<?php echo $nombreSistema ?>\n")
                                                .EscribirTexto("Fecha: " + (new Intl.DateTimeFormat("es-MX").format(new Date())) + "\n")
                                                .TextoSegunPaginaDeCodigos(2, "cp850", " Cliente:" + producto.nombre + "\n")
                                                .Feed(1)
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_IZQUIERDA)
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_DERECHA)
                                                .EscribirTexto(tabla)
                                                .EscribirTexto("------------------------------------------------\n")
                                                .Feed(3)
                                                .Corte(1)
                                                .Pulso(48, 60, 120)
                                                .imprimirEn("caja");
                                            //.imprimirEnImpresoraRemota("cocina", "http://<?php echo $ip ?>:8000" + "/imprimir");
                                            if (respuesta === true) {
                                                $.ajax({
                                                    url: 'views/ajax.php',
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    data: {
                                                        respuestaPrintDomicilio: printDomicilio,
                                                        id: producto.id
                                                    },
                                                    success: async function(response) {
                                                        if (response == true) {
                                                            location.reload();
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Mostrar error si hay algún problema con la solicitud AJAX
                                                        $('#valorEspecifico').text('Error: ' + error);
                                                    }
                                                });

                                            } else {
                                                $.ajax({
                                                    url: 'views/ajax.php',
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    data: {
                                                        respuestaPrintDomicilio: printDomicilio,
                                                        id: producto.id
                                                    },
                                                    success: async function(response) {
                                                        if (response == true) {
                                                            location.reload();
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Mostrar error si hay algún problema con la solicitud AJAX
                                                        $('#valorEspecifico').text('Error: ' + error);
                                                    }
                                                });
                                                alert("Error: " + respuesta);
                                            }

                                        }
                                        if (otrosProductos.length > 0) {
                                            // Extraer el valor específico del array devuelto
                                            const respuesta = await conector
                                                .Iniciar()
                                                .DeshabilitarElModoDeCaracteresChinos()
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_CENTRO)
                                                //.DescargarImagenDeInternetEImprimir("", 0, 216)
                                                .Feed(1)
                                                .EscribirTexto("<?php echo $nombreSistema ?>\n")
                                                .EscribirTexto("Fecha: " + (new Intl.DateTimeFormat("es-MX").format(new Date())) + "\n")
                                                .TextoSegunPaginaDeCodigos(2, "cp850", " Cliente:" + producto.nombre + "\n")
                                                .Feed(1)
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_IZQUIERDA)
                                                .EstablecerAlineacion(ConectorPluginV3.ALINEACION_DERECHA)
                                                .EscribirTexto(tabla1)
                                                .EscribirTexto("------------------------------------------------\n")
                                                .Feed(3)
                                                .Corte(1)
                                                .Pulso(48, 60, 120)
                                                .imprimirEn("caja");
                                            //.imprimirEnImpresoraRemota("cocina", "http://<?php echo $ip ?>:8000" + "/imprimir");
                                            if (respuesta === true) {
                                                $.ajax({
                                                    url: 'views/ajax.php',
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    data: {
                                                        respuestaPrintDomicilio: printDomicilio,
                                                        id: producto.id
                                                    },
                                                    success: async function(response) {
                                                        if (response == true) {
                                                            location.reload();
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Mostrar error si hay algún problema con la solicitud AJAX
                                                        $('#valorEspecifico').text('Error: ' + error);
                                                    }
                                                });

                                            } else {
                                                $.ajax({
                                                    url: 'views/ajax.php',
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    data: {
                                                        respuestaPrintDomicilio: printDomicilio,
                                                        id: producto.id
                                                    },
                                                    success: async function(response) {
                                                        if (response == true) {
                                                            location.reload();
                                                        }
                                                    },
                                                    error: function(xhr, status, error) {
                                                        // Mostrar error si hay algún problema con la solicitud AJAX
                                                        $('#valorEspecifico').text('Error: ' + error);
                                                    }
                                                });
                                                alert("Error: " + respuesta);
                                            }

                                        }
                                    }

                                },
                                error: function(xhr, status, error) {
                                    // Mostrar error si hay algún problema con la solicitud AJAX
                                    $('#valorEspecifico').text('Error: ' + error);
                                }
                            });
                        }
                        init();


                    },
                    error: function(xhr, status, error) {
                        // Mostrar error si hay algún problema con la solicitud AJAX
                        $('#respuestaServidor').text('Error: ' + error);
                    }
                });
            });
        </script>

    </body>
    <script src="views/js/table.js"></script>

    <!-- Bootstrap core JavaScript-->
    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->

    <!-- Custom scripts for all pages-->
    <script src="views/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="views/js/demo/chart-area-demo.js"></script>
    <script src="views/js/demo/chart-pie-demo.js"></script>
    <script src="views/js/jquery-ui.js"></script>
    <script src="views/js/ConectorJavaScript.js"></script>
    <script src="views/js/js.js"></script>
    <script src="assets/js/js.js"></script>




    </html>
<?php
} elseif (isset($_SESSION['tienda'])) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PROVERPET <?php if (isset($_GET['action'])) {
                                print "| " . $_GET['action'];
                            } ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="views/img/logo2.jpeg" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="views/js/sweetalert.min.js"></script>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="views/lib/tienda/animate/animate.min.css" rel="stylesheet">
        <link href="views/lib/tienda/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="views/css/tienda/style.css" rel="stylesheet">
        <link rel="stylesheet" href="views/css/jquery-ui.css" />

    </head>

    <body>
        <?php
        include("views/moduls/tienda/narvar.php");
        ?>
        <?php
        $mvc = new controladorViews();
        $mvc->enlacesPaginaControlador();
        ?>
        </div>
        <?php
        include("views/moduls/tienda/footer.php");
        ?>
    </body>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="views/lib/tienda/easing/easing.min.js"></script>
    <script src="views/lib/tienda/owlcarousel/owl.carousel.min.js"></script>
    <script src="views/js/jquery-ui.js"></script>
    <!-- Contact Javascript File -->
    <script src="views/mail/tienda/jqBootstrapValidation.min.js"></script>
    <script src="views/mail/tienda/contact.js"></script>

    <!-- Template Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="views/js/tienda/main.js"></script>
    <script src="views/js/tienda.js"></script>
    <script src="views/js/table.js"></script>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] != 'domicilioPedido' && $_GET['action'] != 'domicilioEnviado') {

    ?>

            <head>

                <meta charset="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta http-equiv="x-ua-compatible" content="ie=edge" />
                <title>Creativetec Deveopment & Tecnology <?php if (isset($_GET['action'])) {
                                                                print "|" . $_GET['action'];
                                                            } ?></title>
                <meta name="description" content="" />
                <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpg" />
                <!-- Place favicon.ico in the root directory -->

                <!-- Web Font -->
                <link
                    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
                    rel="stylesheet">

                <!-- ========================= CSS here ========================= -->
                <link rel="stylesheet" href="assets/css/style.css">
                <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
                <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
                <link rel="stylesheet" href="assets/css/animate.css" />
                <link rel="stylesheet" href="assets/css/tiny-slider.css" />
                <link rel="stylesheet" href="assets/css/glightbox.min.css" />
                <link rel="stylesheet" href="assets/css/main.css" />
                <link rel="stylesheet" href="assets/css/reset.css" />
                <link rel="stylesheet" href="assets/css/responsive.css" />
                <script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
                <script src="views/js/sweetalert.min.js"></script>
                <script src="views/js/jquery-3.3.1.js"></script>

            </head>

            <body>
                <?php
                if (isset($_GET['action'])) {
                    if ($_GET['action'] != 'ingresar' && $_GET['action'] != 'loginFallido' && $_GET['action'] != 'loginInactivo' && $_GET['action'] != 'LoginSuspendidoPorPago') {
                        include("views/moduls/narvar.php");
                    } else {
                    }
                } else {
                    include("views/moduls/narvar.php");
                }
                ?>
                <?php
                $mvc = new controladorViews();
                $mvc->enlacesPaginaControlador();
                ?>
                <?php
                if (isset($_GET['action'])) {
                    if ($_GET['action'] != 'ingresar' && $_GET['action'] != 'loginFallido' && $_GET['action'] != 'loginInactivo' && $_GET['action'] != 'LoginSuspendidoPorPago') {
                        include("views/moduls/footer.php");
                    }
                } else {
                    include("views/moduls/footer.php");
                }
                ?>

                <!-- ========================= scroll-top ========================= -->
                <a href="#" class="scroll-top btn-hover">
                    <i class="lni lni-chevron-up"></i>
                </a>

                <!-- ========================= JS here ========================= -->
                <script src="assets/js/bootstrap.min.js"></script>
                <script src="assets/js/count-up.min.js"></script>
                <script src="assets/js/wow.min.js"></script>
                <script src="assets/js/tiny-slider.js"></script>
                <script src="assets/js/glightbox.min.js"></script>
                <script src="assets/js/imagesloaded.min.js"></script>
                <script src="assets/js/isotope.min.js"></script>
                <script src="assets/js/main.js"></script>
                <script src="assets/js/js.js"></script>

            <?php
        } else {

            ?>

                <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>Domicilio</title>
                    <link rel="stylesheet" href="views/css/bootstrap.min.css" />
                    <link rel="stylesheet" href="views/css/bootstrap.css" />
                    <link rel="stylesheet" href="views/css/dataTables.bootstrap4.min.css" />
                    <script src="views/js/jquery-3.3.1.js"></script>
                    <script src="views/js/jquery.dataTables.min.js"></script>
                    <script src="views/js/dataTables.bootstrap4.min.js"></script>
                    <script src="views/js/sweetalert.min.js"></script>
                    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
                    <link rel="icon" href="views/img/logo.jpg" />
                    <link rel="stylesheet" href="views/css/jquery-ui.css" />

                </head>
                <?php
                $mvc = new controladorViews();
                $mvc->enlacesPaginaControlador();
                ?>
                <script src="views/js/table.js"></script>

                <!-- Bootstrap core JavaScript-->
                <!--<script src="vendor/jquery/jquery.min.js"></script>-->
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="views/js/jquery-ui.js"></script>
                <script src="views/js/ConectorJavaScript.js"></script>
                <script src="views/js/js.js"></script>
            <?php
        }
            ?>

    </html>
<?php
    } else {
?>

    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Creativetec Deveopment & Tecnology <?php if (isset($_GET['action'])) {
                                                        print "|" . $_GET['action'];
                                                    } ?></title>
        <meta name="description" content="" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpg" />
        <!-- Place favicon.ico in the root directory -->

        <!-- Web Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
        <link rel="stylesheet" href="assets/css/animate.css" />
        <link rel="stylesheet" href="assets/css/tiny-slider.css" />
        <link rel="stylesheet" href="assets/css/glightbox.min.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/reset.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
        <script src="views/js/sweetalert.min.js"></script>
        <script src="views/js/jquery-3.3.1.js"></script>

    </head>

    <body>
        <?php
        if (isset($_GET['action'])) {
            if ($_GET['action'] != 'ingresar' && $_GET['action'] != 'loginFallido' && $_GET['action'] != 'loginInactivo' && $_GET['action'] != 'LoginSuspendidoPorPago') {
                include("views/moduls/narvar.php");
            } else {
            }
        } else {
            include("views/moduls/narvar.php");
        }
        ?>
        <?php
        $mvc = new controladorViews();
        $mvc->enlacesPaginaControlador();
        ?>
        <?php
        if (isset($_GET['action'])) {
            if ($_GET['action'] != 'ingresar' && $_GET['action'] != 'loginFallido' && $_GET['action'] != 'loginInactivo' && $_GET['action'] != 'LoginSuspendidoPorPago') {
                include("views/moduls/footer.php");
            }
        } else {
            include("views/moduls/footer.php");
        }
        ?>

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>

        <!-- ========================= JS here ========================= -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/count-up.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/tiny-slider.js"></script>
        <script src="assets/js/glightbox.min.js"></script>
        <script src="assets/js/imagesloaded.min.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/js.js"></script>
<?php
    }
}
?>
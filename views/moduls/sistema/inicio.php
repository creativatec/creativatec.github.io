<?php
if ($_SESSION['rol'] == "Mesero") {
    echo '<script>window.location="mesas"</script>';
}
if ($_SESSION['rol'] == "Cocina") {
    echo '<script>window.location="cocina"</script>';
}
if ($_SESSION['rol'] == "Cajero" || $_SESSION['rol'] == "Gerente") {
    echo '<script>window.location="caja"</script>';
}
if ($_SESSION['rol'] == "Domiciliario") {
    echo '<script>window.location="domicilio"</script>';
}
//Ventas mensuales y anuales
$venta = new ControladorVenta();
$mesual = $venta->ganaciasMensualesVenta();
$anual = $venta->ganaciasAnualesVenta();
//Gasto mensual
$gastos = new ControladorGasto();
$gastoMensual = $gastos->gastosMensuales();
$gastoAnual = $gastos->gastosAnueales();
//Factura mensual
$proeevedor = new ControladorFacturaProeevedor();
$gastoproeevedor = $proeevedor->gastosMensualesFactura();
$gastoproeevedorAnual = $proeevedor->gastosAnualesFactura();
//nomina mensual
$nomina = new ControladorNomina();
$nominaMes = $nomina->nominaMes();
$nominaAnual = $nomina->nominaAnual();

//calcular gastos reales ventas mensuales.
// Función para convertir formato monetario a número
function convertirMonedaANumero($monto)
{
    return floatval(str_replace(['$', ',', ' '], '', $monto));
}

// Convertir los valores de cadena a números
$ventasMesNum = convertirMonedaANumero($mesual[0]["CONCAT('$', FORMAT(SUM(precio_compra), '$#,##0.00'))"]);
$gastoproeevedorNum = convertirMonedaANumero($gastoproeevedor[0]["CONCAT('$', FORMAT(SUM(DISTINCT(pago_factura)), '$#,##0.00'))"]);
$gastoMensualNum = convertirMonedaANumero($gastoMensual[0]["CONCAT('$', FORMAT(SUM(total), '$#,##0.00'))"]);
$nominaMensualNum = convertirMonedaANumero($nominaAnual[0]["CONCAT('$', FORMAT(SUM(pago), '$#,##0.00'))"]);

$ventasAnualNum = convertirMonedaANumero($anual[0]["CONCAT('$', FORMAT(SUM(precio_compra), '$#,##0.00'))"]);
$gastoproeevedorAnualNum = convertirMonedaANumero($gastoproeevedorAnual[0]["CONCAT('$', FORMAT(SUM(DISTINCT(pago_factura)), '$#,##0.00'))"]);
$gastoAnualNum = convertirMonedaANumero($gastoAnual[0]["CONCAT('$', FORMAT(SUM(total), '$#,##0.00'))"]);
$nominaAnualNum = convertirMonedaANumero($nominaAnual[0]["CONCAT('$', FORMAT(SUM(pago), '$#,##0.00'))"]);

// Realizar la resta mes
$resultado = $ventasMesNum - $gastoproeevedorNum - $gastoMensualNum - $nominaMensualNum;
//Realizar la suma gastos
$resultado1 = $gastoproeevedorNum + $gastoMensualNum + $nominaMensualNum;
//Realizar la resta anual 
$resultado2 = $ventasAnualNum - $gastoproeevedorAnualNum - $gastoAnualNum - $nominaAnualNum;
// Formatear el resultado de nuevo a formato monetario
$ventasMes = '$' . number_format($resultado, 0, '.', ',');
$gastosMes = '$' . number_format($resultado1, 0, '.', ',');
$ventaAnual = '$' . number_format($resultado2, 0, '.', ',');
if ($_SESSION['fin'] > 0) {
} else {
    if (isset($ress[0]['valor'])) {
        if ($ress[0]['valor'] <= 0) {
            # code...
        } else {
            print "<script>
            $(document).ready(function() {
                $('#caducidadModal').modal('toggle')
            });
        </script>";
        }
    }
}
?>

<div class="modal fade" id="caducidadModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">¡Atención!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ya han caducado los 30 días hábiles. Te quedan 7 días para pagar antes de que se desactive el sistema. Por favor, envía la confirmación de tu pago a través de un correo electrónico.
                <br>
                Total A pagar $<?php echo number_format($ress[0]['valor'], 0) ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="abrirModal">Enviar Correo</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="comprobanteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Enviar Comprobante de Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="comprobanteForm">
                    <div class="form-group">
                        <label for="nombreEstablecimiento">Nombre del Establecimiento:</label>
                        <input type="text" class="form-control" id="nombreEstablecimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="comprobantePago">Foto del Comprobante de Pago:</label>
                        <input type="file" class="form-control-file" id="comprobantePago" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#exampleModalCenter').modal('toggle')
    });
    $(document).ready(function() {
        // Abre el modal principal de reportes
        $('#reportes').on('click', function() {
            $('#reporte').modal('toggle');
        });

        // Reporte de ventas del mes
        $('#reporteventa').on('click', function() {
            $('#reporte').modal('hide');
            $('#reporte').on('hidden.bs.modal', function() {
                $('#reporteventames').modal('show');
                // Quitamos el listener para evitar múltiples aperturas
                $('#reporte').off('hidden.bs.modal');
            });
        });

        // Reporte de productos vendidos del mes
        $('#reporteproductos').on('click', function() {
            $('#reporte').modal('hide');
            $('#reporte').on('hidden.bs.modal', function() {
                $('#reporteproductosmes').modal('show');
                $('#reporte').off('hidden.bs.modal');
            });
        });
    });

    function calcularSemana() {
        const inicio = document.getElementById('ini').value;
        if (inicio) {
            const fechaInicio = new Date(inicio);
            fechaInicio.setDate(fechaInicio.getDate() + 7); // Sumar 7 días
            const dia = ("0" + fechaInicio.getDate()).slice(-2); // Formato de dos dígitos
            const mes = ("0" + (fechaInicio.getMonth() + 1)).slice(-2); // Formato de mes
            const anio = fechaInicio.getFullYear();
            const fechaFin = `${anio}-${mes}-${dia}`;
            document.getElementById('fin').value = fechaFin;
        }
    }
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="reportes" data-bs-toggle="modal" data-bs-target="#reporte">
            <i class="fas fa-download fa-sm text-white-50">Generar Reporte</i>
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg
        ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Reportes</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <a href="views/excel.php?producto=<?php echo $_SESSION['id_local'] ?>" class="btn btn-primary">Reporte Productos</a>
                                <a href="views/excel.php?ingrediente=<?php echo $_SESSION['id_local'] ?>" class="btn btn-primary" type="button">Reporte Ingredientes</a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary" id="reporteproductos">
                                    Reporte Productos Vendidos del Mes
                                </button>

                                <button type="button" class="btn btn-primary" id="reporteventa">
                                    Generar Reporte Venta Mes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="reporteventames" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg
        ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Reportes Venta mes</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <form action="views/excel.php" method="get">
                                    <label for="">Mes</label>
                                    <input type="month" name="mes" id="mes" class="form-control">
                                    <input type="hidden" name="ventaMes" id="" value="<?php echo $_SESSION['id_local'] ?>">
                                    <button class="btn btn-primary  mt-3" type="submit">Generar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reporteproductosmes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg
        ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generar Reportes Productos mes</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="d-grid gap-2">
                                <form action="views/excel.php" method="get">
                                    <div class="form-group">
                                        <label for="">Inicio</label>
                                        <input type="date" name="inicio" id="ini" class="form-control" onchange="calcularSemana()">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fin</label>
                                        <input type="date" name="fin" id="fin" class="form-control">
                                    </div>
                                    <input type="hidden" name="productoMes" id="" value="<?php echo $_SESSION['id_local'] ?>">
                                    <button class="btn btn-primary  mt-3" type="submit">Generar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- GANANCIAS (MENSUALES) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                GANANCIAS (MENSUALES)</div>
                            <!--<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $mesual[0]["CONCAT('$', FORMAT(SUM(precio_compra), '$#,##0.00'))"] ?></div>-->
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ventasMes ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GASTOS (MENSUALES) Card Example -->

        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                GASTOS (MENSUALES)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $gastosMes ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GASTOS (MENSUALES) Card Example -->

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                GANANCIAS(ANUALES)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $ventaAnual ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!--<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Pending Requests Card Example -->
        <!--<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafica Ventas Mensuales</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Productos Más vendidos</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <?php
                        $con = new ModeloVenta();
                        $listarProducto = $con->listarProductosVendidos();
                        foreach ($listarProducto as $key => $value) {
                            $nombre = $value['nombre'];
                            print "<span class='mr-2'>
                            <i class='fas fa-circle text-primary'></i> $nombre
                        </span>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <!--<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Productos Más vendidos Por Mes</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">30%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>-->

            <!-- Color System -->
            <!--div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>-->

            <!--<div class="col-lg-6 mb-4">

             Illustrations 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="views/img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

             Approach 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>-->
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
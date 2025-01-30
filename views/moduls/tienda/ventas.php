<?php
$lis = new ControladorFactura();
$res = $lis->listarFactura();
if (isset($_GET['id'])) {
    $lis = new ControladorVenta();
    $resventa = $lis->listarVentaFactura($_GET['id']);
}
?>
<div class="container">
    <div class="row">
        <div class="col-ms-4">
            <form action="" method="post">
                <input type="date" name="fecha" class="form-control" name="fecha">
                <button name="buscar" class="btn btn-primary mt-2">Buscar</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="table-responsive">
                <table id="productos" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Envio</th>
                            <th>Total Factura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($res as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['id_factura'] ?></td>
                                <td><?php echo $value['token'] ?></td>
                                <td><?php echo $value['fecha'] ?></td>
                                <td><?php echo number_format($value['envio'], 0) ?></td>
                                <td><?php echo number_format($value['total'], 0) ?></td>
                                <td><a href="index.php?action=ventas&id=<?php echo $value['id_factura'] ?>">Ver</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Precio Promocion</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Agregar Productos-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Factura <?php echo $_GET['id'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Envio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resventa as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value['nombre'] ?></td>
                                    <td><?php echo number_format($value['precio_venta'], 0) ?></td>
                                    <td><?php echo $value['canti_venta'] ?></td>
                                    <td><?php echo number_format(5000, 0) ?></td>
                                    <td><?php echo number_format($value['precio_cantidad'] + 5000, 0) ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Verificar si hay un parámetro 'id' en la URL
    document.addEventListener("DOMContentLoaded", () => {
        const params = new URLSearchParams(window.location.search);
        if (params.has('id')) {
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }
    });
</script>
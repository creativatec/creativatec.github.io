<?php
$agre = new ControladorCarrito();
$res = $agre->agregarProductoCarrito();
$cont = $agre->totalCarrito();
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="inicio">Inicio</a>
                <a class="breadcrumb-item text-dark" href="#">Tienda</a>
                <span class="breadcrumb-item active">Carrito de compras</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Productos</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    foreach ($res as $key => $value) {
                    ?>
                        <tr>
                            <td class="align-middle"><img src="<?php echo $value['foto_protada'] ?>" alt="" style="width: 50px;"> <?php echo $value['nombre'] ?></td>
                            <td class="align-middle">$<?php echo number_format($value['precio_carrito'],0) ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $value['cant_carrito'] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$<?php echo number_format($value['precio_carrito'] * $value['cant_carrito'],0) ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger eliminar-button-carrito" data-id="<?php print $value['id_carrito']; ?>"><i class="fa fa-times"></i></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Código de cupón">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Aplicar Cupón</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Resumen del carrito</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Total parcial</h6>
                        <h6>$<?php echo number_format($cont[0]['SUM(precio*cantidad)'],0) ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Envio</h6>
                        <h6 class="font-weight-medium">$5,000</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$<?php echo number_format($cont[0]['SUM(precio*cantidad)'] + 5000,0) ?></h5>
                    </div>
                    <a href="checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Pasar a Pago</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
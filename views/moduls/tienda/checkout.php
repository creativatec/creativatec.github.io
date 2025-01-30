<?php
$agre = new ControladorCarrito();
$res = $agre->agregarProductoCarrito();
$cont = $agre->totalCarrito();
$carrito = new ModeloCarrito();
$cart = $carrito->countCarrito();
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="Inicio">Inicio</a>
                <a class="breadcrumb-item text-dark" href="#">Tienda</a>
                <span class="breadcrumb-item active">Verificación</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<form method="post" action="https://checkout.payulatam.com/ppp-web-gateway-payu/">
    <input type="hidden" name="lng" value="es">
    <input type="hidden" name="merchantId" value="1017725">
    <input type="hidden" name="accountId" value="1026679">
    <input type="hidden" name="algorithmSignature" value="MD5">
    <input type="hidden" name="signature" id="" value="<?php echo md5('CemTGaTCksDWEGJe90DuuChGxo~1017725~' . 'REF' . $_SESSION['random'] . " " . date('Y/m/d H:i:s') . "~" . ($cont[0]['SUM(precio*cantidad)'] + 5000) . '.00' . '~COP') ?>">
    <input type="hidden" name="sourceUrl" value="https://proverpet.com.co/">
    <input type="hidden" name="responseUrl" value="https://proverpet.com.co/views/response.php">
    <input type="hidden" name="confirmationUrl" value="https://proverpet.com.co/confirmation">
    <input name="test" type="hidden" value="0">
    <!--RESUMEN DEL PEDIDO-->
    <input type="hidden" name="description" value="venta prueba">
    <input type="hidden" name="referenceCode" value="REF<?php echo $_SESSION['random'] . " " . date('Y/m/d H:i:s') ?>">
    <input type="hidden" name="amount" value="<?php echo $cont[0]['SUM(precio*cantidad)'] + 5000 ?>">
    <input type="hidden" name="tax" value="0">
    <input type="hidden" name="taxReturnBase" value="0">
    <input type="hidden" name="currency" value="COP">
    <!--INFORMACION DE FACTURACION-->
    <input type="hidden" name="payerFullName" id="">
    <input type="hidden" name="payerEmail" value="empresaproverpet@gmail.com">
    <input type="hidden" name="payerOfficePhone">
    <input type="hidden" name="payerPhone">
    <input type="hidden" name="payerMobilePhone" id="">
    <input type="hidden" name="payerDocumentType" value="CC">
    <input type="hidden" name="payerDocument" value="1070586140">
    <input type="hidden" name="billingCountry" value="CO">
    <input type="hidden" name="payerState" value="CO-DC">
    <input type="hidden" name="billingCity">
    <input type="hidden" name="billingAddress">
    <input type="hidden" name="billingAddress2">
    <input type="hidden" name="zipCode">
    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Dirección de Envio</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nombres</label>
                            <!--pagos PAYU-->

                            <!---->
                            <input class="form-control" required type="hidden" name="id_cliente" placeholder="John"> <!-- Este campo debe ser para el id_cliente -->
                            <input class="form-control" required type="text" name="nombres" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Apellidos</label>
                            <input class="form-control" required type="text" name="apellidos" placeholder="Doe">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Correo</label>
                            <input class="form-control" required type="text" id="buyerEmail" name="correo" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Número de telefono</label>
                            <input class="form-control" required type="text" name="telefono" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Dirección 1</label>
                            <input class="form-control" required type="text" name="direccion1" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Dirección 2 (opcional)</label>
                            <input class="form-control" type="text" name="direccion2" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ciudad</label>
                            <input class="form-control" type="text" name="ciudad" placeholder="BOGOTA D.C">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Barrio</label>
                            <input class="form-control" type="text" name="barrio" placeholder="KENNEDY">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Código Postal</label>
                            <input class="form-control" type="text" name="codigoPostal" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Total del pedido</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Productos</h6>
                        <?php
                        foreach ($res as $key => $value) {
                        ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo $value['nombre'] ?></p>
                                <p>$<?php echo number_format($value['precio_carrito'] * $value['cant_carrito'], 0) ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Total parcial</h6>
                            <h6>$<?php echo number_format($cont[0]['SUM(precio*cantidad)'], 0) ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Envio</h6>
                            <h6 class="font-weight-medium">$5,000</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$<?php echo number_format($cont[0]['SUM(precio*cantidad)'] + 5000, 0) ?></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Pago</span></h5>
                    <div class="bg-light p-30">
                        <!--<div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Cheque directo
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Transferencia bancaria
                            </label>
                        </div>
                    </div>-->
                        <button name="pago" type="submit" <?php if($cart[0]['COUNT(precio)'] > 0){}else{print "disabled";} ?> class="btn btn-block btn-primary font-weight-bold py-3">Realizar pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Checkout End -->
<script>
    document.getElementById('buyerEmail').addEventListener('input', function() {
        const buyerEmail = this.value;
        const merchantId = "1017591";
        const apiKey = "870LCJE0C3c2xNt668k2OAjY64";
        const referenceCode = "REF<?php echo $_SESSION['random'] . " " . date('Y/m/d H:i:s') ?>";
        const amount = "<?php echo $cont[0]['SUM(precio*cantidad)'] + 5000; ?>";
        const currency = "COP";
        const accountId = "1026541";

        // Generar el hash MD5 con los valores concatenados
        const signatureString = apiKey + merchantId + referenceCode + amount + currency;
        const signatureHash = CryptoJS.MD5(signatureString).toString();

        // Asignar el hash calculado al campo oculto
        document.getElementById('signature').value = signatureHash;
    });
</script>
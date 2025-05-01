<?php
$agregarInforRedes = new ControladorInformacionBasica();
$lsitar = $agregarInforRedes->agregarInformacionBasica();
$agregarRedes = new ControladorInformacionBasica();
$listarRedes = $agregarRedes->agregarRedes();
?>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">CONTACTÁNOS</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $lsitar[0]['direccion'] ?></p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $lsitar[0]['correo'] ?></p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+57 <?php echo $lsitar[0]['telefono1'] ?></p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+57 <?php echo $lsitar[0]['telefono2'] ?></p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">COMPRA RAPIDA</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="inicio"><i class="fa fa-angle-right mr-2"></i>Inicio</a>
                        <a class="text-secondary mb-2" href="shop"><i class="fa fa-angle-right mr-2"></i>Nuestra Tienda</a>
                        <a class="text-secondary mb-2" href="cart"><i class="fa fa-angle-right mr-2"></i>Carrito de compras</a>
                        <a class="text-secondary mb-2" href="checkout"><i class="fa fa-angle-right mr-2"></i>Verificar</a>
                        <a class="text-secondary" href="contact"><i class="fa fa-angle-right mr-2"></i>Contactanos</a>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Ubicación</h5>
                    <iframe id="gmap_canvas"
                        src="https://maps.google.com/maps?q=Cl.+18+%233-19,+Girardot,+Cundinamarca&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                        style="width: 100%;"></iframe>
                </div>
                <!--<div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">SIGUENOS</h5>
                    <div class="d-flex">
                        <?php
                        foreach ($listarRedes as $key => $value) {
                        ?>
                            <a class="btn btn-primary btn-square mr-2" href="<?php echo $value['url'] ?>"><i class="<?php echo $value['logo'] ?>"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="m-0 text-white-50">Copyright &copy; <a href="https://creativapublicidadytecnologia.com/">Creado</a> por creativetec desarrollo y tecnologia.</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
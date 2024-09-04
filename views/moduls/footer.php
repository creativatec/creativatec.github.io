<?php
$agregarInforRedes = new ControladorInformacionBasica();
$lsitar = $agregarInforRedes->agregarInformaciónBasica();
$agregarRedes = new ControladorInformacionBasica();
$listarRedes = $agregarRedes->agregarRedes();
?>
<!-- Start Footer Area -->
<footer class="footer">
    <!-- Start Middle Top -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-12">
                    <!-- Single Widget -->
                    <div class="f-about single-footer">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/LOGO CREATIVA PNG.png" alt="#"></a>
                        </div>
                        <p><?php print $lsitar[0]['footer_descripcion'] ?></p>
                        <div class="footer-social">
                            <ul>
                                <?php
                                foreach ($listarRedes as $key => $value) {
                                ?>
                                    <li><a href="<?php echo $value['url'] ?>" target="_blank"><i class="<?php echo $value['logo'] ?>"></i></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-5 col-md-7 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-6">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Compañía</h3>
                                <ul>
                                    <li><a href="#">Acerca de la empresa</a></li>
                                    <li><a href="#">Clientes en todo el mundo</a></li>
                                    <li><a href="#">Gente feliz</a></li>
                                    <li><a href="#">Estadísticas de la empresa</a></li>
                                    <li><a href="#">política de privacidad</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact f-link">
                                <h3>Contáctenos</h3>
                                <ul class="footer-contact">
                                    <li><i class="lni lni-phone"></i> <a href="tel:+57<?php print $lsitar[0]['telefono1'] ?>">(+57) <?php print $lsitar[0]['telefono1'] ?></a></li>
                                    <li><i class="lni lni-envelope"></i> <a
                                            href="mailto:<?php print $lsitar[0]['correo'] ?>"><?php print $lsitar[0]['correo'] ?></a></li>
                                    <li><i class="lni lni-map-marker"></i> <?php print $lsitar[0]['direccion'] ?></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer gallery">
                        <iframe id="gmap_canvas"
                            src="https://maps.google.com/maps?q=Cl.+18+%233-19,+Girardot,+Cundinamarca&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                            style="width: 100%;"></iframe>
                        <!--<h3>Feed De Instagram</h3>
                        <ul class="list">
                            <li><a href="#"><img src="assets/images/gallery1.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                            <li><a href="#"><img src="assets/images/gallery2.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                            <li><a href="#"><img src="assets/images/gallery3.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                            <li><a href="#"><img src="assets/images/gallery4.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                            <li><a href="#"><img src="assets/images/gallery5.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                            <li><a href="#"><img src="assets/images/gallery6.jpg" alt="#"><i
                                        class="lni lni-instagram"></i></a></li>
                        </ul>-->
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Middle -->
</footer>
<!--/ End Footer Area -->
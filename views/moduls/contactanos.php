<?php
$agregarInforRedes = new ControladorInformacionBasica();
$lsitar = $agregarInforRedes->agregarInformacionBasica();
?>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ_dlbvUgEp1DEOepAF6iYh8HXopaNbcE&callback=initMap&libraries=places&v=weekly"
    defer></script>
<!-- Start Breadcrumbs -->
<div class="breadcrumbs" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content left">
                    <h1 class="page-title">Contacta con nosotros</h1>
                    <p>Business plan draws on a wide range of knowledge from different business disciplines.
                        Business draws on a wide range of different business .</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content right">
                    <ul class="breadcrumb-nav">
                        <li><a href="inicio">Inicio</a></li>
                        <li><a href="contactanos">Contacto</a></li>
                        <li>Contacta con nosotros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Area -->
<div class="contact-area contact-page section">
    <div class="container">
        <div class="contact-inner">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-4 col-12">
                    <div class="contact-address-wrapper wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="inner-section-title">
                            <h4>Información de contacto</h4>
                            <h2>Encuéntranos aquí</h2>
                        </div>
                        <div class="single-info">
                            <ul>
                                <li><i class="lni lni-map-marker"></i> <?php print $lsitar[0]['direccion'] ?></li>
                                <li class="mb-2"><iframe id="gmap_canvas"
										src="https://maps.google.com/maps?q=Cl.+18+%233-19,+Girardot,+Cundinamarca&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
										style="width: 100%;"></iframe></li>
                            </ul>
                        </div>
                        <div class="single-info">
                            <ul>
                                <li>
                                    <i class="lni lni-phone"></i> <a href="tel:+57<?php print $lsitar[0]['telefono1'] ?>">(+57) <?php print $lsitar[0]['telefono1'] ?></a><br>
                                    <i class="lni lni-phone"></i> <a href="tel:+57<?php print $lsitar[0]['telefono2'] ?>">(+57) <?php print $lsitar[0]['telefono2'] ?></a><br>
                                    <i class="lni lni-phone"></i> <a href="tel:+57<?php print $lsitar[0]['telefono3'] ?>">(+57) <?php print $lsitar[0]['telefono3'] ?></a><br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-8 col-12">
                    <div class="contact-wrapper wow fadeInRight" data-wow-delay="0.6s">
                        <form class="contacts-form" method="post" action="assets/mail/mail.php">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="contacts-icon contactss-name">
                                        <input type="text" name="name" placeholder="Su nombre" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="contacts-icon contactss-name">
                                        <input type="text" name="phone" placeholder="Tu teléfono"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="contacts-icon contactss-email">
                                        <input type="email" name="email" placeholder="Tu correo electrónico"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="contacts-icon contactss-name">
                                        <input type="text" name="subject" placeholder="Su tema"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contacts-icon contactss-message">
                                        <textarea name="message" rows="7" placeholder="Tu mensaje"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contacts-button button">
                                        <button type="submit" class="btn mouse-dir white-bg">Obtenga una cotización <span
                                                class="dir-part"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area -->

<!-- Start Google-map Area -->
<!--<div id="map"></div>-->
<!-- End Google-map Area -->
<?php
$num = 0;
if ($num > 0) {

?>
<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-text wow fadeInLeft" data-wow-delay=".3s">
                    <h6>Sign up for Newsletter</h6>
                    <p class="">Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu,<br> homero alterum.</p>
                </div>
                <!-- End Newsletter Form -->
            </div>
            <div class="col-lg-6 col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form wow fadeInRight" data-wow-delay=".5s">
                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Your email address" class="common-input"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                            required="" type="email">
                        <div class="button">
                            <button class="btn mouse-dir white-bg">Subscribe Now! <span
                                    class="dir-part"></span></button>
                        </div>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->
<?php
}
?>
<!-- Start Hero Area -->
<?php

$agregar = new ControladorNosotros();
$res = $agregar->agregarNosotros();
$resNosotr = $agregar->agregarInfoNosotros();
$resSobreNoso = $agregar->agregarInfoSobreNosotros();

$ser = new ControladorServicio();
$ser = $ser->agregarServicio();

$cli = new ControladorClientePagina();
$cliente = $cli->agregarCliente();

$precio = new ControaldorPrecio();
$precioRes = $precio->agregarPrecio();
?>
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 co-12">
                    <div class="home-slider">
                        <?php
                        foreach ($resNosotr as $key => $value) {
                        ?>
                            <div class="hero-text">
                                <span class="small-title wow fadeInUp" data-wow-delay=".3s"><?php echo $value['cabecera'] ?></span>
                                <h1 class="wow fadeInUp" data-wow-delay=".5s"><span><?php //echo $value['titulo1'] 
                                                                                    ?></span>
                                    <?php echo $value['titulo1'] ?></h1>
                                <p class="wow fadeInUp" data-wow-delay=".7s"><?php echo $value['descripcion'] ?>
                                </p>
                                <div class="button wow fadeInUp" data-wow-delay=".9s">
                                    <a href="nosotros" class="btn mouse-dir">Descubrir Más <span
                                            class="dir-part"></span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Hero Area -->

<!-- Start Features Area -->
<section class="Features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="feature-right wow fadeInUp" data-wow-delay=".3s">
                    <div class="watch-inner">
                        <div class="video-head wow zoomIn" data-wow-delay="0.4s">
                            <a href="https://www.youtube.com/watch?v=BqI0Q7e4kbk" class="glightbox video"><i
                                    class="lni lni-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="feature-content">
                    <div class="title">
                        <span class="wow fadeInRight" data-wow-delay=".3s">Nuestra Introducción</span>
                        <h3 class="wow fadeInRight" data-wow-delay=".5s"><?php echo $res[0]['titulo'] ?></h3>
                    </div>
                    <?php
                    foreach ($resSobreNoso as $key => $value) {
                    ?>
                        <div class="feature-item wow fadeInUp" data-wow-delay="<?php echo $value['seg'] ?>">
                            <div class="feature-thumb">
                                <?php echo $value['logo'] ?>
                            </div>
                            <div class="banner-content">
                                <h2 class="title"><?php echo $value['titulo'] ?></h2>
                                <p><?php echo $value['descripcion'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Features Area -->

<!-- Start Service Area -->
<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">Lo Que Te Ofrecemos</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Nuestros Servicios</h2>
                    <!--<p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>-->
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($ser as $key => $value) {
            ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <div class="serial">
                            <span><?php echo $value['logo'] ?></span>
                        </div>
                        <h3><a href="service-single.html"><?php echo $value['titulo'] ?></a></h3>
                        <p><?php echo $value['descripcion'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- /End Services Area -->

<!-- Pricing Table -->

<section id="pricing" class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">Tabla Precios</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Nuestro plan de precios</h2>
                    <!--<p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>-->
                </div>
            </div>
            <?php
            foreach ($precioRes as $key => $value) {
            ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".<?php echo $key + 4 ?>s">
                        <p class="<?php echo $value['etiqueta'] ?>"><?php echo $value['nombre_etiqueta'] ?></p>
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title"><?php echo $value['estilo'] ?> <span><?php echo $value['descripcion_estilo'] ?></span></h4>
                            <div class="price">
                                <p class="amount"><span class="curency">$</span><?php echo $value['precio'] ?><span class="duration"><?php echo $value['duracion'] ?></span></p>
                            </div>
                        </div>
                        <!-- Table List -->
                        <ul class="table-list">
                            <?php
                            $listar = new ModeloPrecio();
                            $resListar = $listar->mostrarListaModeloId($value['id_precio']);
                            foreach ($resListar as $key => $valueList) {
                            ?>
                                <li><?php echo $valueList['descripcion'] ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="button">
                            <a class="btn white-bg mouse-dir" href="contactanos">Empezar <span class="dir-part"></span></a>
                        </div>
                        <!-- Table Bottom -->
                    </div>
                    <!-- End Single Table-->
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!--/ End Pricing Table -->

<!-- Start Clients Area -->
<section class="client-logo-section">
    <div class="container">
        <div class="col-lg-8 offset-lg-2 col-12">
            <div class="section-title">
                <span class="wow fadeInDown" data-wow-delay=".2s">Clientes</span>
                <h2 class="wow fadeInUp" data-wow-delay=".4s">Nuestros Clientes</h2>
                <!--<p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>-->
            </div>
        </div>
        <div class="client-logo-wrapper">
            <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                <?php
                foreach ($cliente as $key => $value) {
                ?>
                    <div class="client-logo">
                        <img src="<?php echo $value['logo'] ?>" class="card-img-top" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- End Clients Area -->
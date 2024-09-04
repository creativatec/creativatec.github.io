<?php
$agregar = new ControladorPortafolio();
$res = $agregar->agregarPortafolio();
$resCategoria = $agregar->agregarCategoriaPortafolio();
$proyecto = $agregar->agregarProyecto();
?>
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content left">
                    <h1 class="page-title">Portafolio</h1>
                    <p><?php echo $res[0]['descripcion'] ?></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content right">
                    <ul class="breadcrumb-nav">
                        <li><a href="inicio">Inicio</a></li>
                        <li>Portafolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Portfolio Area-->
<section class="portfolio-section section">
    <div id="container" class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="section-title">
                    <span class="wow fadeInDown" data-wow-delay=".2s">Nuestros Proyectos</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Últimos Casos</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo $res[0]['nota'] ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-btn-wrapper wow fadeInUp" data-wow-delay=".4s">
                    <button class="portfolio-btn active" data-filter="*">Todo</button>
                    <?php
                    foreach ($resCategoria as $key => $value) {
                    ?>
                        <button class="portfolio-btn" data-filter=".<?php echo $value['datafilter'] ?>"><?php echo $value['nombre'] ?></button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row grid">
            <?php
            foreach ($proyecto as $key => $value) {
            ?>
                <div class="col-lg-4 col-md-6 grid-item <?php echo $value['datafilter'] ?>">
                    <div class="portfolio-item-wrapper wow fadeInUp" data-wow-delay=".3s">
                        <div class="portfolio-img">
                            <img src="<?php echo $value['logo'] ?>" alt="" style="width: 370px; height: 301px;">
                        </div>
                        <div class="portfolio-overlay">
                            <div class="overlay-content">
                                <h4><?php echo $value['proyecto'] ?></h4>
                                <p><?php echo $value['descripcion'] ?></p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key+1 ?>"
                                    class="theme-btn border-btn">Ver</a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $key+1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $value['proyecto'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="portfolio single section">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <div class="content">
                                                        <img src="<?php echo $value['foto1'] ?>" alt="">
                                                        <p class="desc mb-29"><?php echo $value['descripcion1'] ?></p>

                                                        <p class="desc mb-29"><?php echo $value['descripcion2'] ?></p>

                                                        <p class="desc mb-0"><?php echo $value['descripcion3'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="project-sidebar">
                                                        <img src="<?php echo $value['foto2'] ?>" alt="#">
                                                        <div class="sb-project-detail mt-50 md-mt-0">
                                                            <h4 class="title">Detalles Proyecto</h4>
                                                            <ul>
                                                                <li><span>Localizacion:</span> <?php echo $value['Origen'] ?></li>
                                                                <li><span>Finalización:</span> <?php echo $value['Finalización_Proyecto'] ?></li>
                                                                <li><span>Precio:</span> <?php echo number_format($value['Valor'],0) ?></li>
                                                                <li><span>Diseñardo:</span> <?php echo $value['Disenador'] ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
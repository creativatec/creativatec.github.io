<?php
$agregar = new ControladorProducto();
$res = $agregar->listarProductoIdControlador();
$reviews = new ControladorReview();
$reviews->agregarReview();
$resRev = $reviews->listarReviewsId();
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="inicio">Inicio</a>
                <a class="breadcrumb-item text-dark" href="#">Tienda</a>
                <span class="breadcrumb-item active">Detalle del producto</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?php echo $res[0]['foto_protada'] ?>" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo $res[0]['foto1'] ?>" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo $res[0]['foto2'] ?>" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo $res[0]['foto3'] ?>" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?php echo $res[0]['producto'] ?></h3>
                <?php
                if ($res[0]['precio_descuento'] > 0) {
                ?>
                    <h3>$<?php echo number_format($res[0]['precio_descuento'], 0) ?></h3>
                    <h4 class="text-muted"><del>$<?php echo number_format($res[0]['precio'], 0) ?></del></h4>
                <?php
                } else {
                ?>
                    <h3>$<?php echo number_format($res[0]['precio'], 0) ?></h3>
                <?php
                }
                ?>
                <p class="mb-4"><?php echo $res[0]['descripcion'] ?></p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="cant" class="form-control bg-secondary border-0 text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button id="btnAgregarCarrito" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Agregar al carrito</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Descripcion</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Información</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (<?php $conn = 0; foreach ($resRev as $key => $value) { $conn = $key + 1;} echo $conn; ?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Descripcion producto</h4>
                        <p><?php echo $res[0]['descripcion'] ?></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Información adicional</h4>
                        <p><?php echo $res[0]['informacion_adicional'] ?></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?php $conn = 0; foreach ($resRev as $key => $value) { $conn = $key + 1;} echo $conn; ?> reseña para "<?php echo $res[0]['producto'] ?>"</h4>
                                <?php
                                foreach ($resRev as $key => $value) {
                                ?>
                                    <div class="media mb-4">
                                        <div class="media-body">
                                            <h6><?php echo $value['nombre'] ?><small> - <i><?php echo $value['fecha'] ?></i></small></h6>
                                            <p><?php echo $value['info'] ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Deja una reseña</h4>
                                <small>Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *</small>
                                <form method="post">
                                    <div class="form-group">
                                        <label for="message">Tu opinión * *</label>
                                        <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Su nombre *</label>
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Su correo electrónico *</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="agregarReview" value="Deja tu opinión" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
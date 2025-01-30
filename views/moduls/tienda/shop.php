<?php
$agregar = new ControladorProducto();
$res = $agregar->agregarProductoTienda();
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="inicio">Inicio</a>
                <a class="breadcrumb-item text-dark" href="#">Tienda</a>
                <span class="breadcrumb-item active">Lista de la tienda</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <div class="filter-container">
                <h5 class="filter-title">Filtrar por precio</h5>
                <div class="filter-option">
                    <input type="checkbox" id="filter-1" name="price-filter" value="0-50000">
                    <label for="filter-1">$0 - $50,000</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="filter-2" name="price-filter" value="51000-100000">
                    <label for="filter-2">$51,000 - $100,000</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="filter-3" name="price-filter" value="101000-200000">
                    <label for="filter-3">$101,000 - $200,000</label>
                </div>
            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
                <?php
                foreach ($res as $key => $value) {
                ?>
                <div class="pro"></div>
                <?php
                }
                ?>
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <div class="paginacion"></div>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
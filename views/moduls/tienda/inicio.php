  <?php
    $agregar = new ControladorProducto();
    $res = $agregar->agregarProductoTienda();
    ?>
  <!-- Productos Start -->
  <div class="container-fluid pt-5 pb-3">
      <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Productos</span></h2>
      <div class="row px-xl-5">
          <?php
            foreach ($res as $key => $value) {
            ?>
              <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                  <div class="product-item bg-light mb-4">
                      <div class="product-img position-relative overflow-hidden">
                          <img class="img-fluid w-100" src="<?php echo $value['foto_protada'] ?>" alt="">
                          <div class="product-action">
                              <a class="btn btn-outline-dark btn-square" href="index.php?action=cart&id=<?php echo $value['id_producto'] ?>"><i class="fa fa-shopping-cart"></i></a>
                              <a class="btn btn-outline-dark btn-square" href="index.php?action=detail&id=<?php echo $value['id_producto'] ?>"><i class="fa fa-search"></i></a>
                          </div>
                      </div>
                      <div class="text-center py-4">
                          <a class="h6 text-decoration-none text-truncate" href=""><?php echo $value['nombre'] ?></a>
                          <div class="d-flex align-items-center justify-content-center mt-2">
                              <?php
                                if ($value['precio_descuento'] > 0) {
                                ?>
                                  <h5>$<?php echo number_format($value['precio_descuento'], 0) ?></h5>
                                  <h6 class="text-muted ml-2"><del>$<?php echo number_format($value['precio'], 0) ?></del></h6>
                              <?php
                                } else {
                                ?>
                                  <h5>$<?php echo number_format($value['precio'], 0) ?></h5>
                              <?php
                                }
                                ?>

                          </div>
                          <div class="d-flex align-items-center justify-content-center mb-1">
                              <h5>Ahorro del: <?php echo number_format(($value['precio'] - $value['precio_descuento']) / 1000, 0); ?>%</h5>
                          </div>
                      </div>
                  </div>
              </div>
          <?php
            }
            ?>
      </div>
  </div>
  <!-- Productos End -->
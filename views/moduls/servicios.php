  <?php
    $ser = new ControladorServicio();
    $ser = $ser->agregarServicio();
    ?>
  <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-12">
                  <div class="breadcrumbs-content left">
                      <h1 class="page-title">Servicios</h1>
                      <p>En Creativetec Deveopment & Tecnology, ofrecemos soluciones integrales para satisfacer todas tus necesidades de diseño, tecnología y publicidad. Desde la creación de páginas web y diseño gráfico hasta el desarrollo de software personalizado y estrategias de marketing, nuestro equipo de expertos trabaja para transformar tus ideas en resultados concretos. Estamos comprometidos con la excelencia y la innovación en cada proyecto para impulsar tu éxito.
                      </p>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                  <div class="breadcrumbs-content right">
                      <ul class="breadcrumb-nav">
                          <li><a href="index.html">Inicio</a></li>
                          <li>Servicios</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End Breadcrumbs -->

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
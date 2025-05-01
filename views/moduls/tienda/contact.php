<?php
$agregarInforRedes = new ControladorInformacionBasica();
$agregar = $agregarInforRedes->agregarInformacionBasica();
$agregarRedes = new ControladorInformacionBasica();
$redes = $agregarRedes->agregarRedes();
?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="inicio">Inicio</a>
                <span class="breadcrumb-item active">Contacto</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contáctenos</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Su Nombre"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Tu Correo Electronico"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Encabezado"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="8" id="message" placeholder="Mensaje"
                            required="required"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="bg-light p-30 mb-30">
                <iframe style="width: 100%; height: 250px;"
                    src="https://maps.google.com/maps?q=<?php echo $agregar[0]['direccion']." Girardot" ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    style="width: 100%;"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $agregar[0]['direccion'] ?></p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $agregar[0]['correo'] ?></p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i><a href="tel:+57<?php echo $agregar[0]['telefono1'] ?>">+57 <?php echo $agregar[0]['telefono1'] ?></a></p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php
session_start();
if (isset($_SESSION['validarPagina'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Creativa Publicidad & Tecnologia <?php if (isset($_GET['action'])) {
                                                    print "|" . $_GET['action'];
                                                } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="layout" content="main" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpeg" />

        <script type="text/javascript" src="http://www.google.com/jsapi"></script>

        <script src="views/js/jquery/jquery-1.8.2.min.js" type="text/javascript"></script>
        <link href="views/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

        <style>
            #body-content {
                padding-top: 40px;
            }
        </style>
    </head>

    <body>
        <?php
        include("views/moduls/admin/narvar.php");
        ?>
        <section class="page container">
            <?php
            $mvc = new controladorViews();
            $mvc->enlacesPaginaControlador();
            ?>
        </section>
        <?php
        include("views/moduls/admin/footer.php");
        ?>

        <script src="views/js/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-alert.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-tab.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-tooltip.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-popover.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-button.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-collapse.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-carousel.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-typeahead.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-affix.js" type="text/javascript"></script>
        <script src="views/js/bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="views/js/jquery/jquery-tablesorter.js" type="text/javascript"></script>
        <script src="views/js/jquery/jquery-chosen.js" type="text/javascript"></script>
        <script src="views/js/jquery/virtual-tour.js" type="text/javascript"></script>
        <script src="views/js/pagina.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#sample-table').tablesorter();
                $('#datepicker').datepicker();
                $(".chosen").chosen();
            });
        </script>

    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Creativa Publicidad & Tecnologia <?php if (isset($_GET['action'])) {
                                                    print "|" . $_GET['action'];
                                                } ?></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.jpeg" />
        <!-- Place favicon.ico in the root directory -->

        <!-- Web Font -->
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
        <link rel="stylesheet" href="assets/css/animate.css" />
        <link rel="stylesheet" href="assets/css/tiny-slider.css" />
        <link rel="stylesheet" href="assets/css/glightbox.min.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/reset.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>

    </head>

    <body>
        <?php
        if (isset($_GET['action'])) {
            if ($_GET['action'] != 'ingresar') {
                include("views/moduls/narvar.php");
            } else {
            }
        } else {
            include("views/moduls/narvar.php");
        }
        ?>
        <?php
        $mvc = new controladorViews();
        $mvc->enlacesPaginaControlador();
        ?>
        <?php
        if (isset($_GET['action'])) {
            if ($_GET['action'] != 'ingresar') {
                include("views/moduls/footer.php");
            }
        } else {
            include("views/moduls/footer.php");
        }
        ?>

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top btn-hover">
            <i class="lni lni-chevron-up"></i>
        </a>

        <!-- ========================= JS here ========================= -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/count-up.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/tiny-slider.js"></script>
        <script src="assets/js/glightbox.min.js"></script>
        <script src="assets/js/imagesloaded.min.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/js.js"></script>


    </html>
<?php
}
?>
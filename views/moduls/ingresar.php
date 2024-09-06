<link rel="stylesheet" href="assets/css/login.css" />
<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvendio</h1>
                                </div>
                                <form class="user" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                            name="user" aria-describedby="emailHelp"
                                            placeholder="Ingresa tu usuario...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="clave" placeholder="Contraseña...">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Acuérdame de
                                                mí</label>
                                        </div>
                                    </div>
                                    <button name="login" class="btn btn-primary">Acceder</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
$ingresar = new ControladorUsuario();
$ingresar->loginControlador();
if (isset($_GET['action'])) {
    if ($_GET['action'] == "loginFallido") {
        print '<script>
                swal("Ops!", "El usuario y/o contraseña invalidos", "error");
            </script>';
    }
    if ($_GET['action'] == "loginInactivo") {
        print '<script>
                swal("Ops!", "El usuario ha sido desabilitado", "error");
            </script>';
    }
    if ($_GET['action'] == "LoginSuspendidoPorPago") {
?>
        <script>
            $(document).ready(function() {
                $('#caducidadModal').modal('toggle')
            });
        </script>
        <div class="modal fade" id="caducidadModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">¡Atención!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ya han caducado los 7 días hábiles. Te quedan 0 días para pagar por lo cual tu establecimiento fue suspendido. Por favor, envía la confirmación de tu pago a través de un correo electrónico para habilitar tu establecimiento.
                        <br>
                        Total A pagar $60.000
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="abrirModal">Enviar Correo</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="comprobanteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Enviar Comprobante de Pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="comprobanteForm">
                            <div class="form-group">
                                <label for="nombreEstablecimiento">Nombre del Establecimiento:</label>
                                <input type="text" class="form-control" id="nombreEstablecimiento" required>
                            </div>
                            <div class="form-group">
                                <label for="comprobantePago">Foto del Comprobante de Pago:</label>
                                <input type="file" class="form-control-file" id="comprobantePago" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
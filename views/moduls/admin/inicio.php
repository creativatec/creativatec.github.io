<?php
//rol
$rol = new ControladorRol();
$resRol = $rol->listarRol();
//activo
$activo = new ControladorActivo();
$resActivo = $activo->listarActivo();
///Usuario
$local = new ControladorLocal();
$local->agregarLocal();
$localRes = $local->listarLocal();

$user = new ControladorUsuario();
$user->agregarUsuario();
$res = $user->listarUsuario();
?>
<div class='container'>

    <div class="signin-row row">
        <div class="span1"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Panel Sistema POS</legend>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Establecimiento<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_local" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="local" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">NIT<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="nit" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Fecha Inicio<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" id="inicio" name="inicio" class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Plazo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" id="diasHabiles" name="diasHabiles" class="span4" readonly>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Dirección<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="dire" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Telefono<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="tel" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Fecha Fin<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" id="fin" name="fin" class="span4" readonly>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Creativa</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <input type="text" id="local" placeholder="Buscar en la tabla...">
                                        <table id="my-local" class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Establecimiento</th>
                                                    <th>Nit</th>
                                                    <th>Dirección</th>
                                                    <th>Telefono</th>
                                                    <th>Dias Restantes</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($localRes as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id_local'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nombre_local'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nit'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['direccion'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['telefono'] ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $local = new ModeloLocal();
                                                            $reslocal = $local->consultarLocalModelo($value['id_local']);
                                                            //dias restantes
                                                            $fechaFin = $reslocal[0]['fin'];
                                                            $fechaPlazo = $reslocal[0]['plazo'];
                                                            $fechaActual = new DateTime();
                                                            $fechaFinDate = new DateTime($fechaFin);
                                                            $fechaFinDatePlazo = new DateTime($fechaPlazo);
                                                            $diferencia = $fechaActual->diff($fechaFinDate);
                                                            $diferenciaPlazo = $fechaActual->diff($fechaFinDatePlazo);
                                                            $diasRestantes = (int)$diferencia->format("%r%a");
                                                            $Restantes = (int)$diferenciaPlazo->format("%r%a");
                                                            if ($diasRestantes <= 0) {
                                                                if ($Restantes <= 0) {
                                                            ?>
                                                                    Local Suspendido Por No Pago
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    Dias Restantes Para Suspencion: <?php echo $Restantes ?>
                                                                <?php
                                                                }
                                                            } else {

                                                                ?>
                                                                Dias Restantes: <?php echo $diasRestantes ?>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><a class="btn btn-primary edit-button-local" data-id="<?php print $value['id_local']; ?>">Editar</a><a class="btn btn-primary eliminar-button-local" data-id="<?php print $value['id_local']; ?>">Eliminar</a></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="agregarLocal" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <div class="signin-row row">
        <div class="span1"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Panel Sistema POS</legend>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Primer Nombre<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_usuario" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="id" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="priNombre" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Segundo Nombre<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="segNombre" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Usuario<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="user" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Rol<span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="controls">
                                            <select id="challenge_question_control" required name="rol" class="span5">
                                                <option value="">-- Seleccionar Precio --</option>
                                                <?php
                                                foreach ($resRol as $key => $value) {
                                                ?>
                                                    <option value="<?php echo $value['id_rol'] ?>">
                                                        <?php echo $value['nombre_rol'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Primer Apellido<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="priApellido" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Segundo Apellido<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="segApellido" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Contraseña<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="clave" required class="span4" type="password" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Activo<span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="controls">
                                            <select id="challenge_question_control" required name="activo" class="span5">
                                                <option value="">-- Seleccionar Precio --</option>
                                                <?php
                                                foreach ($resActivo as $key => $value) {
                                                ?>
                                                    <option value="<?php echo $value['id_activo'] ?>">
                                                        <?php echo $value['nombre_activo'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Creativa</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <input type="text" id="usuario" placeholder="Buscar en la tabla...">
                                        <table id="my-usuario" class="table table-hover tablesorter my-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Primer Nombre</th>
                                                    <th>Segundo Nombre</th>
                                                    <th>Primer Apellido</th>
                                                    <th>Segundo Apellido</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                    <th>Rol</th>
                                                    <th>Activo</th>
                                                    <th>Establecimiento</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($res as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['id_usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['primer_nombre'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['segundo_nombre'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['primer_apellido'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['segundo_apellido'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['usuario'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['clave'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nombre_rol'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nombre_activo'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nombre_local'] ?>
                                                        </td>
                                                        <td><a class="btn btn-primary edit-button-usuario" data-id="<?php print $value['id_usuario']; ?>">Editar</a></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="agregarUsuario" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
</div>
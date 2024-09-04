<?php
$agregar = new ControaldorPrecio();
$res = $agregar->agregarPrecio();
$lsita = $agregar->agregarListaPrecio();
?>
<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Precio</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span8">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Etiqueta<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="hidden" name="id_precio" required class="span4" id="">
                                        <input type="text" name="etiqueta" required class="span4" id="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Nombre Etiqueta<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="nomEtiqueta" required class="span4" id="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Estilo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="estilo" required class="span4" id="">

                                    </div>
                                </div>

                            </fieldset>
                        </div>
                        <div id="acct-password-row" class="span5">
                            <div class="control-group ">
                                <label class="control-label">Descripcion estilo<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="descripcion" required class="span4" id="">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">precio<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="precioValor" required class="span4 decimalInput" id="precio_1">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">Duracion<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="dura" required class="span4" id="">

                                </div>
                            </div>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Precio</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Estilo</th>
                                                    <th>Precio</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($lsita as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_precio'] ?></td>
                                                        <td><?php echo $value['estilo'] ?></td>
                                                        <td><?php echo number_format($value['precio'], 0) ?></td>
                                                        <td><a class="btn btn-primary edit-button-precio" data-id="<?php print $value['id_precio']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="precio" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Lista</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_lista" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="descripcionPrecio" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Modulo Precio<span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="controls">
                                            <select id="challenge_question_control" required name="id_precio" class="span5">
                                                <option value="">-- Seleccionar Precio --</option>
                                                <?php
                                                foreach ($res as $key => $value) {
                                                ?>
                                                    <option value="<?php echo $value['id_precio'] ?>">
                                                        <?php echo $value['nombre_etiqueta'] ?>
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
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Lista Precio</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Descripcion</th>
                                                    <th>Modulo</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($lsita as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_lis_precio'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><?php echo $value['nombre_etiqueta'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-lista" data-id="<?php print $value['id_lis_precio']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="listPrecio" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>
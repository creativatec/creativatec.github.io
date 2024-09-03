<?php
$agregar = new ControladorServicio();
$res = $agregar->agregarServicio();
?>
<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Servicios</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Titulo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_servicio" required class="span4" require type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="titulo" required class="span4" require type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea id="current-pass-control" name="desc" required class="span4" require type="text" value="" autocomplete="false"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <div class="control-group">
                                        <label for="challengeQuestion" class="control-label">Logo*</span></label>
                                        <input id="uploadImage1" required class="span4" type="text" id="" name="logo" />
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Servicios</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Logo</th>
                                                    <th>Titulo</th>
                                                    <th>Descripcion</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($res as $key => $value) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_servicio'] ?></td>
                                                        <td><?php echo $value['logo'] ?></td>
                                                        <td><?php echo $value['titulo'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-servicio" data-id="<?php print $value['id_servicio']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="servicio" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>
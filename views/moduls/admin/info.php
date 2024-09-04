<?php
$agregarInforRedes = new ControladorInformacionBasica();
$lsitar = $agregarInforRedes->agregarInformaciónBasica();
$agregarRedes = new ControladorInformacionBasica();
$listarRedes = $agregarRedes->agregarRedes();
?>
<div class='container'>

    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Información Basica</legend>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <input id="current-pass-control" name="id_info" required class="span4" type="hidden" value="<?php print $lsitar[0]['id_info'] ?>" autocomplete="false">
                                    <label class="control-label">Nombre Empresa<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="nombre" required class="span4" type="text" value="<?php print $lsitar[0]['nombre_empresa'] ?>" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Correo*</span></label>
                                    <div class="controls">
                                        <input id="new-pass-control" name="correo" class="span4" required type="email" value="<?php print $lsitar[0]['correo'] ?>" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Dirección*</span></label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="dire" class="span4" required type="text" value="<?php print $lsitar[0]['direccion'] ?>" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Telefono 1*</span></label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="tel1" class="span4" required type="number" value="<?php print $lsitar[0]['telefono1'] ?>" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Telefono 2</label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="tel2" class="span4" type="number" value="<?php print $lsitar[0]['telefono2'] ?>" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Telefono 3</label>
                                    <div class="controls">
                                        <input id="new-pass-verify-control" name="tel3" class="span4" type="number" value="<?php print $lsitar[0]['telefono3'] ?>" autocomplete="false">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span7">
                            <fieldset>
                                <div class="control-group">
                                    <label for="challengeQuestion" class="control-label">Logo*</span></label>
                                    <input type="hidden" name="foto" id="" value="<?php echo $lsitar[0]['logo'] ?>">
                                    <input id="uploadImage1" type="file" name="logoinfo" onchange="previewImage1(1);" />
                                    <img id="uploadPreview1" width="350" height="200" class="mb-3" src="<?php if (isset($lsitar[0]['logo'])) {
                                                                                                            print $lsitar[0]['logo'];
                                                                                                        } else {
                                                                                                            print 'views/images/img.jpg';
                                                                                                        } ?>" />
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion footer</label>
                                    <textarea name="footer" rows="5" class="span5"><?php print $lsitar[0]['footer_descripcion'] ?></textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <footer id="submit-actions" class="form-actions">
                        <button id="submit-button" type="submit" class="btn btn-primary" name="info" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <div class="span2">
    </div>
</div>
<div class="signin-row row">
    <div class="span2"></div>
    <div class="span16">
        <div class="well well-small well-shadow">
            <legend class="lead">Redes Sociales</legend>
            <form action="" method="post" class="form-control">
                <div class="row">
                    <div id="acct-password-row" class="span1">
                    </div>
                    <div id="acct-password-row" class="span5">
                        <fieldset>
                            <div class="control-group ">
                                <label class="control-label">Logo<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="current-pass-control" name="id_redes" required class="span4" type="hidden" value="" autocomplete="false">
                                    <input id="current-pass-control" name="logo" required class="span4" type="text" value="" autocomplete="false">

                                </div>
                            </div>
                            <div class="control-group ">
                                <label class="control-label">URL<span class="required">*</span></label>
                                <div class="controls">
                                    <input id="current-pass-control" name="url" class="span4" type="text" value="" autocomplete="false">

                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="acct-verify-row" class="span9">
                        <fieldset>
                            <div class=" table-responsive">
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Redes Sociales</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>logo</th>
                                                    <th>URL</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($listarRedes as $key => $value) {

                                                ?>
                                                    <tr>
                                                        <td><?php print $value['id_redes'] ?></td>
                                                        <td><?php print $value['logo'] ?></td>
                                                        <td><?php print $value['url'] ?></td>
                                                        <td>
                                                            <a class="btn btn-primary edit-button" data-id="<?php print $value['id_redes']; ?>">Editar</a>
                                                        </td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
                <div id="acct-password-row" class="span1">
                </div>
                <footer id="submit-actions" class="form-actions">
                    <button id="submit-button" type="submit" class="btn btn-primary" name="redes" value="CONFIRM">Guardar</button>
                </footer>
        </div>
        </form>
    </div>
</div>
<div class="span2">
</div>
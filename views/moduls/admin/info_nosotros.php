<?php

$agregar = new ControladorNosotros();
$res = $agregar->agregarNosotros();
$resNosotr = $agregar->agregarInfoNosotros();
$resSobreNoso = $agregar->agregarInfoSobreNosotros();

?>
<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Nosotros</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <input type="hidden" name="id_nosotros" value="">
                                    <div class="controls">
                                        <textarea name="descripcion" id="" required class="span4"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Titulo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="tituloNosotros" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Nosotros</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Descripcion</th>
                                                    <th>Titulo</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($res as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_sobre_nosotros'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><?php echo $value['titulo'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-nosotros" data-id="<?php print $value['id_sobre_nosotros']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="nosotros" value="CONFIRM">Guardar</button>
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
                <legend class="lead">Info nosotros</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Cabezera<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="hidden" name="id_info_nosotros" required class="span4">
                                        <input type="text" name="cabezera" required class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Titulo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="titulo" required class="span4" id="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Subtitulo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="Subtitulo" required class="span4" id="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionNosotro" required class="span4" id=""></textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Info Nosotros</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Cabezera</th>
                                                    <th>Titulo</th>
                                                    <th>Subtitulo</th>
                                                    <th>Descripcion</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($resNosotr as $key => $value) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_info_nosotros'] ?></td>
                                                        <td><?php echo $value['cabecera'] ?></td>
                                                        <td><?php echo $value['titulo1'] ?></td>
                                                        <td><?php echo $value['titulo2'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-infonosotros" data-id="<?php print $value['id_info_nosotros']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="infonosotros" value="CONFIRM">Guardar</button>
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
                <legend class="lead">Info Sobre Nosotros</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Logo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="hidden" name="id_info_sobre_nosotros" required class="span4">
                                        <input type="text" name="logonosotros" required class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Titulo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="tituloNosotro" required class="span4" id="">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionNosotros" required class="span4" id=""></textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Info Sobre Nosotros</h5>

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
                                                foreach ($resSobreNoso as $key => $value) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_info_sobre_nosotros'] ?></td>
                                                        <td><?php echo $value['logo'] ?></td>
                                                        <td><?php echo $value['titulo'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-infosobrenosotros" data-id="<?php print $value['id_info_sobre_nosotros']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="infosobrenosotros" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>
<?php
$agregar = new ControladorPortafolio();
$res = $agregar->agregarPortafolio();
$resCategoria = $agregar->agregarCategoriaPortafolio();
$proyecto = $agregar->agregarProyecto();
?>
<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Portafolio</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="hidden" name="id_portafolio">
                                        <textarea name="descripcionporta" required class="span4" id=""></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Nota<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionnota" required class="span4" id=""></textarea>

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Portafolio</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Descripcion</th>
                                                    <th>Nota</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($res as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_portafolio'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><?php echo $value['nota'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-protafolio" data-id="<?php print $value['id_portafolio']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="portafolio" value="CONFIRM">Guardar</button>
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
                <legend class="lead">Categoria Portafolio</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span5">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Nombre<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_categoria_portafolio" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="nombre" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">data-filter<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="data" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span9">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Categoria Portafolio</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>data-filter</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($resCategoria as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_categoria_portafolio'] ?></td>
                                                        <td><?php echo $value['nombre'] ?></td>
                                                        <td><?php echo $value['datafilter'] ?></td>
                                                        <td><a class="btn btn-primary edit-button-categoriaprotafolio" data-id="<?php print $value['id_categoria_portafolio']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="categoriaPorta" value="CONFIRM">Guardar</button>
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
                <legend class="lead">Portafolio</legend>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Nombre<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="id_proyecto" required class="span4" type="hidden" value="" autocomplete="false">
                                        <input id="current-pass-control" name="nombreProyecto" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcion" id="" required class="span4"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion Parrafo 1<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionParr1" id="" required class="span4"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion Parrafo 2<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionParr2" id="" required class="span4"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Descripcion Parrafo 3<span class="required">*</span></label>
                                    <div class="controls">
                                        <textarea name="descripcionParr3" id="" required class="span4"></textarea>

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Origen<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="origen" required class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Finalización Proyecto<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="finalizacion" required class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Valor<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="valor" id="precio_1" required class="span4 decimalInput">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Diseñador<span class="required">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="dise" required class="span4">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Categoria Portafolio<span class="required">*</span></label>
                                    <div class="controls">
                                        <div class="controls">
                                            <select id="challenge_question_control" required name="id_categoria_portafolio" class="span5">
                                                <option value="">-- Seleccionar Categoria --</option>
                                                <?php
                                                foreach ($resCategoria as $key => $value) {
                                                ?>
                                                    <option value="<?php echo $value['id_categoria_portafolio'] ?>">
                                                        <?php echo $value['datafilter'] ?>
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
                        <div id="acct-verify-row" class="span6">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">logo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="" class="form-control" type="hidden" id="subirAntes" name="uploadImage1" />
                                        <input id="uploadImage1" class="form-control" type="file" id="subirAntes" name="logoporta" onchange="previewImage1(1);" />
                                        <img id="uploadPreview1" width="350" height="200" class="mb-3" src="views/images/img.jpg" />

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">foto 1<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="" class="form-control" type="hidden" id="subirAntes" name="uploadImage2"/>
                                        <input id="uploadImage2" class="form-control" type="file" id="subirAntes" name="foto1" onchange="previewImage1(2);" />
                                        <img id="uploadPreview2" width="350" height="200" class="mb-3" src="views/images/img.jpg" />

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">foto 2<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="" class="form-control" type="hidden" id="subirAntes" name="uploadImage3" />
                                        <input id="uploadImage3" class="form-control" type="file" id="subirAntes" name="foto2" onchange="previewImage1(3);" />
                                        <img id="uploadPreview3" width="350" height="200" class="mb-3" src="views/images/img.jpg" />

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Proyecto</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Titulo</th>
                                                    <th>Descripcion</th>
                                                    <th>Valor</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($proyecto as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value['id_proyecto'] ?></td>
                                                        <td><?php echo $value['proyecto'] ?></td>
                                                        <td><?php echo $value['descripcion'] ?></td>
                                                        <td><?php echo number_format($value['Valor'], 0) ?></td>
                                                        <td><a class="btn btn-primary edit-button-proyecto" data-id="<?php print $value['id_proyecto']; ?>">Editar</a></td>

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
                        <button id="submit-button" type="submit" class="btn btn-primary" name="proyecto" value="CONFIRM">Guardar</button>
                    </footer>
                </form>
            </div>
        </div>
        <div class="span2"></div>
    </div>
</div>
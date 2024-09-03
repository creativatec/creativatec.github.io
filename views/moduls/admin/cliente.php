<div class="container">
    <div class="signin-row row">
        <div class="span2"></div>
        <div class="span16">
            <div class="well well-small well-shadow">
                <legend class="lead">Cliente</legend>
                <form action="" method="post">
                    <div class="row">
                        <div id="acct-password-row" class="span1">
                        </div>
                        <div id="acct-password-row" class="span7">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Nombre Cliente<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="cliente" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Telefono<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="tel" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Dirección<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="dire" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Proyecto<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="current-pass-control" name="proy" required class="span4" type="text" value="" autocomplete="false">

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span6">
                            <fieldset>
                                <div class="control-group ">
                                    <label class="control-label">Logo<span class="required">*</span></label>
                                    <div class="controls">
                                        <input id="uploadImage2" required class="form-control" type="file" id="subirAntes" name="logo" onchange="previewImage1(2);" />
                                        <img id="uploadPreview2" width="350" height="200" class="mb-3" src="Views/images/img.jpg" />

                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="acct-verify-row" class="span15">
                            <fieldset>
                                <div id="info_sobre_nosotros" class="box">
                                    <div class="box-header">
                                        <i class="icon-user icon-large"></i>
                                        <h5>Cliente</h5>

                                    </div>
                                    <div class="box-content box-table">
                                        <table class="table table-hover tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Telefono</th>
                                                    <th>Dirección</th>
                                                    <th>Acciones</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>759 Sinking Dr.</td>
                                                    <td>Sacramento</td>
                                                    <td>CA</td>
                                                    <td>98765</td>
                                                    <td></td>

                                                </tr>

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
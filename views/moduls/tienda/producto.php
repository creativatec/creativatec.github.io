<?php
$agregar = new ControladorProducto();
$res = $agregar->agregarProductoTienda();
$cat = new ControladorCategoria();
$resCat = $cat->agregarCategoriaTienda();
if (isset($_GET['action'])) {
    if ($_GET['action'] == "agregarProductp") {
        print '<script>
                swal("Hurra!", "Producto agregardo", "success");
            </script>';
    }
    if ($_GET['action'] == "agctualizarProductp") {
        print '<script>
                swal("Hurra!", "Producto actualizado", "success");
            </script>';
    }
    if ($_GET['action'] == "eliminarCategoria") {
        print '<script>
                swal("Hurra!", "Producto eliminado", "success");
            </script>';
    }
    if ($_GET['action'] == "falloProducto") {
        print '<script>
                swal("Ops!", "Hubo un error al guardar las imagenes", "error");
            </script>';
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" style="border-radius: 80%;" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus fa-lg"></i>
            </button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="table-responsive">
                <table id="productos" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Precio Promocion</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($res as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value['id_producto'] ?></td>
                                <td><img src="<?php echo $value['foto_protada'] ?>" width="100px" height="100px" alt=""></td>
                                <td><?php echo $value['producto'] ?></td>
                                <td><?php echo number_format($value['precio'], 0) ?></td>
                                <td><?php echo number_format($value['precio_descuento'], 0) ?></td>
                                <td><?php echo $value['categoria'] ?></td>
                                <td><a class="eliminar-button-producto" data-id="<?php print $value['id_producto']; ?>"><i class="fas fa-trash-alt fa-lg"></i></a></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Precio Promocion</th>
                            <th>Cantidad</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Agregar Productos-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nombre</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="nombre" id="producto" class="form-control" placeholder="Nombre Producto">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Precio</label>
                            <input type="text" name="precio" id="precio_1" class="form-control precio" placeholder="Precio Producto">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Precio Promocion</label>
                            <input type="text" name="precioPromo" id="precio_2" class="form-control precio" placeholder="Precio Producto Promocion">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Cantidad</label>
                            <input type="text" name="cant" class="form-control" placeholder="Cantidad Producto">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Categoria</label>
                            <select name="id_categoria" id="" class="form-control">
                                <option value="">--Seleccione Categoria--</option>
                                <?php
                                foreach ($resCat as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['id_categoria'] ?>"><?php echo $value['nombre'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <h3 class="mt-2">Información del producto</h3>
                    <div class="row mt-2">
                        <div class="col-md-6 form-group">
                            <label>Descripcion</label>
                            <textarea name="descrip" id="" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Información Adicional</label>
                            <textarea name="infoAdd" id="" class="form-control"></textarea>
                        </div>
                    </div>
                    <h3 class="mt-2">Imagenes</h3>
                    <div class="row mt-2">
                        <div class="col-md-6 form-group">
                            <label>Portada</label>
                            <input type="hidden" name="portadaEdit">
                            <input type="file" id="uploadImage1" name="portada" class="form-control" onchange="previewImage1(1);">
                            <img id="uploadPreview1" width="350" height="200" class="mb-3" src="views/img/img.jpg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Foto1</label>
                            <input type="hidden" name="foto1Edit">
                            <input type="file" id="uploadImage2" name="foto1" class="form-control" onchange="previewImage1(2);">
                            <img id="uploadPreview2" width="350" height="200" class="mb-3" src="views/img/img.jpg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Foto2</label>
                            <input type="hidden" name="foto2Edit">
                            <input type="file" id="uploadImage3" name="foto2" class="form-control" onchange="previewImage1(3);">
                            <img id="uploadPreview3" width="350" height="200" class="mb-3" src="views/img/img.jpg" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Foto3</label>
                            <input type="hidden" name="foto3Edit">
                            <input type="file" id="uploadImage4" name="foto3" class="form-control" onchange="previewImage1(4);">
                            <img id="uploadPreview4" width="350" height="200" class="mb-3" src="views/img/img.jpg" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button name="agregarProducto" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
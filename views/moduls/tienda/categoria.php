<?php
$cat = new ControladorCategoria();
$resCat = $cat->agregarCategoria();
$cat->eliminarCategoria();
if (isset($_GET['action'])) {
    if ($_GET['action'] == "agregarCategoria") {
        print '<script>
                swal("Hurra!", "Producto agregardo", "success");
            </script>';
    }
    if ($_GET['action'] == "actualizarCategoria") {
        print '<script>
                swal("Hurra!", "Producto actualizado", "success");
            </script>';
    }
    if ($_GET['action'] == "eliminarCategoria") {
        print '<script>
                swal("Hurra!", "Categoria Eliminada", "success");
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
            <table id="productos" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resCat as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['id_categoria'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td><a href="index.php?action=categoria&id=<?php echo $value['id_categoria'] ?>"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- Modal Agregar Productos-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
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
                            <input type="text" name="nombre" id="categoria" class="form-control" placeholder="Nombre Producto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="agregarCategoria" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
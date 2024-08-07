<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/categorias/listado_de_categorias.php');
include('../app/controllers/almacen/cargar_producto.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar Producto</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese los datos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md 12">
                                <form action="../app/controllers/almacen/update.php" method="post" enctype="multipart/form-data">
                                    <input type="text" value="<?= $id_producto_get?>" name="id_producto" hidden>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Codigo:</label>
                                                        
                                                        <input type="text" class="form-control" value="<?= $codigo; ?>" disabled>
                                                        <input type="text" name="codigo" value="<?= $codigo; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoria:</label>
                                                        <div style="display: flex;">
                                                            <select name="id_categoria" id="" class="form-control">
                                                                <?php
                                                                foreach ($categorias_datos as $categorias_dato) { 
                                                                    $nombre_categoria_tabla=$categorias_dato['nombre_categoria'];
                                                                    $id_categoria=$categorias_dato['id_categoria'];?>

                                                                    <option value="<?= $id_categoria ?>"<?php if($nombre_categoria_tabla==$nombre_categoria){
                                                                    ?> selected=selected<?php }?>>
                                                                    <?=$nombre_categoria_tabla?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>

                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre Producto:</label>
                                                        <input type="text" name="nombre" value="<?= $nombre?>" class="form-control" required>
                                                    </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" name="stock" value="<?=$stock?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock minimo:</label>
                                                        <input type="number" name="stock_minimo" value="<?= $stock_minimo?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock maximo:</label>
                                                        <input type="number" name="stock_maximo" value="<?= $stock_maximo?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra:</label>
                                                        <input type="number" name="precio_compra" value="<?= $precio_compra?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta:</label>
                                                        <input type="number" name="precio_venta" value="<?= $precio_venta?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Fecha ingreso:</label>
                                                        <input type="date" name="fecha_ingreso" value="<?= $fecha_ingreso?>" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen</label>
                                                <input type="file" name="imagen" class="form-control" id="file">
                                                <input type="text" name="imagen_texto" value="<?= $imagen?>" hidden>
                                                <br>
                                                <output id="list">
                                                <center>
                                                    <img src="<?php echo $URL ."/almacen/img_productos/".$imagen;?>" alt="" width="50%">
                                                </center>
                                                </output>
                                                <script>
                                                    function archivo(evt) {
                                                        var files = evt.target.files; // FileList object
                                                        // Obtenemos la imagen del campo "file".
                                                        for (var i = 0, f; f = files[i]; i++) {
                                                            //Solo admitimos imágenes.
                                                            if (!f.type.match('image.*')) {
                                                                continue;
                                                            }
                                                            var reader = new FileReader();
                                                            reader.onload = (function(theFile) {
                                                                return function(e) {
                                                                    // Insertamos la imagen
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                };
                                                            })(f);
                                                            reader.readAsDataURL(f);
                                                        }
                                                    }
                                                    document.getElementById('file').addEventListener('change', archivo, false);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control" value="<?= $email ?>" disabled>
                                                <input type="text" name="id_usuario" value="<?= $id_usuario ?>" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Descripcion del producto:</label>
                                                <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"><?= $descripcion?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secundary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('../layout/mensajes.php');
include('../layout/parte2.php');
?>
<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');




?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Producto <?= $nombre;?> a ser eliminado</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estas seguro de eliminar el producto?</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md 12">
                                <form action="../app/controllers/almacen/delete.php" method="post" enctype="multipart/form-data">
                                    <input type="text" value="<?= $id_producto_get?>" name="id_producto">

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Codigo:</label>                                
                                                        <input type="text" class="form-control" value="<?=$codigo; ?>" disabled>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoria:</label>
                                                        <input type="text" class="form-control" value="<?=$nombre_categoria; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre Producto:</label>
                                                        <input type="text" name="nombre" value="<?= $nombre?>" class="form-control" disabled>
                                                    </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" name="stock" value="<?= $stock?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock minimo:</label>
                                                        <input type="number" name="stock_minimo" value="<?= $stock_minimo?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock maximo:</label>
                                                        <input type="number" name="stock_maximo" value="<?= $stock_maximo?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra:</label>
                                                        <input type="number" name="precio_compra" value="<?= $precio_compra?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta:</label>
                                                        <input type="number" name="precio_venta" value="<?= $precio_venta?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Fecha ingreso:</label>
                                                        <input type="date" name="fecha_ingreso" value="<?= $fecha_ingreso?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen</label>
                                                <center>
                                                    <img src="<?php echo $URL ."/almacen/img_productos/".$imagen;?>" alt="" width="100%">
                                                    
                                                </center>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control" value="<?= $email_sesion ?>" disabled>
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Descripcion del producto:</label>
                                                <textarea name="descripcion"  id="" cols="30" rows="2" class="form-control" disabled><?= $descripcion?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secundary">Atras</a>
                                        <button type="submit" class="btn btn-danger">Eliminar Producto</button>
                            
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
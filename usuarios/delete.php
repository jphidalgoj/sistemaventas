<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar Usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-5">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Esta seguro de eliminar el usuario?</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md 12">
                                <form action="../app/controllers/usuarios/delete_usuarios.php" method="post">
                                    <input type="text" name="id_usuario" value="<?= $id_usuario_get;?>" hidden>
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" value="<?= $nombres; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?= $email; ?>" class="form-control" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        <input type="text" name="rol" value="<?= $rol; ?>" class="form-control" disabled>
                                    </div>

                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secundary">Volver</a>
                                        <button class="btn btn-danger">Eliminar</button>
                                </form>


                            </div>

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
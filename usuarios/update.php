<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/update_usuario.php');
include('../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar Usuarios</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Informacion</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md 12">

                                <form action="../app/controllers/usuarios/update.php" method="post">
                                    <input type="text" name="id_usuario" value="<?= $id_usuario_get; ?>" hidden>
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" class="form-control" value="<?= $nombres; ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $email; ?>" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol</label>

                                        <select name="rol" id="" class="form-control">
                                            <?php 
                                            foreach ($roles_datos as $roles_dato) { 
                                                $rol_tabla=$roles_dato['rol'];
                                                $id_rol=$roles_dato['id_rol'];?>
                                                <option value="<?= $id_rol;?>"
                                                <?php 
                                                if($rol_tabla==$rol){ ?>
                                                selected="selected"
                                                <?php } 
                                                ?>> <?= $rol_tabla;?></option>
                                               <?php
                                                     }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="text" name="password_user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Repita Contraseña</label>
                                        <input type="text" name="password_repeat" class="form-control">
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
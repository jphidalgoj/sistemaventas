<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/update_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Editar rol</h1>
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
            <h3 class="card-title">Ingrese sus datos</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>

          </div>

          <div class="card-body" style="display: block;">
            <div class="row">
              <div class="col-md 12">
                <form action="../app/controllers/roles/update.php" method="post">
                    <input type="text" name="id_rol" value="<?= $id_rol_get?>" hidden>
                  <div class="form-group">
                    <label for="">Actualizar rol</label>
                    <input type="text" value="<?= $rol;?>" name="rol" class="form-control" placeholder="Escriba su aqui el rol" require>
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
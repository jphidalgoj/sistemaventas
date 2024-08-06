<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_de_categorias.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Lista de categorias
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>
                            Agregar Nuevo
                        </button>
                    </h1>


                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Nombre de categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($categorias_datos as $categorias_dato) {
                                        $id_categorias = $categorias_dato['id_categoria'];
                                        $nombre_categorias = $categorias_dato['nombre_categoria']; ?>
                                        <tr>
                                            <td><?= $contador = $contador + 1; ?></td>
                                            <td><?= $categorias_dato['nombre_categoria'] ?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?= $id_categorias; ?>">
                                                            <i class="fa fa-pencil-alt"></i>
                                                            Editar
                                                        </button>
                                                        <!--modal para registrar las categorias -->

                                                        <div class="modal fade" id="modal-update<?= $id_categorias; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: green; color:aliceblue">
                                                                        <h4 class="modal-title">Editar categoria</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre de la categoria</label>
                                                                                    <input type="text" id="nombre_categoria<?= $id_categorias; ?>" value="<?= $nombre_categorias ?>" class="form-control">
                                                                                    <small style="color:red; display:none" id="lbl_update<?= $id_categorias; ?>">*Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-primary" id="btn_update<?= $id_categorias; ?>" style="background-color: green; color:aliceblue">Actualizar</button>
                                                                        <div id="respuesta"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->

                                                        <script>
                                                            $('#btn_update<?= $id_categorias; ?>').click(function() {
                                                                let nombre_categoria = $('#nombre_categoria<?= $id_categorias; ?>').val();
                                                                let id_categoria = '<?= $id_categorias; ?>';

                                                                if (nombre_categoria == "") {
                                                                    $('#nombre_categoria<?= $id_categorias; ?>').focus();
                                                                    $('#lbl_update<?= $id_categorias; ?>').css('display', 'block')
                                                                } else {
                                                                    let url = "../app/controllers/categorias/update_de_categorias.php";
                                                                    $.get(url, {
                                                                        nombre_categoria: nombre_categoria,
                                                                        id_categoria: id_categoria
                                                                    }, function(datos) {
                                                                        $('#respuesta_update<?= $id_categorias; ?>').html(datos);
                                                                    })
                                                                }


                                                            });
                                                        </script>
                                                        <div id="respuesta_update<?= $id_categorias; ?>"></div>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Nombre de categoria</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

>

<?php
include('../layout/mensajes.php');
include('../layout/parte2.php');
?>

<script>
    $(function() {

        $("#example1").DataTable({
            "pageLength": 5,
            language: {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_  a _END_ de _TOTAL_ Categorias",
                "infoEmpty": "Mostrando 0 to 0 de 0 Categorias",
                "infoFiltered": "(Filtrado de _MAX_ total Categorias)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorias",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            destroy: true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy'
                    }, {
                        extend: 'pdf',
                    }, {
                        extend: 'csv',
                    }, {
                        extend: 'excel',
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visol de columnas',
                    collectionLayout: 'fixed three-colum'
                }
            ],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!--modal para registrar las categorias -->

<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1d36b6; color:aliceblue">
                <h4 class="modal-title">Crear nueva categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoria</label>
                            <input type="text" id="nombre_categoria" class="form-control">
                            <small style="color:red; display:none" id="lbl_create">*Este campo es requerido</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Guardar</button>
                <div id="respuesta"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






<script>
    $('#btn_create').click(function() {
        let nombre_categoria = $('#nombre_categoria').val();

        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block')
        } else {
            let url = "../app/controllers/categorias/registro_de_categorias.php";

            $.get(url, {
                nombre_categoria: nombre_categoria
            }, function(datos) {
                $('#respuesta').html(datos)
            })
        }


    })
</script>
<?= $this->extend("template/menu"); ?>

<?= $this->section("title"); ?>
Software Autorizados
<?= $this->endSection(); ?>

<?= $this->section("css"); ?>
<?= $this->include('template/tableStyle') ?>
<?= $this->include('template/formStyle') ?>
<?= $this->endSection(); ?>

<?= $this->section("menu3"); ?>
open
<?= $this->endSection(); ?>


<?= $this->section("c20"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("si"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("home"); ?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <h1 class="modal-title" id="exampleModalLabel">Control de softwares instalados</h1>
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section("content"); ?>
<!-- Modal Eliminar SOFTWARE-->
<div class="modal fade validate" id="delapp" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/del_soft") ?>">
                    <div class="form-group">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-bullhorn"></i>
                                    Alert!
                                </h3>
                            </div>

                            <div class="cardy-body">
                                <div class="callout callout-danger">
                                    <h5>El registro sera elminado!</h5>

                                    <p>Se borraran todos los datos sin recuperacion, para proceder darle en Aceptar.</p>
                                </div>
                            </div>

                            <input type="hidden" name="id" id="idmodal" value="">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn-modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Software autorizados</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Software</li>
                        <li class="breadcrumb-item"><a style="color: dimgray;" href="<?= base_url("/dash") ?>">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <?php if (session('alert')) : ?>
        <div class="row">
            <div class="col-6">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><i class="fas fa-info-circle mr-1"></i> <?= session('alert') ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if (session('success')) : ?>
        <div class="row">
            <div class="col-6">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><i class="fas fa-info-circle mr-1"></i> <?= session('success') ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Formulario para el registro de los Software autorizados</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= site_url("/reg_soft") ?>" id="quickForm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Seleccione la pc (nombre|inventario):</label>
                                            <select class="form-control select2" style="width: 100%;" id="fk_pc" name="fk_pc">
                                                <?php foreach ($cpus as $cpu) : ?>
                                                    <option value="<?= $cpu['id'] ?>"><?= $cpu['nombrepc'] . " | " . $cpu['inventario'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_soft">Nombre:</label>
                                            <input type="text" class="form-control" id="name_soft" name="name_soft" placeholder="Entre el nombre del software">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="version">Versi&oacute;n:</label>
                                            <input type="text" class="form-control" id="version" name="version" placeholder="Entre la versi&oacute;n del software">
                                        </div>
                                        <div class="form-group">
                                            <label for="fabricante">Fabricante:</label>
                                            <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Entre la compañia o el nombre del fabricante del software">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn-soft" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mb-4">
        <!-- Solid divider -->
        <hr class="solid">
    </div>


    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <span>Listado de softwares autorizados</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php $i = 1; ?>
                        <table id="apps" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Acci&oacute;n</th>
                                    <th>CPU</th>
                                    <th>Responsable</th>
                                    <th>Nombre</th>
                                    <th>Versi&oacute;n</th>
                                    <th>Fabricante</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($apps as $app) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td class="action">
                                            <button type="button" data-toggle="modal" data-target="#delapp" data-id="<?= $app['id'] ?>" class="btn btn-danger btn-single btn-sm fa-input"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td><?= $app['nombrepc'] . " -" . $app['inventario'] ?></td>
                                        <td><?= $app['nombre'] . "  " . $app['lastname'] . " - " . $app['cargo'] ?></td>
                                        <td><?= $app['name_soft'] ?></td>
                                        <td><?= $app['version'] ?></td>
                                        <td><?= $app['fabricante'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("js"); ?>
<?= $this->include('template/tableScript') ?>
<script>
    $(document).ready(function() {

        $('#delapp').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $("#idmodal").val(id);
        });


        $("#apps").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "pdf", "excel", "print", "colvis"]
        }).buttons().container().appendTo('#apps_wrapper .col-md-6:eq(0)');

    });
    let espanol = {
        <?= $this->include('template/langJquery') ?>,
    };
</script>
<?= $this->endSection(); ?>
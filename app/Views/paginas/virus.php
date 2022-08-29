<?= $this->extend("template/menu"); ?>

<?= $this->section("title"); ?>
Control de Virus
<?= $this->endSection(); ?>

<?= $this->section("css"); ?>
<?= $this->include('template/tableStyle') ?>
<?= $this->include('template/formStyle') ?>
<?= $this->endSection(); ?>

<?= $this->section("menu3"); ?>
open
<?= $this->endSection(); ?>


<?= $this->section("c21"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("si"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("home"); ?>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <h1 class="modal-title" id="exampleModalLabel">Control de virus</h1>
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section("content"); ?>
<!-- Modal Eliminar VIRUS-->
<div class="modal fade validate" id="delvirus" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/del_virus") ?>">
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
                    <h1 class="m-0">Control de virus</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Virus</li>
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
                            <h3 class="card-title">Formulario para el registro del control de los virus encontrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= site_url("/reg_virus") ?>" id="quickForm">
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
                                            <label>Fecha:</label>
                                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="date" placeholder="mm/dd/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tipo de Virus:</label>
                                            <select class="form-control select2" style="width: 100%;" id="tipo_virus" name="tipo_virus">
                                                <option value="1">Gusano</option>
                                                <option value="2">Adware</option>
                                                <option value="3">Spyware</option>
                                                <option value="4">Troyano</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion:</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del virus">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="efectos_negativo">Efectos negativos:</label>
                                            <textarea class="form-control" rows="2" id="efectos_negativo" name="efectos_negativo" placeholder="Efectos negativos que pueda repercutir dicha incidencia"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="accion">Acci&oacute;n:</label>
                                            <textarea class="form-control" rows="2" id="accion" name="accion" placeholder="Acci&oacute;n que se ejecut&oacute;..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Solucionado:</label>
                                            <select class="form-control select2" style="width: 100%;" id="solucionado" name="solucionado">
                                                <option value="1">SI</option>
                                                <option value="2">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn-virus" class="btn btn-success">Guardar</button>
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
                            <span>Listado de virus registrados</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php $i = 1; ?>
                        <table id="malwares" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Acci&oacute;n</th>
                                    <th>CPU</th>
                                    <th>Responsable</th>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Efectos negativos</th>
                                    <th>Acci&oacute;n</th>
                                    <th>Solucionado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($malwares as $virus) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td class="action">
                                            <button type="button" data-toggle="modal" data-target="#delvirus" data-id="<?= $virus['id'] ?>" class="btn btn-danger btn-single btn-sm fa-input"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td><?= $virus['nombrepc'] . " - " . $virus['inventario'] ?></td>
                                        <td><?= $virus['nombre'] . " - " . $virus['lastname'] . " - " . $virus['cargo'] ?></td>
                                        <td><?= $virus['fecha'] ?></td>
                                        <td>
                                            <?php
                                            $estado = $virus['tipo_virus'];
                                            if ($estado == 1) {
                                                echo "Gusano";
                                            } else if ($estado == 2) {
                                                echo "Adware";
                                            } else if ($estado == 3) {
                                                echo "Spyware";
                                            } else if ($estado == 4) {
                                                echo "Troyano";
                                            }
                                            ?>
                                        </td>
                                        <td><?= $virus['descripcion'] ?></td>
                                        <td><?= $virus['efectos_negativo'] ?></td>
                                        <td><?= $virus['accion'] ?></td>
                                        <td>
                                            <?php
                                            $estado = $virus['solucionado'];
                                            if ($estado == 1) {
                                                echo "SI";
                                            } else echo "NO";
                                            ?>
                                        </td>
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

        $('#delvirus').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $("#idmodal").val(id);
        });


        $("#malwares").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "pdf", "excel", "print", "colvis"]
        }).buttons().container().appendTo('#malwares_wrapper .col-md-6:eq(0)');

    });
    let espanol = {
        <?= $this->include('template/langJquery') ?>,
    };
</script>
<?= $this->endSection(); ?>
<?= $this->extend("template/menu"); ?>

<?= $this->section("title"); ?>
CPU
<?= $this->endSection(); ?>

<?= $this->section("menu"); ?>
open
<?= $this->endSection(); ?>


<?= $this->section("c3"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("pc"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("home"); ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <h1 class="modal-title" id="exampleModalLabel">CPU</h1>
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section("css"); ?>
<?= $this->include('template/tableStyle') ?>
<?= $this->include('template/formStyle') ?>
<?= $this->endSection(); ?>


<?= $this->section("content"); ?>

<!-- Modal Eliminar CPU-->
<div class="modal fade validate" id="delcpu" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/del_cpu") ?>">
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entrada de la CPU</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a style="color: dimgray;" href="#lcpu">CPU</a></li>
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
                            <h3 class="card-title">Formulario para el registro de las CPU</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="<?= site_url("/reg_cpu") ?>" id="quickForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Seleccione el responsable:</label>
                                    <select class="form-control select2" style="width: 100%;" id="fk_responsable" name="fk_responsable">
                                        <?php foreach ($responsables as $responsable) : ?>
                                            <option value="<?= $responsable['id'] ?>"><?= $responsable['nombre'] . " " . $responsable['lastname'] . " (" . $responsable['cargo'] . ")" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="nombrepc">Nombre de la PC:</label>
                                            <input type="text" class="form-control" id="nombrepc" name="nombrepc" placeholder="Entre el nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="ip">Direcci&oacute;n IP:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="ip" name="ip" data-inputmask="'alias': 'ip'" data-mask placeholder="Entre la direcci&oacute;n ip">
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group">
                                            <label>Seleccione el departamento:</label>
                                            <select class="form-control select2" style="width: 100%;" id="fk_dpto" name="fk_dpto">
                                                <?php foreach ($areas as $area) : ?>
                                                    <option value="<?= $area['id'] ?>"><?= $area['dpto'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sello_seguridad">Sello de seguridad:</label>
                                            <input type="text" class="form-control" id="sello_seguridad" name="sello_seguridad" placeholder="Entre la numeraci&oacute;n">
                                        </div>
                                        <div class="form-group">
                                            <label for="so">Sistema operativo:</label>
                                            <input type="text" class="form-control" id="so" name="so" placeholder="Entre el nombre y la versi&oacute;n">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label for="mac">Direcci&oacute;n f&iacute;sica:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                                </div>
                                                <input type="text" id="mac" name="mac" class="form-control" placeholder="Entre la numeraci&oacute;n" data-inputmask='"mask": "**:**:**:**:**:**"' data-mask>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inventario">Inventario:</label>
                                            <input type="text" class="form-control" id="inventario" name="inventario" placeholder="Entre el inventario">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de inicio de explotaci&oacute;n:</label>
                                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="fecha_inicio" placeholder="mm/dd/YYYY" />
                                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="marca">Marca:</label>
                                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Entre la marca">
                                        </div>
                                        <div class="form-group">
                                            <label for="modelo">Modelo:</label>
                                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Entre el modelo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="btn" name="btn-cpu" class="btn btn-success">Guardar</button>
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

                        <div class="row" id="lcpu">
                            <span>Listado de cpu registrados</span>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?php $i = 1; ?>
                        <table id="cpus" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Acci&oacute;n</th>
                                    <th>Departamento</th>
                                    <th>Nombre</th>
                                    <th>Direcci&oacute;n IP</th>
                                    <th>Sistema operativo</th>
                                    <th>Sello de seguridad</th>
                                    <th>MAC</th>
                                    <th>Inventario</th>
                                    <th>Fecha de explotaci&oacute;n</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Responsable</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cpus as $cpu) : ?>
                                    <tr>
                                        <th><?= $i++ ?></th>
                                        <td class="action">
                                            <button type="button" data-toggle="modal" data-target="#delcpu" data-id="<?= $cpu['id'] ?>" class="btn btn-danger btn-single btn-sm fa-input"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                        <td><?= $cpu['dpto'] ?></td>
                                        <td><?= $cpu['nombrepc'] ?></td>
                                        <td><?= $cpu['ip'] ?></td>
                                        <td><?= $cpu['so'] ?></td>
                                        <td><?= $cpu['sello_seguridad'] ?></td>
                                        <td><?= $cpu['mac'] ?></td>
                                        <td><?= $cpu['inventario'] ?></td>
                                        <td><?= $cpu['fecha'] ?></td>
                                        <td><?= $cpu['marca'] ?></td>
                                        <td><?= $cpu['modelo'] ?></td>
                                        <td><?= $cpu['nombre'] . " " . $cpu['lastname'] ?></td>
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
    <!-- general form elements -->
</div>
<?= $this->endSection(); ?>

<?= $this->section("js"); ?>
<?= $this->include('template/tableScript') ?>
<script>
    $(document).ready(function() {

        $('#delcpu').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $("#idmodal").val(id);
        });


        $("#cpus").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", {extend: 'pdfHtml5', orientation: 'landscape', pageSize: "LEGAL"},"excel", "print", "colvis"]
        }).buttons().container().appendTo('#cpus_wrapper .col-md-6:eq(0)');

    });
    let espanol = {
        <?= $this->include('template/langJquery') ?>,
    };    
</script>
<script>
    $().ready(function() {        
        $("#btn").on("click", function() {
            $('#quickForm').validate({
                rules: {
                    nombrepc: {
                        required: true
                    },
                    ip: {
                        required: true
                    },
                    sello_seguridad: {
                        required: true
                    },
                    so: {
                        required: true
                    },
                    mac: {
                        required: true
                    },
                    inventario: {
                        required: true
                    },
                    marca: {
                        required: true
                    },
                    modelo: {
                        required: true
                    },
                    fecha_inicio: {
                        required: true
                    }
                },

                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>
<?= $this->extend("template/menu"); ?>

<?= $this->section("title"); ?>
Responsabilidad
<?= $this->endSection(); ?>


<?= $this->section("c2"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("css"); ?>
<?= $this->include('template/tableStyle') ?>
<?= $this->endSection(); ?>

<?= $this->section("home"); ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <h1 class="modal-title" id="exampleModalLabel">Responsabilidad</h1>
    <div class="spinner-border" role="status">
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section("content"); ?>
<!-- Modal Ingreso Departamento -->
<div class="modal fade validate" id="plus_dpto" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Departamento: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/dpto_plus") ?>">

                    <div class="form-group">
                        <label for="dpto1">Nombre del Área: </label>
                        <input id="dpto1" class="form-control" type="text" name="dpto" pattern="^[a-zA-ZñÑáéíóú\s]+$" required>
                    </div>
                    <div class="card card-default">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="dptoplus">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ingreso Responsable -->
<div class="modal fade validate" id="plus_resp" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Responsable: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/resp_plus") ?>">

                    <div class="form-group">
                        <label for="nombre1">Nombre(s):</label>
                        <input id="nombre1" class="form-control" type="text" name="nombre" pattern="^[a-zA-ZñÑáéíóú\s]+$" required>

                        <label for="lastname1">Apellidos:</label>
                        <input id="lastname1" class="form-control" type="text" name="lastname" pattern="^[a-zA-ZñÑáéíóú\s]+$" required>

                        <label for="cargo1">Cargo:</label>
                        <input id="cargo1" class="form-control" type="text" name="cargo" pattern="^[a-zA-ZñÑáéíóú\s]+$" required>
                    </div>
                    <div class="card card-default">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="resp_plus">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar Dpto-->
<div class="modal fade validate" id="deldptos" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/deldpto") ?>">
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

<!-- Modal Eliminar Responsable-->
<div class="modal fade validate" id="delresp" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url("/delresp") ?>">
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

                            <input type="hidden" name="id" id="idmodal1" value="">

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
                    <h1 class="m-0">Responsabilidad</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Departamentos</li>
                        <li class="breadcrumb-item">Responsables</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-above-dpto-tab" data-toggle="pill" href="#custom-content-above-dpto" role="tab" aria-controls="custom-content-above-dpto" aria-selected="true">Departamentos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-above-resp-tab" data-toggle="pill" href="#custom-content-above-resp" role="tab" aria-controls="custom-content-above-resp" aria-selected="false">Responsables</a>
                                </li>
                            </ul>
                            <div class="tab-custom-content">
                                <p class="lead mb-0">Listado de &aacute;reas y los responsables de los medios inform&aacute;ticos</p>
                            </div>
                            <div class="tab-content" id="custom-content-above-tabContent">
                                <div class="tab-pane fade show active" id="custom-content-above-dpto" role="tabpanel" aria-labelledby="custom-content-above-dpto-tab">
                                    <div class="row">
                                        <div class="card">
                                            <button type="button" data-toggle="modal" data-target="#plus_dpto" class="btn btn-success btn-single btn-sm fa-input">Ingresar Departamento <i class="fas fa-user-plus"></i></button>
                                        </div>
                                    </div>
                                    <?php $i = 1; ?>
                                    <div class="col-md-12">
                                        <table id="dpto" class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Departamentos</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($areas as $area) : ?>
                                                    <tr>
                                                        <th><?= $i++ ?></th>
                                                        <td><?= $area['dpto'] ?></td>
                                                        <td class="action">
                                                            <button type="button" data-toggle="modal" data-target="#deldptos" data-id="<?= $area['id'] ?>" class="btn btn-danger btn-single btn-sm fa-input"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-content-above-resp" role="tabpanel" aria-labelledby="custom-content-above-resp-tab">
                                    <div class="row">
                                        <div class="card">
                                            <button type="button" data-toggle="modal" data-target="#plus_resp" class="btn btn-success btn-single btn-sm fa-input">Ingresar Responsable <i class="fas fa-user-plus"></i></button>
                                        </div>
                                    </div>
                                    <?php $a = 1; ?>
                                    <table id="resp" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Responsables</th>
                                                <th>Cargo / Ocupaci&oacute;n</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($responsables as $responsable) : ?>
                                                <tr>
                                                    <th><?= $a++ ?></th>
                                                    <td><?= $responsable['nombre'] . " " . $responsable['lastname'] ?></td>
                                                    <td><?= $responsable['cargo'] ?></td>
                                                    <td class="action">
                                                        <button type="button" data-toggle="modal" data-target="#delresp" data-id="<?= $responsable['id'] ?>" class="btn btn-danger btn-single btn-sm fa-input"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endSection(); ?>
<?= $this->section("js"); ?>
<?= $this->include('template/tableScript') ?>
<script>
    $(document).ready(function() {

        $('#deldptos').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $("#idmodal").val(id);
        });

        $('#delresp').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            $("#idmodal1").val(id);
        });

        $("#dpto").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#dpto_wrapper .col-md-6:eq(0)');

        $("#resp").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#resp_wrapper .col-md-6:eq(0)');

    });
    let espanol = {
        <?= $this->include('template/langJquery') ?>,
    };
</script>
<?= $this->endSection(); ?>
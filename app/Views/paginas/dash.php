<?= $this->extend("template/menu"); ?>

<?= $this->section("title"); ?>
Panel
<?= $this->endSection(); ?>



<?= $this->section("c1"); ?>
active
<?= $this->endSection(); ?>

<?= $this->section("css"); ?>
<?= $this->include('template/tableStyle') ?>
<?= $this->endSection(); ?>

<?= $this->section("home"); ?>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img src="dist/img/logo.png" height="150" width="150">
</div>

<?= $this->endSection(); ?>

<?= $this->section("content"); ?>
<!-- Modal Cant CPU-->
<div class="modal fade validate" id="computers" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $i = 1; ?>
                <div class="col-md-12" id="expedientePdf">
                <h4 class="card-title">Expedientes t&eacute;cnicos</h4>
                    <table id="ordenadores" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Acci&oacute;n</th>
                                <th>Nombre CPU</th>
                                <th>Inventario</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($expedientes as $exp) : ?>
                                <tr>
                                    <th><?= $i++ ?></th>
                                    <td class="action">
                                        <form action="<?= base_url('/reporte') ?>" method="post">
                                            <input type="hidden" value="<?= $exp['id'] ?>" name="id">
                                            <button type="submit" class="btn btn-info btn-single btn-sm fa-input"><i class="far fa-file-pdf"></i></button>
                                            <span class="classpdf badge badge-info"><i class="fas fa-caret-left"></i>&nbsp;Exportar</span>
                                        </form>
                                    </td>
                                    <td><?= $exp['nombrepc'] ?></td>
                                    <td><?= $exp['inventario'] ?></td>
                                    <td><?= $exp['dpto'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Informes de SI -->
<div class="modal fade validate" id="inf" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $a = 1; ?>
            <div class="modal-body">
                <h4 class="card-title">Informes de seguridad inform&aacute;tica</h4>
                <table id="reports" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Acci&oacute;n</th>
                            <th>Meses</th>
                            <th>A&ntilde;o</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($informs as $info) : ?>
                            <tr>
                                <th><?= $a++ ?></th>
                                <td class="action">
                                    <form action="<?= base_url('/informSI') ?>" method="post">
                                        <input type="hidden" value="<?= $info['nmes'] ?>" name="id">
                                        <button type="submit" class="btn btn-success btn-single btn-sm fa-input" id="exp"><i class="far fa-file-pdf"></i></button>
                                        <span class="classpdf badge badge-success"><i class="fas fa-caret-left"></i>&nbsp;Exportar</span>
                                    </form>
                                </td>
                                <td><?= $info['mes'] ?></td>
                                <td><?= $info['year'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
                    <h1 class="m-0">Panel de control</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item"><a style="color: dimgray;" href="<?= base_url("/dash") ?>">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small Box (Stat card) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $pcs ?></h3>

                            <p>Cantidad de CPU</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <button class="btn btn-single btn-sm fa-input" type="button" data-toggle="modal" data-target="#computers">Expedientes <i class="fas fa-arrow-circle-right"></i></button>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $insp ?></h3>

                            <p>Cantidad de inspecciones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <button class="btn btn-single btn-sm fa-input" type="button" data-toggle="modal" data-target="#inf">Informes <i class="fas fa-arrow-circle-right"></i></button>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $rotura ?></h3>

                            <p>Cantidad de roturas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <button class="btn btn-single btn-sm fa-input" type="button" data-toggle="modal" id="pagRot">M&aacute;s info <i class="fas fa-arrow-circle-right"></i></button>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $incide ?></h3>

                            <p>Cantidad de incidencias</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-fingerprint"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            <button class="btn btn-single btn-sm fa-input" type="button" data-toggle="modal" id="pagInc">M&aacute;s info <i class="fas fa-arrow-circle-right"></i></button>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Estado t&eacute;cnico de los:</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Equipos</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <?php $total_estado = 0;
                                    $max_indicador = 0;
                                    $total_estado = $bien + $mal + $regular;
                                    $p_tecnico = 0;
                                    if ($total_estado) {
                                        $array_tecnico = array(
                                            $bien,
                                            $mal,
                                            $regular
                                        );
                                        $max_indicador = max($array_tecnico);
                                        $p_tecnico = (($max_indicador / $total_estado) * 100);
                                    } ?>
                                    <span class="text-success">
                                        <?= floor($p_tecnico); ?>%
                                    </span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4 col-lg-3 col-sm-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Estado de inventario de los:</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Equipos</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <?php
                                    $total_inv = 0;
                                    $max_ind = 0;
                                    $p_inv = 0;
                                    $total_inv = $activo + $inactivo + $baja;
                                    if ($total_inv) {
                                        $array_inv = array(
                                            $activo,
                                            $inactivo,
                                            $baja
                                        );
                                        $max_inv = max($array_inv);
                                        $p_inv = (($max_inv / $total_inv) * 100);
                                    }
                                    ?>
                                    <span class="text-success">
                                        <?= floor($p_inv); ?>%
                                    </span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart2" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-md-4 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span>Comportamiento de las incidencias mensual:</span>
                                    <span class="text-bold text-lg">Ene - Dic (<?= date('Y', time()) ?>)</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <?php
                                    $promedio = 0;
                                    $pmeses = $mes_actual * $mes_anterior;
                                    if ($pmeses) {

                                        $promedio = ($mes_actual / $mes_anterior);
                                        if ($mes_actual > $mes_anterior) {
                                            echo '<span class="text-success">';
                                            echo '<i class="fas fa-arrow-up"></i>' . ' ' . substr($promedio, 0, 4) . '% </span>';
                                        }

                                        if ($mes_actual < $mes_anterior) {
                                            echo '<span class="text-danger">';
                                            echo '<i class="fas fa-arrow-down"></i>' . ' ' . substr($promedio, 0, 4) . '% </span>';
                                        }
                                    }
                                    ?>
                                    <span class="text-muted">Mes actual: <?= date('M', time()) ?></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="200"></canvas>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Incidencias
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Inspecciones
                                </span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">TIC</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Productos</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="tic/mother.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            MotherBoards
                                        </td>
                                        <td><?= $placas ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/fuentes.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Fuentes Internas
                                        </td>
                                        <td><?= $fuentes ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/disco.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Discos Duros
                                        </td>
                                        <td><?= $hdds ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/teclado.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Teclados
                                        </td>
                                        <td><?= $teclads ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/mouse.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Mouses
                                        </td>
                                        <td><?= $ratones ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/ups.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            UPS
                                        </td>
                                        <td><?= $ups ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/monitor.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Monitores
                                        </td>
                                        <td><?= $monitores ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/printer.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Impresoras
                                        </td>
                                        <td><?= $impresoras ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/router.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Routers
                                        </td>
                                        <td><?= $routers ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/swtch.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Switchs
                                        </td>
                                        <td><?= $swtch ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="tic/phone.jpg" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            Telefonos
                                        </td>
                                        <td><?= $phons ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top 5 de CPU con m&aacute;s antig&uuml;edad</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <?php $i = 1; ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Invetario</th>
                                        <th style="width: 40px">A&ntilde;o</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($top_cpus as $tcpu) : ?>
                                        <tr>
                                            <td><?= $i++ . "." ?></td>
                                            <td><?= $tcpu['nombrepc'] ?></td>
                                            <td><?= $tcpu['inventario'] ?></td>
                                            <th><?= $tcpu['fecha'] ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top 5 de CPU mantenimientos del mes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <?php $a = 1; ?>
                            <table id="mant" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nombre</th>
                                        <th>Invetario</th>
                                        <th style="width: 40px">D&iacute;a</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($top_mant as $tm) : ?>
                                        <tr>
                                            <td><?= $a++ . "." ?></td>
                                            <td><?= $tm['nombrepc'] ?></td>
                                            <td><?= $tm['inventario'] ?></td>
                                            <th><?= $tm['fecha'] ?></th>
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
    </section>


</div>
<?= $this->endSection(); ?>
<?= $this->section("js"); ?>
<?= $this->include('template/grafica') ?>

<?= $this->include('template/tableScript') ?>
<script>
    $(document).ready(function() {
        $("#ordenadores").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#ordenadores_wrapper .col-md-6:eq(0)');

        $("#reports").DataTable({
            "language": espanol,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        }).buttons().container().appendTo('#reports_wrapper .col-md-6:eq(0)');


        $("#pagRot").on('click', function() {
            window.location.href = "<?= base_url("/rotura") ?>";
        });

        $("#pagInc").on('click', function() {
            window.location.href = "<?= base_url("/incidencia#inc") ?>";
        });

    });
    let espanol = {
        <?= $this->include('template/langJquery') ?>,
    };
</script>

<?= $this->endSection(); ?>
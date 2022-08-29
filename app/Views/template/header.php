<div class="wrapper">

  <?= $this->renderSection('home') ?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url("/dash") ?>" class="nav-link">CP Jesús Menéndez Larrondo de Manzanillo</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div class="card-tools">
        <div class="btn-group">          
          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-sign-out-alt"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="<?= site_url("/salir") ?>" class="dropdown-item">Salir</a>
          </div>
        </div>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("/dash") ?>" class="brand-link navbar-light">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Control<b>TIC+</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session('name') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url("/dash") ?>" class="nav-link <?= $this->renderSection('c1') ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Panel de Control</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url("/resp") ?>" class="nav-link <?= $this->renderSection('c2') ?>">
              <i class="nav-icon fas fa-school"></i>
              <p>Area / Responsable</p>
            </a>
          </li>
          <li class="nav-item menu-<?= $this->renderSection('menu') ?>">
            <a href="#" class="nav-link <?= $this->renderSection('pc') ?>">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                PC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("/cpu") ?>" class="nav-link <?= $this->renderSection('c3') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CPU</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/placa") ?>" class="nav-link <?= $this->renderSection('c4') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Placa Madre</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/micro") ?>" class="nav-link <?= $this->renderSection('c5') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Microprocesador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/mram") ?>" class="nav-link <?= $this->renderSection('c6') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Memoria RAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/fuente") ?>" class="nav-link <?= $this->renderSection('c7') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fuente Interna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/disco") ?>" class="nav-link <?= $this->renderSection('c8') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Disco HDD/SSD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/cd") ?>" class="nav-link <?= $this->renderSection('c9') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lector CD/DVD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/teclado") ?>" class="nav-link <?= $this->renderSection('c10') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teclado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/mouse") ?>" class="nav-link <?= $this->renderSection('c11') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/bocina") ?>" class="nav-link <?= $this->renderSection('c12') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Speaker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/ups") ?>" class="nav-link <?= $this->renderSection('c13') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UPS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/monitor") ?>" class="nav-link <?= $this->renderSection('c14') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monitor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-<?= $this->renderSection('menu2') ?>">
            <a href="#" class="nav-link <?= $this->renderSection('red') ?>">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Dispositivos Red
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("/printer") ?>" class="nav-link <?= $this->renderSection('c15') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Impresora</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/modem") ?>" class="nav-link <?= $this->renderSection('c16') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modem</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/router") ?>" class="nav-link <?= $this->renderSection('c17') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Router</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/switch") ?>" class="nav-link <?= $this->renderSection('c18') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Switch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/telefono") ?>" class="nav-link <?= $this->renderSection('c19') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Telefono</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-<?= $this->renderSection('menu3') ?>">
            <a href="#" class="nav-link <?= $this->renderSection('si') ?>">
              <i class="nav-icon fas fa-shield-alt"></i>
              <p>
                CiberSeguridad
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("/soft") ?>" class="nav-link <?= $this->renderSection('c20') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aplicaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/inspeccion") ?>" class="nav-link <?= $this->renderSection('c22') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inspecciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/virus") ?>" class="nav-link <?= $this->renderSection('c21') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Virus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/incidencia") ?>" class="nav-link <?= $this->renderSection('c28') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incidencias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/mantenimiento") ?>" class="nav-link <?= $this->renderSection('c24') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mantenimientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/movimiento") ?>" class="nav-link <?= $this->renderSection('c25') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Movimientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/rotura") ?>" class="nav-link <?= $this->renderSection('c26') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roturas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("/salva") ?>" class="nav-link <?= $this->renderSection('c27') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Salva de Informaci&oacute;n</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script src="jspdf.min.js"></script>
  <!-- https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js -->
  <script src="jspdf.plugin.autotable.js"></script>
  <script>
    function generatePDF() {
      var imgData = <?= $this->include('template/logoBase64') ?>;
      var pdf = new jsPDF();
      pdf.text("Nombre de la escuela", 20, 10);
      pdf.addImage(imgData, 'PNG', 20, 15, 20, 20);
      pdf.text("Expediente #", 20, 45);

      autoTable(pdf, { html: '#mant' });
      
      /*var columns = ["ID", "Name", "Country"];
      var rows = [
        [1, "Shaw", "Tanzania", ],
        [2, "Nelson", "Kazakhstan", ],
        [3, "Garcia", "Madagascar", ],
      ];*/

      /*var column = ["ID", "Name", "Country"];
      var row = [
        [1, "Shaw", "Tanz4ania", ],
        [2, "Nelson", "Kazakhstan", ],
        [3, "Garcia", "Madagascar", ],
      ];

      pdf.autoTable(columns, rows);
      pdf.autoTable(column, row);*/


      pdf.save('table.pdf');

      //pdf.save("mypdf.pdf");

    }
  </script>
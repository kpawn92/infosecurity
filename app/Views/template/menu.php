<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="dist/img/AdminLTELogo.ico" type="image/x-icon">
  <title>C-TIC | <?= $this->renderSection('title') ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="fonts.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">

  <?= $this->renderSection('css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer">
  <?= $this->renderSection('script') ?>
  <?= $this->include('template/header') ?>
  <?= $this->renderSection('content') ?>


  <a id="back-to-top" href="#" class="btn btn-success back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>
  <?= $this->include('template/footer') ?>
  <?= $this->renderSection('js') ?>
  <?= $this->include('template/Js_formularios') ?>  
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Acceso al sistema</title>
    <link rel="stylesheet" type="text/css" href="login/css/style.css">
    <link rel="shortcut icon" href="dist/img/AdminLTELogo.ico" type="image/x-icon">
    <link href="login/css/fuente.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="login/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="login/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="<?= site_url("/login") ?>" method="POST">
                <img src="dist/img/AdminLTELogo.png">                                
                <span style="font-size: 60px;">Control<b>TIC+</b></span> 
                <br><br>
                <?php if (session('message')) : ?>
                    <strong><?= session('message') ?></strong>
                <?php endif ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" class="input" name="user">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Ingresar">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="login/js/main.js"></script>
</body>

</html>
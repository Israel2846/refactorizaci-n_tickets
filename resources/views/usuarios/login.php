<!DOCTYPE html>
<html lang="es-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -100px;
        }
    </style>
</head>

<body>
    <div class="ui segment container" style="width: 30%;">
        <!-- Start nombre de página en bandera azul -->
        <div class="ui blue ribbon label">
            <h3>Iniciar sesión</h3>
        </div>
        <span></span>
        <p></p>
        <!-- End nombre de página en bandera azul -->

        <?php if ($mensaje) : ?>
            <label style="color: red;"><?= $mensaje ?></label>
        <?php endif ?>

        <!-- Start: Formulario de inicio de sesión -->
        <form method="post" class="ui fluid form" action="/">
            <div class="field">
                Correo electrónico
                <input type="email" name="usu_correo" placeholder="Ingrese su email">
            </div>
            <div class="field">
                Contraseña
                <input type="password" name="usu_pass" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="ui blue button">Iniciar sesión</button>
        </form>
        <!-- End: Formulario de inicio de sesión -->
    </div>
</body>

</html>
<?php include './includes.php' ?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trámites Municipales</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <?php include $header ?>

    <main class="container">
        <div class="card tramites-page">
            <h3>Trámites Municipales</h3>
            <p class="subtitle">Realiza tus trámites en línea de manera sencilla</p>

            <div class="tramites-list">
                <?php
                $tramites = [
                    ["Licencia de construcción", "En línea", "Solicitar"],
                    ["Permiso de publicidad", "Presencial", "Agendar"],
                    ["Constancia de alineamiento", "En línea", "Solicitar"],
                    ["Registro civil", "Presencial", "Agendar"],
                    ["Permiso de venta ambulante", "En línea", "Solicitar"],
                    ["Certificado de zonificación", "En línea", "Solicitar"]
                ];

                foreach($tramites as $tramite) {
                    echo '<div class="tramite-item card">';
                    echo '<div class="info">';
                    echo '<div class="title">'.$tramite[0].'</div>';
                    echo '<div class="subtitle">Modalidad: '.$tramite[1].'</div>';
                    echo '</div>';
                    echo '<div class="actions">';
                    echo '<button class="btn-tramite">'.$tramite[2].'</button>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <a href="index.php" class="btn-back">Regresar a inicio</a>
        </div>
    </main>

    <?php include $footer ?>
    <?php include $chatbot ?>
    <script src="./assets/scripts/scripts.js"> </script>
</body>

</html>
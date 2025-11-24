<?php include './includes.php' ?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transparencia</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php include $header ?>

    <main class="container">
        <div class="card transparencia-page">
            <h3>Transparencia</h3>
            <p class="subtitle">Actas, acuerdos y documentos públicos</p>
            <div class="docs">
                <?php
                $docs = [
                    "Acta - 12 Nov 2025",
                    "Acta - 03 Oct 2025",
                    "Reporte financiero 2025",
                    "Reglamento municipal",
                    "Informe de obra pública",
                    "Acta de sesión extraordinaria",
                    "Plan anual de desarrollo",
                    "Informe de auditoría interna"
                ];

                foreach($docs as $doc) {
                    echo '<div class="doc card">';
                    echo '<span>'.$doc.'</span>';
                    echo '<a href="#" class="btn-link">Descargar</a>';
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

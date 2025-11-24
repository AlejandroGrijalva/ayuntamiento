<?php include './includes.php' ?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Planeación Municipal</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <?php include $header ?>
    <br>
    <br>
    <main style="flex-grow: 1;" class="container">
        <div class="card planeacion-page">
            <h3>Planeación Municipal</h3>
            <p class="subtitle">Proyectos en curso y su estado</p>
            <div class="projects">
                <?php
                $proyectos = [
                    ["Parque Central", "Construcción"],
                    ["Mejoras en alumbrado", "Diseño"],
                    ["Pavimentación Calle 12", "Licitación"],
                    ["Centro comunitario", "Construcción"],
                    ["Reforestación parque Sur", "Planificación"],
                    ["Renovación plaza principal", "Diseño"]
                ];

                foreach($proyectos as $p) {
                    echo '<div class="project">';
                    echo '<div class="title">'.$p[0].'</div>';
                    echo '<div class="fase">Fase: '.$p[1].'</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <a href="index.php" class="btn-back">Regresar a inicio</a>
        </div>
    </main>
    <br>
    <br>



    <?php include $footer ?>
    <?php include $chatbot ?>
    <script src="./assets/scripts/scripts.js"> </script>

</body>

</html>
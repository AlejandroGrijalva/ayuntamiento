<?php include './includes.php' ?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sesiones de Cabildo</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php include $header ?>

    <main class="container">
        <div class="card sesiones-page">
            <h3>Sesiones de Cabildo</h3>
            <p class="subtitle">Accede a calendario, orden del día y actas. En el prototipo mostramos el flujo de una sesión.</p>

            <div class="sessions-list">
                <?php
                $sesiones = [
                    ["28 Nov 2025", "Orden del día: 5 puntos. Duración estimada: 2 horas"],
                    ["15 Nov 2025", "Orden del día: 4 puntos. Duración estimada: 1.5 horas"],
                    ["01 Nov 2025", "Orden del día: 6 puntos. Duración estimada: 2.5 horas"],
                    ["20 Oct 2025", "Orden del día: 3 puntos. Duración estimada: 1 hora"],
                    ["05 Oct 2025", "Orden del día: 7 puntos. Duración estimada: 3 horas"]
                ];
                foreach($sesiones as $sesion) {
                    echo '<div class="session card">';
                    echo '<h4>Sesión - '.$sesion[0].'</h4>';
                    echo '<p class="subtitle">'.$sesion[1].'</p>';
                    echo '<a href="#" class="btn-link">Ver acta</a>';
                    echo '</div>';
                }
                ?>

                <div class="session card">
                    <h4>Votaciones recientes</h4>
                    <div class="votaciones">
                        <div class="item"><span>Obra pública XX</span><span class="status approved">Aprobada</span></div>
                        <div class="item"><span>Asignación de recursos</span><span class="status pending">Pendiente</span></div>
                        <div class="item"><span>Mejoras en parques</span><span class="status approved">Aprobada</span></div>
                        <div class="item"><span>Compra de mobiliario</span><span class="status approved">Aprobada</span></div>
                        <div class="item"><span>Reasignación presupuestal</span><span class="status pending">Pendiente</span></div>
                    </div>
                </div>
            </div>

            <a href="index.php" class="btn-back">Regresar a inicio</a>
        </div>
    </main>

    <?php include $footer ?>
    <?php include $chatbot ?>
</body>
</html>

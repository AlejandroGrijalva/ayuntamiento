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
            <p class="subtitle">Todas las sesiones son grabadas en video y audio. Las actas son transcritas
                posteriormente por el equipo de secretaría.</p>

            <div class="sessions-list">
                <?php
                $sesiones = [
                    ["28 Nov 2025", "Orden del día: 5 puntos. Duración estimada: 2 horas", "grabada", "transcrita"],
                    ["15 Nov 2025", "Orden del día: 4 puntos. Duración estimada: 1.5 horas", "grabada", "transcrita"],
                    ["01 Nov 2025", "Orden del día: 6 puntos. Duración estimada: 2.5 horas", "grabada", "pendiente"],
                    ["20 Oct 2025", "Orden del día: 3 puntos. Duración estimada: 1 hora", "grabada", "transcrita"],
                    ["05 Oct 2025", "Orden del día: 7 puntos. Duración estimada: 3 horas", "grabada", "transcrita"]
                ];
                
                foreach($sesiones as $sesion) {
                    $clase = $sesion[3] == 'transcrita' ? 'session-grabada' : 'session-pendiente';
                    echo '<div class="session card '.$clase.'">';
                    echo '<h4>Sesión - '.$sesion[0].'</h4>';
                    echo '<p class="subtitle">'.$sesion[1].'</p>';
                    echo '<div class="session-actions">';
                    echo '<a href="#" class="btn-link">Ver grabación</a>';
                    if($sesion[3] == 'transcrita') {
                        echo '<a href="#" class="btn-link">Ver acta transcrita</a>';
                    } else {
                        echo '<span class="text-muted">Acta en proceso</span>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>

                <div class="session card">
                    <h4>Proceso de Transcripción</h4>
                    <div class="proceso-transcripcion">
                        <div class="paso"><strong>1. Grabación:</strong> Sesión grabada en video/audio</div>
                        <div class="paso"><strong>2. Transcripción:</strong> Equipo de secretaría transcribe</div>
                        <div class="paso"><strong>3. Revisión:</strong> Presidentes de comisión revisan</div>
                        <div class="paso"><strong>4. Aprobación:</strong> Acta aprobada en siguiente sesión</div>
                        <div class="paso"><strong>5. Publicación:</strong> Acta disponible públicamente</div>
                    </div>
                </div>

                <div class="session card">
                    <h4>Votaciones recientes</h4>
                    <div class="votaciones">
                        <div class="item"><span>Obra pública XX</span><span class="status approved">Aprobada</span>
                        </div>
                        <div class="item"><span>Asignación de recursos</span><span
                                class="status pending">Pendiente</span></div>
                        <div class="item"><span>Mejoras en parques</span><span class="status approved">Aprobada</span>
                        </div>
                        <div class="item"><span>Compra de mobiliario</span><span class="status approved">Aprobada</span>
                        </div>
                        <div class="item"><span>Reasignación presupuestal</span><span
                                class="status pending">Pendiente</span></div>
                    </div>
                </div>
            </div>

            <a href="index.php" class="btn-back">Regresar a inicio</a>
        </div>
    </main>

    <?php include $footer ?>
    <?php include $chatbot ?>
    <script src="./assets/scripts/scripts.js"> </script>
</body>

</html>
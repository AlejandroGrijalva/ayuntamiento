<?php 
include './includes.php'; 
include '../api/includes/db.php';
// Asegúrate de que la función obtenerSesiones() esté disponible (usualmente en includes.php)
// Si no la has incluido ahí, descomenta las líneas de abajo o mueve tu función aquí.

function obtenerSesiones() {
    $pdo = conectarBD(); // Asumiendo que tienes esta función de conexión
    $stmt = $pdo->prepare("SELECT * FROM sesiones ORDER BY date DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}


// Obtenemos los datos reales
$sesiones = obtenerSesiones();
?>

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
                // Si no hay sesiones en la BD, mostramos un mensaje
                if (empty($sesiones)) {
                    echo '<p class="text-muted">No hay sesiones registradas por el momento.</p>';
                } else {
                    foreach($sesiones as $sesion) {
                        // 1. Lógica de Estado (BD 'transcribed' es 1 o 0)
                        $estaTranscrita = $sesion['transcribed']; 
                        $clase = $estaTranscrita ? 'session-grabada' : 'session-pendiente';
                        
                        // 2. Formato de Fecha (De YYYY-MM-DD a "28 Nov 2025")
                        // setlocale(LC_TIME, 'es_ES.UTF-8'); // Opcional si quieres meses en español automático
                        $fechaFormateada = date("d M Y", strtotime($sesion['date']));

                        // 3. Renderizado de la Tarjeta
                        echo '<div class="session card '.$clase.'">';
                        
                        echo '<h4>Sesión - '.$fechaFormateada.'</h4>';
                        
                        // Combinamos descripción y duración como en tu diseño original
                        echo '<p class="subtitle">';
                        echo 'Orden del día: ' . htmlspecialchars($sesion['description']);
                        echo '. Duración estimada: ' . htmlspecialchars($sesion['duration']);
                        echo '</p>';

                        echo '<div class="session-actions">';
                        
                        // Enlace a grabación (agregamos el ID para saber cuál abrir)
                        echo '<a href="ver_grabacion.php?id='.$sesion['id'].'" class="btn-link">Ver grabación</a>';
                        
                        // Condicional para el Acta
                        if($estaTranscrita) {
                            // Si tienes el archivo PDF guardado en la BD, úsalo aquí, si no, usa un link genérico
                            echo '<a href="ver_acta.php?id='.$sesion['id'].'" class="btn-link">Ver acta transcrita</a>';
                        } else {
                            echo '<span class="text-muted">Acta en proceso</span>';
                        }
                        
                        echo '</div>'; // Fin actions
                        echo '</div>'; // Fin card
                    }
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
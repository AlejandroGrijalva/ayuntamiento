<?php include './includes.php' ?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Convocatorias</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <?php include $header ?>

    <main class="container">
        <div class="card convocatorias-page">
            <h3>Convocatorias</h3>
            <div class="conv-list">
                <?php
                $convocatorias = [
                    ["Consulta pública: Parque Central", "Vigente hasta 05 Dic 2025", true],
                    ["Apoyo cultural", "Cerrada", false],
                    ["Feria deportiva", "Vigente hasta 12 Dic 2025", true],
                    ["Concurso de fotografía", "Cerrada", false],
                    ["Premio literario municipal", "Vigente hasta 20 Dic 2025", true]
                ];

                foreach($convocatorias as $conv) {
                    echo '<div class="conv-item card">';
                    echo '<div class="info">';
                    echo '<div class="title">Convocatoria – '.$conv[0].'</div>';
                    echo '<div class="subtitle">'.$conv[1].'</div>';
                    echo '</div>';
                    echo '<div class="actions">';
                    echo '<a href="#" class="btn-link">Detalles</a>';
                    if($conv[2]) echo '<button class="btn-participar">Participar</button>';
                    echo '</div></div>';
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

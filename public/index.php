<?php
include './includes.php'
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portal Municipal - Nuevo Casas Grandes (Prototipo)</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Roboto:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/mediaquerys.css">

</head>

<body>
    <!-- Header -->
    <?php include $header ?>
    <main class="hero">
        <div class="hero-contenido">
            <h1>Bienvenido al Portal Oficial de Nuevo Casas Grandes</h1>
            <p>Tu acceso directo a trámites, servicios e información relevante del municipio y la región.</p>
            <a href="./tramites.php" class="boton-principal"><i class="bi bi-file-earmark-text"></i> Realiza tus
                Trámites y Servicios Aquí</a>
        </div>
    </main>

    <section class="accesos-rapidos">
        <div class="contenedor">
            <h2>Servicios Ciudadanos Esenciales</h2>
            <div class="grid-servicios">

                <a href="./pago-predial.php" class="servicio-card">
                    <i class="bi bi-wallet2 icono-servicio"></i>
                    <h3>Pago de Impuesto Predial</h3>
                    <p>Paga tu predial en línea de forma segura y rápida.</p>
                </a>

                <a href="./reporte.php" class="servicio-card">
                    <i class="bi bi-megaphone icono-servicio"></i>
                    <h3>Reporte Ciudadano</h3>
                    <p>Reporta baches, fallas de alumbrado, limpieza urbana, etc.</p>
                </a>

                <a href="./transparencia.php" class="servicio-card">
                    <i class="bi bi-info-circle icono-servicio"></i>
                    <h3>Transparencia Municipal</h3>
                    <p>Consulta información pública, licitaciones y rendición de cuentas.</p>
                </a>

                <a href="./tramites.php" class="servicio-card">
                    <i class="bi bi-list-columns-reverse icono-servicio"></i>
                    <h3>Guía de Trámites</h3>
                    <p>Revisa requisitos y pasos para licencias, permisos y más.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="noticias">
        <div class="contenedor">
            <h2>Últimas Noticias y Comunicados</h2>
            <div class="grid-noticias">

                <article class="noticia-card">
                    <div class="noticia-imagen">
                    </div>
                    <div class="noticia-contenido">
                        <span>12 de Noviembre, 2025</span>
                        <h3>Gran Festival Cultural NCG 2025</h3>
                        <p>Se invita a la ciudadanía a participar en las festividades...</p>
                        <a href="./noticia-detalle.php?id=1" class="enlace-mas">Leer más</a>
                    </div>
                </article>

                <article class="noticia-card">
                    <div class="noticia-imagen">
                    </div>
                    <div class="noticia-contenido">
                        <span>10 de Noviembre, 2025</span>
                        <h3>Aviso: Cierre Parcial de Calle Juárez</h3>
                        <p>Por trabajos de rehabilitación de la red hidráulica...</p>
                        <a href="./noticia-detalle.php?id=2" class="enlace-mas">Leer más</a>
                    </div>
                </article>

                <article class="noticia-card">
                    <div class="noticia-imagen">
                    </div>
                    <div class="noticia-contenido">
                        <span>05 de Noviembre, 2025</span>
                        <h3>Inauguración de la Nueva Planta de Tratamiento</h3>
                        <p>Mejorando la infraestructura hídrica para toda la comunidad.</p>
                        <a href="./noticia-detalle.php?id=3" class="enlace-mas">Leer más</a>
                    </div>
                </article>

            </div>
            <a href="./noticias.php" class="boton-secundario">Ver todas las noticias</a>
        </div>
    </section>

    <section class="turismo-ncg">
        <div class="contenedor">
            <h2>Descubre la Historia y Cultura de la Región</h2>
            <div class="grid-atractivos">

                <div class="atractivo-card">
                    <div class="atractivo-imagen">
                    </div>
                    <h3>Zona Arqueológica de Paquimé</h3>
                    <p>Patrimonio de la Humanidad, centro clave de la cultura Mogollón.</p>
                </div>

                <div class="atractivo-card">
                    <div class="atractivo-imagen">

                    </div>
                    <h3>El Reloj de Nuevo Casas Grandes</h3>
                    <p>Símbolo icónico de la ciudad y punto de encuentro central.</p>
                </div>

                <div class="atractivo-card">
                    <div class="atractivo-imagen">
                    </div>
                    <h3>Museo de las Culturas del Norte</h3>
                    <p>Explora la historia prehispánica y colonial de Chihuahua.</p>
                </div>

            </div>
            <a href="./turismo.php" class="boton-secundario">Visita nuestra sección de Turismo</a>
        </div>
    </section>


    <!-- Footer -->

    <?php include $footer ?>

    <!-- Chat mockup -->
    <?php include $chatbot ?>


    <script src="./assets/scripts/scripts.js"> </script>

</body>

</html>
<?php
include './includes.php'
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portal Municipal - Nuevo Casas Grandes (Prototipo)</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/mediaquerys.css">

</head>

<body>
    <!-- Header -->
    <?php include $header ?>

    <!-- <main class="container" id="inicio">

        <section class="hero-card hero-card hero" aria-labelledby="hero-title">
            <div class="hero-card">
                <h2 id="hero-title">Bienvenido al Portal Municipal</h2>
                <p>Consulta convocatorias, sigue sesiones de cabildo, revisa actas y conoce la planeación municipal. Diseño prototipo para entrega.</p>

                <div class="quick-grid">
                    <div class="quick" role="button" tabindex="0">
                        <div class="icon">C</div>
                        <div>
                            <div style="font-weight:600">Convocatorias</div>
                            <div style="font-size:0.85rem;color:var(--muted)">Convocatorias abiertas y cerradas</div>
                        </div>
                    </div>
                    <div class="quick" role="button" tabindex="0">
                        <div class="icon">S</div>
                        <div>
                            <div style="font-weight:600">Sesiones</div>
                            <div style="font-size:0.85rem;color:var(--muted)">Calendario y actas</div>
                        </div>
                    </div>
                    <div class="quick" role="button" tabindex="0">
                        <div class="icon">T</div>
                        <div>
                            <div style="font-weight:600">Trámites</div>
                            <div style="font-size:0.85rem;color:var(--muted)">Guía rápida de requisitos</div>
                        </div>
                    </div>
                    <div class="quick" role="button" tabindex="0">
                        <div class="icon">P</div>
                        <div>
                            <div style="font-weight:600">Planeación</div>
                            <div style="font-size:0.85rem;color:var(--muted)">Proyectos municipales</div>
                        </div>
                    </div>
                </div>

            </div>

            <aside style="width:100%;max-width:360px;">
                <div class="hero-card card">
                    <h3>Sesión próxima</h3>
                    <div class="calendar">
                        <div class="next-session">
                            <div class="mini"><strong>28 Nov 2025</strong>
                                <div style="font-size:0.9rem;color:var(--muted)">Sesión ordinaria - 10:00 AM</div>
                            </div>
                            <div class="mini">Orden del día: Aprobación de obra pública, dictámenes, asuntos generales</div>
                            <div style="margin-top:8px"><a href="#sesiones" style="font-weight:700;color:var(--verde-oscuro)">Ver detalles</a></div>
                        </div>
                        <div>
                            <div class="mini"><strong>Votaciones recientes</strong>
                                <div style="font-size:0.9rem;color:var(--muted)">2 aprobadas • 1 pendiente</div>
                            </div>
                            <div style="margin-top:8px" class="mini">Última acta: 12 Nov 2025</div>
                        </div>
                    </div>
                </div>

                <div class="card right" style="margin-top:14px">
                    <div class="small stat">
                        <div>Participación ciudadana</div>
                        <div style="font-weight:700">1,248</div>
                    </div>
                    <div class="small stat">
                        <div>Documentos</div>
                        <div style="font-weight:700">342</div>
                    </div>
                </div>
            </aside>
        </section>

        <section style="grid-column:1/2">
            <div class="card" id="sesiones">
                <h3>Sesiones de Cabildo</h3>
                <p style="color:var(--muted);margin-top:8px">Accede a calendario, orden del día y actas. En el prototipo mostramos el flujo de una sesión.</p>
                <div style="display:flex;gap:12px;margin-top:16px;flex-wrap:wrap">
                    <div style="flex:1;min-width:280px" class="card">
                        <h4 style="margin:0 0 8px 0">Sesión - 28 Nov 2025</h4>
                        <div style="color:var(--muted);font-size:0.95rem">Orden del día: 5 puntos. Duración estimada: 2 horas</div>
                        <div style="margin-top:12px"><a href="#" style="font-weight:700;color:var(--verde-oscuro)">Ver acta</a></div>
                    </div>

                    <div style="flex:1;min-width:240px" class="card">
                        <h4 style="margin:0 0 8px 0">Votaciones recientes</h4>
                        <div style="display:flex;gap:8px;flex-direction:column">
                            <div style="display:flex;justify-content:space-between">
                                <div>Obra pública XX</div>
                                <div style="font-weight:700;color:var(--verde-oscuro)">Aprobada</div>
                            </div>
                            <div style="display:flex;justify-content:space-between">
                                <div>Asignación de recursos</div>
                                <div style="font-weight:700;color:var(--dorado)">Pendiente</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="convocatorias" style="margin-top:14px">
                <h3>Convocatorias</h3>
                <div class="conv-list" style="margin-top:10px">
                    <div class="conv-item">
                        <div>
                            <div style="font-weight:700">Convocatoria – Consulta pública: Parque Central</div>
                            <div style="font-size:0.9rem;color:var(--muted)">Vigente hasta 05 Dic 2025</div>
                        </div>
                        <div style="display:flex;align-items:center;gap:10px">
                            <a href="#" style="font-weight:700;color:var(--verde-oscuro)">Detalles</a>
                            <button style="background:var(--dorado);border:none;padding:8px 10px;border-radius:8px;font-weight:700">Participar</button>
                        </div>
                    </div>

                    <div class="conv-item">
                        <div>
                            <div style="font-weight:700">Convocatoria – Apoyo cultural</div>
                            <div style="font-size:0.9rem;color:var(--muted)">Cerrada</div>
                        </div>
                        <div style="display:flex;align-items:center;gap:10px">
                            <a href="#" style="font-weight:700;color:var(--verde-oscuro)">Detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="transparencia" style="margin-top:14px">
                <h3>Transparencia</h3>
                <p style="color:var(--muted)">Actas, acuerdos y documentos públicos</p>
                <div class="docs" style="margin-top:12px">
                    <div class="doc">
                        <div>Acta - 12 Nov 2025</div>
                        <div><a href="#">Descargar</a></div>
                    </div>
                    <div class="doc">
                        <div>Acta - 03 Oct 2025</div>
                        <div><a href="#">Descargar</a></div>
                    </div>
                    <div class="doc">
                        <div>Reporte financiero 2025</div>
                        <div><a href="#">Descargar</a></div>
                    </div>
                    <div class="doc">
                        <div>Reglamento municipal</div>
                        <div><a href="#">Descargar</a></div>
                    </div>
                </div>
            </div>

            <div class="card" id="planeacion" style="margin-top:14px">
                <h3>Planeación Municipal</h3>
                <p style="color:var(--muted)">Proyectos en curso y su estado</p>
                <div class="projects" style="margin-top:12px">
                    <div class="project">
                        <div style="font-weight:700">Parque Central</div>
                        <div style="font-size:0.9rem;color:var(--muted)">Fase: Construcción</div>
                    </div>
                    <div class="project">
                        <div style="font-weight:700">Mejoras en alumbrado</div>
                        <div style="font-size:0.9rem;color:var(--muted)">Fase: Diseño</div>
                    </div>
                    <div class="project">
                        <div style="font-weight:700">Pavimentación Calle 12</div>
                        <div style="font-size:0.9rem;color:var(--muted)">Fase: Licitación</div>
                    </div>
                </div>
            </div>
        </section>

        <aside style="grid-column:2/3">
            <div class="card">
                <h3>Accesos rápidos</h3>
                <ul style="padding-left:18px;color:var(--muted);margin:10px 0">
                    <li>Solicitar acta de nacimiento</li>
                    <li>Permiso de construcción</li>
                    <li>Registro de asociación</li>
                </ul>
                <div style="margin-top:12px"><a href="#" style="font-weight:700;color:var(--verde-oscuro)">Ver todos los trámites</a></div>
            </div>

            <div class="card" style="margin-top:12px">
                <h3>Contacto</h3>
                <div style="color:var(--muted);font-size:0.95rem">Av. Principal 123, Nuevo Casas Grandes<br>Tel: (xxx) xxx-xxxx</div>
                <div style="margin-top:8px"><a href="#" style="font-weight:700;color:var(--verde-oscuro)">Enviar mensaje</a></div>
            </div>

            <div class="card" style="margin-top:12px">
                <h3>Indicadores</h3>
                <div style="display:flex;flex-direction:column;gap:8px;margin-top:10px">
                    <div style="display:flex;justify-content:space-between">
                        <div style="font-size:0.9rem;color:var(--muted)">Proyectos</div>
                        <div style="font-weight:700">24</div>
                    </div>
                    <div style="display:flex;justify-content:space-between">
                        <div style="font-size:0.9rem;color:var(--muted)">Documentos</div>
                        <div style="font-weight:700">342</div>
                    </div>
                </div>
            </div>
        </aside>
    </main> -->

    <!-- Footer -->

    <?php include $footer ?>

    <!-- Chat mockup -->
    <div class="chat-btn" id="chatBtn" aria-label="Abrir asistente">💬</div>
    <div class="chat-modal" id="chatModal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="chat-header">
            <div style="width:40px;height:40px;border-radius:8px;background:rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center">IA</div>
            <div>
                <div style="font-weight:700">Asistente Ciudadano</div>
                <div style="font-size:0.85rem;color:rgba(255,255,255,0.9)">Resuelve dudas sobre trámites</div>
            </div>
        </div>
        <div class="chat-body" id="chatBody">
            <div class="msg bot">Hola, ¿en qué puedo ayudarte hoy? Puedes probar: "¿Qué necesito para sacar licencia comercial?"</div>
        </div>
        <div class="chat-input">
            <input id="chatInput" placeholder="Escribe tu pregunta..." aria-label="Mensaje" />
            <button id="sendBtn">Enviar</button>
        </div>
    </div>

    <script src="./assets/scripts/scripts.js"> </script>

</body>

</html>
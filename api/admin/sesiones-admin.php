<?php
require_once '../includes/auth.php';
requerirLogin();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Sesiones</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="admin-container">
        <?php include '../includes/admin-header.php'; ?>

        <main class="admin-main">
            <div class="page-header">
                <h1>Gestión de Sesiones de Cabildo</h1>
                <button class="btn-primary" onclick="abrirModal()">+ Nueva Sesión</button>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>Duración</th>
                            <th>Transcrita</th>
                            <th>Acta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplos estáticos -->
                        <tr>
                            <td>2025-11-28</td>
                            <td>Orden del día: 5 puntos. Duración estimada: 2 horas</td>
                            <td>2 horas</td>
                            <td>✅</td>
                            <td>acta_1.pdf</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit" onclick="editarSesion(1)">Editar</button>
                                <button class="btn-sm btn-danger" onclick="eliminarSesion(1)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2025-11-15</td>
                            <td>Orden del día: 4 puntos. Duración estimada: 1.5 horas</td>
                            <td>1.5 horas</td>
                            <td>✅</td>
                            <td>acta_2.pdf</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit" onclick="editarSesion(2)">Editar</button>
                                <button class="btn-sm btn-danger" onclick="eliminarSesion(2)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2025-11-01</td>
                            <td>Orden del día: 6 puntos. Duración estimada: 2.5 horas</td>
                            <td>2.5 horas</td>
                            <td>❌</td>
                            <td>No disponible</td>
                            <td class="actions">
                                <button class="btn-sm btn-edit" onclick="editarSesion(3)">Editar</button>
                                <button class="btn-sm btn-danger" onclick="eliminarSesion(3)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal para crear/editar -->
            <div id="modalSesion" class="modal">
                <div class="modal-content">
                    <h2 id="modalTitulo">Nueva Sesión</h2>
                    <form id="formSesion">
                        <input type="hidden" id="sesionId" name="id">

                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" name="descripcion" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="duracion">Duración:</label>
                            <input type="text" id="duracion" name="duracion" required>
                        </div>

                        <div class="form-group">
                            <label for="transcrita">
                                <input type="checkbox" id="transcrita" name="transcrita">
                                Transcrita
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="acta">Acta (transcripción):</label>
                            <textarea id="acta" name="acta" rows="6"
                                placeholder="Escribe aquí el acta de la sesión..."></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-primary" onclick="guardarSesion()">Guardar</button>
                            <button type="button" class="btn-secondary" onclick="cerrarModal()">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
            function abrirModal() {
                document.getElementById('modalSesion').style.display = 'block';
                document.getElementById('modalTitulo').textContent = 'Nueva Sesión';
                document.getElementById('formSesion').reset();
                document.getElementById('sesionId').value = '';
            }

            function cerrarModal() {
                document.getElementById('modalSesion').style.display = 'none';
            }

            function editarSesion(id) {
                // Datos de ejemplo para editar
                const sesiones = {
                    1: {
                        fecha: '2025-11-28',
                        descripcion: 'Orden del día: 5 puntos. Duración estimada: 2 horas',
                        duracion: '2 horas',
                        transcrita: true,
                        acta: 'En la sesión del 28 de noviembre de 2025, se trataron los siguientes puntos:\n\n1. Aprobación del acta anterior\n2. Informe del presidente municipal\n3. Discusión sobre el presupuesto\n4. Proyectos de obra pública\n5. Asuntos generales'
                    },
                    2: {
                        fecha: '2025-11-15',
                        descripcion: 'Orden del día: 4 puntos. Duración estimada: 1.5 horas',
                        duracion: '1.5 horas',
                        transcrita: true,
                        acta: 'Acta de la sesión del 15 de noviembre de 2025...'
                    },
                    3: {
                        fecha: '2025-11-01',
                        descripcion: 'Orden del día: 6 puntos. Duración estimada: 2.5 horas',
                        duracion: '2.5 horas',
                        transcrita: false,
                        acta: ''
                    }
                };

                const sesion = sesiones[id];
                if (sesion) {
                    document.getElementById('modalTitulo').textContent = 'Editar Sesión';
                    document.getElementById('sesionId').value = id;
                    document.getElementById('fecha').value = sesion.fecha;
                    document.getElementById('descripcion').value = sesion.descripcion;
                    document.getElementById('duracion').value = sesion.duracion;
                    document.getElementById('transcrita').checked = sesion.transcrita;
                    document.getElementById('acta').value = sesion.acta;
                    document.getElementById('modalSesion').style.display = 'block';
                }
            }

            function eliminarSesion(id) {
                if (confirm('¿Estás seguro de que deseas eliminar esta sesión?')) {
                    alert('Sesión eliminada (esto es solo un ejemplo)');
                }
            }

            function guardarSesion() {
                // Aquí iría tu lógica PHP para guardar
                alert('Datos guardados (esto es solo un ejemplo)');
                cerrarModal();
            }

            // Cerrar modal si se hace clic fuera
            window.onclick = function(event) {
                var modal = document.getElementById('modalSesion');
                if (event.target == modal) {
                    cerrarModal();
                }
            }
            </script>
        </main>
    </div>
</body>

</html>